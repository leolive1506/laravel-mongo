<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function store(Request $request)
    {
        return Post::create($request->all());
    }

    public function update(Request $request, Post $post)
    {
        return $post->update($request->all());
    }

    public function destory(Post $post)
    {
        return $post->delete();
    }
}
