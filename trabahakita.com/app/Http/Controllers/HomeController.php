<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\Profile;


class HomeController extends Controller
{
    //
    public function index()
    {
        if(auth()->check())
        {
            $profile = Profile::find(auth()->user()->id);
            if ($profile->status_update == '' || $profile->status_update == '0')
            {
                return redirect()->to('/employee/profile');
            }
            elseif($profile->status_update == '1')
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
            
        }
        else
        {
            return view('home');
        }
    }
}
