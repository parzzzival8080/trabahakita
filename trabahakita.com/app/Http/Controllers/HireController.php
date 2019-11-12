<?php

namespace App\Http\Controllers;

use App\Hire;
use App\Notification;
use App\Profile;
use Illuminate\Http\Request;
use App\Post;
use App\Comments;
use App\Appointment;

class HireController extends Controller
{
    //

    public function store(Request $request)
    {
        if(request('type') == 'hire')
        {
            $posttitle =Post::find(request('post_id'));
        
            $hire = New Hire;
            $hire->company_id = auth()->user()->id;
            $hire->company_name = auth()->user()->name;
            $hire->user_id = request('id');
            $hire->post_id = request('post_id');
            $hire->user_name = request('name');
            $hire->position = $posttitle->Title;
            $hire->message_status = '0';
            $hire->save();
    
          
            $notification = New Notification;
            $notification->company_id = auth()->user()->id;
            $notification->app_id = $hire->id;
            $notification->user_id = request('id');
            $notification->name = auth()->user()->name;
            $notification->subject = auth()->user()->name.' Wants to hire you!';
            $notification->type ='employee';
            $notification->from ='company';
            $notification->to = request('name');
            $notification->message = request('message');
            
            $notification->save();
    
            $profile = Profile::find(request('id'));
            $profile->hire_status = '1';
            $profile->save();
    
            $post = Post::find(request('post_id'));
            $post->employee_num = $post->employee_num + 1;
            $post->save();
    
            $comments = Comments::find(request('comment_id'));
            $comments->hired_status = '1';
            $comments->save();
    
            return redirect()->to('/home');
        }

        elseif(request('type') == 'message')
        {
            if(auth()->user()->type == 'company')
            {
                $appointment = new Appointment;
                $appointment->company_id = auth()->user()->id;
                $appointment->user_id = request('id');
                $appointment->company_name = auth()->user()->name;
                $appointment->user_name = request('name');
                $appointment->save();
    
                $notification = New Notification;
                $notification->company_id = auth()->user()->id;
                $notification->app_id = $appointment->id;
                $notification->user_id = request('id');
                $notification->name = auth()->user()->name;
                $notification->subject = auth()->user()->name.' sent you a message';
                $notification->message_type = '0';
                $notification->type ='employee';
                $notification->from ='company';
                $notification->to = request('name');
                $notification->message = request('message');
                $notification->save();
    
                return redirect()->to('/home');
            }
            elseif(auth()->user()->type == 'employee')
            {
                $notification = New Notification;
                $notification->company_id = auth()->user()->id;
                $notification->app_id = request('app_id');
                $notification->user_id = auth()->user()->id;
                $notification->name = auth()->user()->name;
                $notification->subject = auth()->user()->name.' sent you a message';
                $notification->message_type = '0';
                $notification->type ='company';
                $notification->from ='employee';
                $notification->to = request('name');
                $notification->message = request('message');
                $notification->save();

                $notifications = Notification::find(request('notif_id'));
                $notifications->message_status = '1';
                $notifications->save();

                

                return redirect()->to('/Notification');
            }
           
        }
       
    }
}
