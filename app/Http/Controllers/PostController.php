<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        // this get all posts $posts = Post::get();
        // $posts = Post::get();
        
        // $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(20);
        
        $posts = Post::latest()->with(['user','likes'])->paginate(20);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post'=> $post,
        ]);
    }

    public function store(Request $request) {
        
        $this->validate($request, [
            'body' => 'required'
        ]);
        
        // $request->user()->posts()->create([
        //     'body' => $request->body
        // ]);

        $request->user()->posts()->create($request->only('body'));

        return back();
    }

    public function destroy(Post $post) {

        $this->authorize('delete', $post);
        
        $post->delete();
        // Post::where('id', $post->id)->delete();

        return back();
    }
}
