<?php

namespace App\Http\Controllers;

use App\Hire;
use App\Notification;
use App\Profile;
use Illuminate\Http\Request;
use App\Post;
use App\Comments;

class HireController extends Controller
{
    //

    public function store(Request $request)
    {
        $hire = New Hire;
        $hire->company_id = auth()->user()->id;
        $hire->company_name = auth()->user()->name;
        $hire->user_id = request('id');
        $hire->post_id = request('post_id');
        $hire->user_name = request('name');
        $hire->message_status = '0';
        $hire->save();

       
        $notification = New Notification;
        $notification->company_id = auth()->user()->id;
        $notification->app_id = $hire->id;
        $notification->user_id = request('id');
        $notification->name = request('name');
        $notification->subject = 'hire';
        $notification->type ='employee';
        $notification->message = request('message');
        $notification->save();

        $profile = Profile::find(request('id'));
        $profile->hire_status = '1';
        $profile->save();

        $post = Post::find(request('post_id'));
        $post->hired_num = $post->hired_num + 1;
        $post->save();

        $comments = Comments::find(request('comment_id'));
        $comments->hired_status = '1';
        $comments->save();

        return redirect()->to('/home');
    }
}
