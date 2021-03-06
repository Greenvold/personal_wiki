<?php

namespace App\Http\Controllers;

use App\Guide;
use App\Http\Requests\Guide\CreateGuideRequest;
use App\Http\Requests\Guide\UpdateGuideRequest;
use App\Notifications\NewEnrolment;
use Illuminate\Http\Request;
use App\Tag;
use App\User;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('guide.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guide.create', [
            'tags' => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGuideRequest $request)
    {
        $content = $this->generateContent($request->input('content'));

        $image = $request->image->store('guides');


        $guide = Guide::create([
            'title' => $request->title,
            'content' =>  $content,
            'short_description' => $request->short_description,
            'user_id' => auth()->user()->id,
            'published_at' => $request->published_at,
            'image' => $image
        ]);

        $guide->tags()->attach($request->tags);

        session()->flash('success', 'New text guide created successfully.');

        return redirect(route('guide.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Guide $guide)
    {
        return view('guide.show', [
            'guide' => $guide
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Guide $guide)
    {
        return view('guide.create', [
            'guide' => $guide
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGuideRequest $request, Guide $guide)
    {
        $data = $request->only(['title', 'content', 'publishet_at', 'slug']);

        $guide->slug = null;
        $guide->update($data, ['title' => $data['title']]);

        if ($request->tags) {

            $guide->tags()->sync($request->tags);
        } else {
            $guide->tags()->detach();
        }

        session()->flash('success', 'Guide has been updated successfully.');

        return redirect(route('guide.index'));
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

    public function enroll(Guide $guide)
    {
        $guide->users()->attach(auth()->user()->id);

        $guide->author->notify(new NewEnrolment($guide));

        return redirect(route('member.dashboard'));
    }

    public function preview(Guide $guide)
    {
        $enrolled = $guide->users()->where('user_id', auth()->user()->id)->exists();

        if ($enrolled) {
            return redirect(route('guide.show', $guide->slug));
        } else {
            return view('guide.preview', [
                'guide' => $guide
            ]);
        }
    }
}