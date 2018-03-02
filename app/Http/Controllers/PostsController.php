<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->where('status', '=', "Published")->paginate(9);

        return view('blog', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('post', compact('post'));
    }
}
