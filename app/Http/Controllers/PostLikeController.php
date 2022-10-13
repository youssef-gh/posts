<?php

namespace App\Http\Controllers;

use App\Mail\Postliked;
use App\Models\Post;
use Illuminate\Http\Request;
use Mail;

class PostLikeController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Post $post, Request $request) {

        $post->likes()->create([
            'user_id' => $request->user()->id
        ]);

        Mail::to($post->user)->send(new Postliked(auth()->user(), $post));
        
        return back();
    }

    public function destroy(Post $post, Request $request ) {
        $request->user()->likes()->where('post_id', $post->id)->delete();
        return back();
    }
}
