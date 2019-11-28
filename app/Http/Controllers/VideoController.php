<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;


class VideoController extends Controller
{
    //
    public function getVideo($fileName)
    {


        $video = Storage::disk('local')->get('videos/' . $fileName);

        $response = Response::make($video, 200);
        $response->header('Content-Type', 'video/mp4');

        return $response;
    }
}