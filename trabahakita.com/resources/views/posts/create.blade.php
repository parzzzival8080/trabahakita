@extends('layouts.app')
@section('content')
<h3>CREATE POST</h3>
{!! Form::open(['action'=> 'PostController@store','method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>
            <div class="form-group">
                    {{Form::label('body','Description')}}
                    {{Form::textarea('body','',['class' => 'form-control', 'placeholder' => 'Description'])}}
                    </div>
            {{Form::submit('Post',['class' => 'btn btn-primary'])}}
{!! Form::close() !!}
@endsection