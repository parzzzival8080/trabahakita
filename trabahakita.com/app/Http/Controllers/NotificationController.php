<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Appointment;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(auth()->user()->type == 'employee')
        {
            $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
            $notification = Notification::all();
            return view('notification.notification')->with(['notification' => $notification, 'notifcount' => $notifcount]);    
        }
        else{
            $notifcount = Notification::where(['company_id' => auth()->user()->id, 'type' => 'company', 'message_status' => '0']);
            $notification = Notification::all();
            return view('notification.notification')->with(['notification' => $notification, 'notifcount' => $notifcount]);  
        }
     
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
   

    public function show($id)
    {

        $notification = Notification::find($id);
        $appointment = Appointment::find($notification->app_id);
        $notification->message_status = '1';
        $notification->save();
          if(auth()->user()->type == 'employee')
        {
            $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
            return view('notification.show')->with(['notification' => $notification, 'notifcount' => $notifcount, 'appointment' => $appointment]);    
        }
        else{
            $notifcount = Notification::where(['company_id' => auth()->user()->id, 'type' => 'company', 'message_status' => '0']);
        return view('notification.show')->with(['notification' => $notification, 'notifcount' => $notifcount, 'appointment' => $appointment]);  
        }
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update()
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
    }

   
}
