<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;
use App\Post;
use App\Notification;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate(request(),
        [
            'comment' => 'required',
        ]);

       
        $comment = new Comments;
        $comment->post_id = request('post_id');
        $comment->company_id = request('company_id');
        $comment->user_id = auth()->user()->id;
        $comment->name = auth()->user()->name;
        $comment->comment_desc = request('comment');
        $comment->save();
        $comments = Comments::all();
        $post = Post::find(request('post_id'));
        $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
        return view('posts.show')->with(['comments' => $comments,'post' => $post, 'notifcount' => $notifcount]);

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function show(Comments $comments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function edit(Comments $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comments $comments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comments $comments)
    {
        //
    }
}
