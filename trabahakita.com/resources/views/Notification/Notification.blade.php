@extends('layouts.app')
@section('content')   
      @if(count($notification) > 0)
        <h1>Notification</h1>
            @foreach($notification as $notif)
            @if($notif->type == 'employee')
                @if($notif->user_id == auth()->user()->id)
                <div class="card" style="margin-top:10px">
                        <div class="container" >
                            <div class="row">
                                <div class="col-sm" style="padding:10px;">
                                    <h5>From: {{$notif->name}}</h5>
                                </div>
                                <div class="col-sm" style="padding:10px;">
                                    <h5>Subject: {{$notif->subject}}</h5>
                                </div>
                                <div class="col-sm" style="padding:10px;">
                                        <h5>Subject: {{$notif->subject}}</h5>
                                    </div>
                                    <div class="col-sm" style="padding:10px;">
                                            <h5>Subject: {{$notif->subject}}</h5>
                                        </div>
                               
                                <div class="col-sm" style="padding:10px;">
                                    <button class="btn btn-info"><a href="/Notification/show/{{$notif->id}}" style="color:white">View</a> </button>
                                    <button class="btn btn-danger"><a href="/Notification/show/{{$notif->id}}" style="color:white">Delete</a> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @elseif($notif->type == 'company')
            @if($notif->company_id == auth()->user()->id)
            <div class="card" style="margin-top:10px">
                <div class="container" >
                    <div class="row">
                        <div class="col-sm" style="padding:10px;">
                            <h5>From: {{$notif->name}}</h5>
                        </div>
                        <div class="col-sm" style="padding:10px;">
                            <h5>Subject: {{$notif->subject}}</h5>
                        </div>
                        <div class="col-sm" style="padding:10px;">
                                <h5>Date: {{$notif->subject}}</h5>
                            </div>
                            <div class="col-sm" style="padding:10px;">
                                    <h5>Subject: {{$notif->subject}}</h5>
                                </div>
                        <div class="col-sm" style="padding:10px;">
                            <button class="btn btn-info"><a href="/Notification/show/{{$notif->id}}" style="color:white">View</a> </button>
                            <button class="btn btn-danger"><a href="/Notification/show/{{$notif->id}}" style="color:white">Delete</a> </button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
                @endif
            @endforeach
    @endif

   
@endsection