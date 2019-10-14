<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Profile;
use App\Comments;

class PostController extends Controller
{
    //
    public function index()
    {
        if(auth()->check())
        {

            if (auth()->user()->type == 'employee')
            {
                $post = Post::all();
                return view('posts.index')->with('post' , $post);
            }
            elseif (auth()->user()->type == 'company')
            {
                $post = Post::all();
                return view('posts.index')->with('post' , $post);
            }
        }
        else 
        {
            return redirect()->to('/login');
        }
      
    }
    public function create()
    {
        if(auth()->check())
        {
            if (auth()->user()->type == 'employee')
            {
                return redirect()->to('/employee/dashboard');
            }
            elseif (auth()->user()->type == 'company')
            {
                return view('posts.create');
            }
        }
       
    }

    public function store()
    {
        if (auth()->check())
        {
            if (auth()->user()->type == 'company')
            {
                $profile = Profile::find(auth()->user()->id);
                $posts = new Post;
                $posts->company_name = $profile->name;
                $posts->title = request('title');
                $posts->company_id = auth()->user()->id;
                $posts->description = request('description');
                $posts->save();
                $post = Post::all();
                return redirect()->to('/post')->with('post', $post);
            }
            elseif (auth()->user()->type == 'employee')
            {
                return redirect()->to('/employee/dashboard');
            }
        }
      
    }

    public function show($id)
    {

        $post=Post::find($id);
        $comments = Comments::all();
        return view('posts.show')->with(['post' => $post, 'comments' => $comments]);
        
    }
}
