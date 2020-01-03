<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\Http\Requests\Asset\CreateAssetRequest;
use App\Http\Resources\Asset as ResourcesAsset;
use App\Notifications\NewEnrolment;
use App\Recent;
use App\Tag;
use App\User;
use Illuminate\Support\Facades\Auth;

class AssetController extends Controller
{
    private $frontEnd = ['Front-end'];
    private $web = ['Front-end', 'Back-end'];
    private $office = ['MS Excel', 'Microsoft Office', 'MS Word', 'Microsoft Office Excel'];
    //
    public function index()
    {
        return view('asset.index');
    }

    public function show(Asset $asset)
    {

        if (!auth()->user()) {
            if ($asset->type == 'guide') {
                return view('guide.preview', [
                    'guide' => $asset
                ]);
            } else {
                return view('course.preview', [
                    'course' => $asset
                ]);
            }
        } else {

            if (auth()->user()->enrolled($asset)) {

                $asset->recent()->touch();

                if ($asset->type == 'guide') {
                    return view('guide.show', [
                        'guide' => $asset
                    ]);
                } else {
                    return view('course.show', [
                        'course' => $asset
                    ]);
                }
            } else {
                if ($asset->type == 'guide') {
                    return view('guide.preview', [
                        'guide' => $asset
                    ]);
                } else {
                    return view('course.preview', [
                        'course' => $asset
                    ]);
                }
            }
        }
        if ($asset->type == 'guide') {

            return view('guide.show', [
                'guide' => $asset

            ]);
        } else {

            return view('course.show', [
                'course' => $asset

            ]);
        }
    }

    public function create($type)
    {
        if ($type == 'guide') {
            return view('guide.create', [
                'tags' => Tag::all()
            ]);
        } else {
            return view('course.create', [
                'tags' => Tag::all()
            ]);
        }
    }

    public function store(CreateAssetRequest $request)
    {
    }

    public function generalAssets()
    {
        $assets =  Asset::paginate(4);

        return ResourcesAsset::collection($assets);
    }

    public function officeAssets()
    {
        $assets = Asset::belongsToTag($this->office);

        return ResourcesAsset::collection($assets);
    }

    public function webDevAssets()
    {

        $assets = Asset::belongsToTag($this->web);

        return ResourcesAsset::collection($assets);
    }

    public function frontEndAssets()
    {
        $assets = Asset::belongsToTag($this->frontEnd);

        return ResourcesAsset::collection($assets);
    }

    public function myAssets()
    {
        $assets = auth()->user()->enrolledAssets()->paginate(3);
        return ResourcesAsset::collection($assets);
    }
    public function enroll(Asset $asset)
    {
        $asset->users()->attach(auth()->user()->id);

        $asset->author->notify(new NewEnrolment($asset));

        $recent = new Recent(['user_id' => auth()->user()->id]);

        $asset->recent()->save($recent);

        session()->flash('success', 'You have successfully enroled to this guide!');

        return redirect(route('asset.show', $asset->slug));
    }
    // function fetch_data(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $type = $_GET['type'];
    //         switch ($type) {
    //             case 'recents':
    //                 $passedAssets = Asset::searched();
    //                 $title = "Recently added guides & courses";
    //                 break;
    //             case 'officeGuides':
    //                 $passedAssets =  Asset::tagsSearch($this->office);
    //                 $title = "MICROSOFT OFFICE GUIDES & COURSES";
    //                 break;
    //             case 'webGuides':
    //                 $passedAssets = Asset::tagsSearch($this->web);
    //                 $title = "WEB DEVELOPMENT GUIDES & COURSES";
    //                 break;
    //             default:

    //                 break;
    //         }
    //         return view('partials.pagination_data', ['passedAssets' => $passedAssets, 'container' => $type, 'title' => $title])->render();
    //     }
    // }
}