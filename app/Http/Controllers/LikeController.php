<?php

namespace App\Http\Controllers;

use App\Dislike;
use App\Guide;
use App\Like;
use App\Notifications\NewLike;
use App\Notifications\NewDislike;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function likeGuide($id)
    {

        //make like
        $alreadyLiked = Like::where('likeable_type', 'App\Guide')->where('likeable_id', $id)->where('user_id', auth()->user()->id)->exists();
        if (!$alreadyLiked) {
            $guide = Guide::find($id);
            $like = Like::create([
                'likeable_id' => $id,
                'likeable_type' => 'App\Guide',
                'user_id' => auth()->user()->id
            ]);

            //remove dislike
            $dislikeExists = Dislike::where('dislikeable_type', 'App\Guide')->where('dislikeable_id', $id)->where('user_id', auth()->user()->id)->exists();
            if ($dislikeExists) {
                Dislike::where('dislikeable_type', 'App\Guide')->where('dislikeable_id', $id)->where('user_id', auth()->user()->id)->delete();
            }
            $guide->author->notify(new NewLike($guide));

            return \Response::json('sucessfully liked');
        } else {
            return \Response::json($alreadyLiked);
        }
    }

    public function disLikeGuide($id)
    {
        $alreadyLiked = Dislike::where('dislikeable_type', 'App\Guide')->where('dislikeable_id', $id)->where('user_id', auth()->user()->id)->exists();
        if (!$alreadyLiked) {
            $guide = Guide::find($id);
            $like = Dislike::create([
                'dislikeable_id' => $id,
                'dislikeable_type' => 'App\Guide',
                'user_id' => auth()->user()->id
            ]);

            $likeExists = Like::where('likeable_type', 'App\Guide')->where('likeable_id', $id)->where('user_id', auth()->user()->id)->exists();
            if ($likeExists) {
                Like::where('likeable_type', 'App\Guide')->where('likeable_id', $id)->where('user_id', auth()->user()->id)->delete();
            }

            $guide->author->notify(new NewDislike($guide));

            return \Response::json('successfully disliked');
        } else {
            return \Response::json($alreadyLiked);
        }
    }
}