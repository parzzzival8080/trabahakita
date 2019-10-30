@extends('layouts.app')
@section('content')   
      @if(count($notification) > 0)
            @foreach($notification as $notif)
            @if($notif->type == 'employee')
                @if($notif->user_id == auth()->user()->id)
                <h4>From:{{$notif->name}}</h4>
                <h5>Subject:{{$notif->subject}}</h5>
                <button class="btn btn-info"><a href="/Notification/show/{{$notif->id}}" style="color:white">View</a> </button>
                @endif
            @elseif($notif->type == 'company')
            @if($notif->company_id == auth()->user()->id)
            <h4>From:{{$notif->name}}</h4>
            <h5>subject:{{$notif->subject}}</h5>
            <button class="btn btn-info"><a href="/Notification/show/{{$notif->id}}" style="color:white">View</a> </button>
            @endif
                @endif
            @endforeach
    @endif
@endsection