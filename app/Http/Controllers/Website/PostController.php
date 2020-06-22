<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts  = Post::Orderby('id','desc')->get();
        return view('Website.Posts.index')
        ->with('posts',$posts);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('Website.Posts.show')
        ->with('post', $post);
    }
}
