<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Notification;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('Appointment.appointmentset');
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
        if (auth()->user()->type == 'company')
        {
            $appointment = new Appointment;
            $appointment->company_id = auth()->user()->id;
            $appointment->user_id = request('id');
            $appointment->company_name = auth()->user()->name;
            $appointment->user_name = request('name');
            $appointment->date = request('date');
            $appointment->time = request('time');
            $appointment->save();
    
            
            $notification = new Notification;
            $notification->company_id = auth()->user()->id;
            $notification->notif_id = $appointment->id;
            $notification->user_id = request('id');
            $notification->subject = 'Set an Interview';
            $notification->name = auth()->user()->name;
            $notification->message = request('message');
            $notification->type = 'employee';
            $notification->save();
    
            return redirect()->to('/post');  
        }
        elseif (auth()->user()->type == 'employee')
        {

            $appointment = Appointment::find(request('notif_id'));
            $appointment->appointment_status = '1';
            $appointment->save();

            $notification = new Notification;
            $notification->user_id = auth()->user()->id;
            $notification->company_id = request('company_id');
            $notification->app_id = $appointment->id;
            $notification->subject = 'Interview Accepted';
            $notification->type = 'company';
            $notification->name = auth()->user()->name;
            $notification->message = request('message');
            $notification->save();

            return redirect()->to('/post');  
        }
      
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
