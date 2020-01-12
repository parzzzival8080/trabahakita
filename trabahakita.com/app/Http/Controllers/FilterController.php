<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Notification;

class FilterController extends Controller
{
    //


    public function cat()
    {

        $post = Post::where(['job_field' => 'Accounting & Consulting'])->orderBy('id', 'desc')->get();
        // $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
        return view('Category.field_1')->with(['post' => $post]);
    }
    public function health()
    {
        $post = Post::where(['job_field' => 'Admin Support'])->orderBy('id', 'desc')->get();
        // $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
        return view('Category.field_2')->with(['post' => $post]);
    }
    public function education()
    {

        $post = Post::where(['job_field' => 'Data Science & Analytics'])->orderBy('id', 'desc')->get();
        // $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
        return view('Category.field_3')->with(['post' => $post,]);
    }
    public function arts()
    {

        $post = Post::where(['job_field' => 'Design & Creative'])->orderBy('id', 'desc')->get();
        // $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
        return view('Category.field_4')->with(['post' => $post,]);
    }
    public function trade()
    {

        $post = Post::where(['job_field' => 'Engineering & Architecture'])->orderBy('id', 'desc')->get();
        // $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
        return view('Category.field_5')->with(['post' => $post,]);
    }
    public function management()
    {

        $post = Post::where(['job_field' => 'IT & Engineering'])->orderBy('id', 'desc')->get();
        $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
        return view('Category.field_6')->with(['post' => $post,]);
    }
    public function arch()
    {

        $post = Post::where(['job_field' => 'Legal'])->orderBy('id', 'desc')->get();
        // $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
        return view('Category.field_7')->with(['post' => $post,]);
    }
    public function Science()
    {

        $post = Post::where(['job_field' => 'Translation'])->orderBy('id', 'desc')->get();
        // $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
        return view('Category.field_8')->with(['post' => $post,]);
    }
    public function tour()
    {

        $post = Post::where(['job_field' => 'Customer Service'])->orderBy('id', 'desc')->get();
        // $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
        return view('Category.field_1')->with(['post' => $post,]);
    }
    public function law()
    {

        $post = Post::where(['job_field' => 'Web, Mobile & Software Development'])->orderBy('id', 'desc')->get();
        // $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
        return view('Category.field_1')->with(['post' => $post,]);
    }
}
