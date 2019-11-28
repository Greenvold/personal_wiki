<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\User;

class AssetController extends Controller
{
    private $web = ['Front-end', 'Back-end'];
    private $office = ['MS Excel', 'Microsoft Office', 'MS Word', 'Microsoft Office Excel'];
    //
    public function index()
    {
        if (!auth()->user()) {
            return view('asset.index', [
                'assets' => Asset::searched(),
                'webGuides' => Asset::tags($this->web),
                'officeGuides' => Asset::tags($this->office)
            ]);
        } else {

            return view('asset.index', [
                'assets' => Asset::searched(),
                'webGuides' => Asset::tags($this->web),
                'officeGuides' => Asset::tags($this->office),
                'recents' => User::recents()
            ]);
        }
    }

    function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $type = $_GET['type'];
            switch ($type) {
                case 'recents':
                    $passedAssets = Asset::searched();
                    $title = "Recently added guides & courses";
                    break;
                case 'officeGuides':
                    $passedAssets =  Asset::tags($this->office);
                    $title = "MICROSOFT OFFICE GUIDES & COURSES";
                    break;
                case 'webGuides':
                    $passedAssets = Asset::tags($this->web);
                    $title = "WEB DEVELOPMENT GUIDES & COURSES";
                    break;
                default:

                    break;
            }
            return view('partials.pagination_data', ['passedAssets' => $passedAssets, 'container' => $type, 'title' => $title])->render();
        }
    }
}