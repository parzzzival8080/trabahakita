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
    if (auth()->check()) {
      if (request('type') == 'hire') {
        $notification = new Notification;
        $notification->company_id = auth()->user()->id;
        $notification->app_id = request('post_id');;
        $notification->user_id = request('user_id');
        $notification->name = auth()->user()->name;
        $notification->subject = auth()->user()->name . ' Wants to hire you!';
        $notification->type = 'employee';
        $notification->from = 'company';
        $notification->message_type = '2';
        $notification->to = request('name');
        $notification->message = request('message');

        $notification->save();


        $comments = Comments::find(request('comment_id'));
        $comments->hired_status = '1';
        $comments->save();

        $notifications = Notification::find($notification->id);
        $notifications->message_status = '1';
        $notifications->save();

        return redirect()->to('/Notification')->with('success', 'Successfully Sent');
      } elseif (request('type') == 'message') {
        if (auth()->user()->type == 'company') {
          if (request('msg_type') == 'reply') {
            $notification = new Notification;
            $notification->company_id = auth()->user()->id;
            // $notification->app_id = $appointment->id;
            $notification->user_id = request('user_id');
            $notification->name = auth()->user()->name;
            $notification->subject = auth()->user()->name . ' sent you a message';
            $notification->message_type = '0';
            $notification->type = 'employee';
            $notification->from = 'company';
            $notification->to = request('name');
            $notification->message = request('message');
            $notification->save();

            $notifications = Notification::find(request('notif_id'));
            $notifications->message_status = '1';
            $notifications->save();


            return redirect()->to('/Notification')->with('success', 'successfully Sent');
          } else {
            $appointment = new Appointment;
            $appointment->company_id = auth()->user()->id;
            $appointment->user_id = request('user_id');
            $appointment->company_name = auth()->user()->name;
            $appointment->user_name = request('user_name');
            $appointment->save();

            $notification = new Notification;
            $notification->company_id = auth()->user()->id;
            $notification->app_id = request('post_id');
            $notification->user_id = request('user_id');
            $notification->name = auth()->user()->name;
            $notification->subject = auth()->user()->name . ' sent you a message';
            $notification->message_type = '0';
            $notification->type = 'employee';
            $notification->from = 'company';
            $notification->to = request('name');
            $notification->message = request('message');
            $notification->save();

            return redirect()->to('/Notification')->with('success', 'Successfully Sent');
          }
        } elseif (auth()->user()->type == 'employee') {
          $notification = new Notification;
          $notification->company_id = request('user_id');
          // $notification->app_id = request('app_id');
          $notification->user_id = auth()->user()->id;
          $notification->name = auth()->user()->name;
          $notification->subject = auth()->user()->name . ' sent you a message';
          $notification->message_type = '0';
          $notification->type = 'company';
          $notification->from = 'employee';
          $notification->to = request('name');
          $notification->message = request('message');
          $notification->save();

          $notifications = Notification::find(request('notif_id'));
          $notifications->message_status = '1';
          $notifications->message_type = '1';
          $notifications->save();



          return redirect()->to('/Notification')->with('success', 'Successfully Sent');
        }
      }
    } else {
      return redirect()->to('/login');
    }
  }
}
