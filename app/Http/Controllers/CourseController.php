<?php

namespace App\Http\Controllers;

use App\Course;
use App\Episode;
use App\Http\Requests\Course\CreateCourseRequest;
use App\Recent;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('course.create', [
            'tags' => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCourseRequest $request)
    {
        //
        $content = $this->generateContent($request->input('content'));

        $image = $request->image->store('courses');

        $course = Course::create([
            'title' => $request->title,
            'content' =>  $content,
            'short_description' => $request->short_description,
            'user_id' => auth()->user()->id,
            'published_at' => $request->published_at,
            'image' => $image
        ]);

        $course->tags()->attach($request->tags);

        session()->flash('success', 'New text course created successfully.');

        return redirect(route('teacher.dashboard-general'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course, Episode $episode)
    {

        auth()->user()->coursesViewed()->sync([1 => ['episode_id' => $episode->id]], $course->id);
        //
        return view('course.show', ['course' => $course, 'episodes' => $course->episodes, 'thisEpisode' => $episode]);
    }

    public function continue(Course $course)
    {
        $lastEpisode = auth()->user()->lastViewedEpisode($course->id);

        auth()->user()->coursesViewed()->sync([1 => ['episode_id' => $lastEpisode->id]], $course->id);

        return view('course.show', ['course' => $course, 'episodes' => $course->episodes, 'thisEpisode' => $lastEpisode]);
    }

    public function overview(Course $course)
    {
        $lastEpisode = auth()->user()->lastViewedEpisode($course->id);

        return view('course.overview', ['course' => $course, 'lastEpisode' => $lastEpisode]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
        return view('course.edit', ['course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function generateContent($input)
    {
        $dom = new \DomDocument();

        $dom->loadHtml($input, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $k => $img) {

            $data = $img->getAttribute('src');

            list($type, $data) = explode(';', $data);

            list(, $data)      = explode(',', $data);

            $data = base64_decode($data);

            $image_name = "/img/text_guides/" . md5($k . time()) . '.png';

            $path = public_path() . $image_name;

            file_put_contents($path, $data);

            $img->removeAttribute('src');

            $img->setAttribute('src', $image_name);
        }

        return $dom->saveHTML();
    }

    public function enroll(Course $course)
    {
        $course->users()->attach(auth()->user()->id);

        $firstEpisode = DB::table('course_episode')->where('course_id', $course->id)->min('episode_id');


        auth()->user()->coursesViewed()->sync([1 => ['episode_id' => $firstEpisode]], $course->id);


        $recent = new Recent(['user_id' => auth()->user()->id]);

        $course->recent()->save($recent);

        return redirect(route('member.dashboard'));
    }

    public function preview(Course $course)
    {
        if (!auth()->user()) {
            return view('course.preview', [
                'course' => $course
            ]);
        } else {
            $enrolled = $course->users()->where('user_id', auth()->user()->id)->exists();

            if ($enrolled) {
                $lastEpisode = auth()->user()->lastViewedEpisode($course->id);

                return view('course.overview', ['course' => $course, 'lastEpisode' => $lastEpisode]);
            } else {
                return view('course.preview', [
                    'course' => $course
                ]);
            }
        }
    }

    public function startCourse(Course $course)
    {

        $firstEpisode = DB::table('course_episode')->where('course_id', $course->id)->min('episode_id');


        auth()->user()->coursesViewed()->sync([1 => ['episode_id' => $firstEpisode]], $course->id);

        $episode = $course->episodes()->where('order_number', '1')->first();

        return redirect(route('course.show', ['course' => $course, 'episodes' => $course->episodes, 'episode' => $episode->slug]));
    }
}