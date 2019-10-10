<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //
    public function index()
    {
        $post = Post::all();
        return view('posts.index')->with('post' , $post);
    }
    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $posts = new Post;

        $posts->title = request('title');
        $posts->description = request('description');
        $posts->save();

        $post = Post::all();

        return view('posts.index')->with('post', $post);
    }

    public function show($id)
    {
        $post=Post::find($id);
        return view('posts.show')->with('post', $post);
    }
}
