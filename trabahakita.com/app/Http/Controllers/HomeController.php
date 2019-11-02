<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;


class HomeController extends Controller
{
    //
    public function index()
    {
        if(auth()->check())
        {
            if(auth()->user()->type == 'employee')
            {
                $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
                return view('home')->with( 'notifcount', $notifcount);    
            }
            else{
                $notifcount = Notification::where(['company_id' => auth()->user()->id, 'type' => 'company', 'message_status' => '0']);
            return view('home')->with( 'notifcount', $notifcount);  
            }
        }
        else
        {
            return view('home');
        }
    }
}
