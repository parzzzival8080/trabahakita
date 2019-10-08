@extends('layouts.app')
@section('content')
<h5>
       
            {{$indi_post->title}}
        <div>

                {{$indi_post->body}}
            </div>
        </h5>
    <h6>{{$indi_post->created_at}}</h6>
    

@endsection
