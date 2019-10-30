@extends('layouts.app')
@section('content')

<h3>{{$notification->name}}</h3>
<h5>{{$notification->message}}</h5>
<form action="/setAppointment/accept" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
<input type="text" name="notif_id" value="{{$notification->notif_id}}" hidden>
<input type="text" name="company_id" value="{{$notification->company_id}}" hidden>
<button class="btn btn-primary">Accept</button>
</form>
@endsection