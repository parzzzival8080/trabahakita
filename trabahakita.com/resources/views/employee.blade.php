@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="card">
                {!! Form::open(['action'=> 'PostController@store','method' => 'POST']) !!}
                <div class="form-group">
                    {{Form::label('company_name','Company Name')}}
                    {{Form::text('company_name','',['class' => 'form-control', 'placeholder' => 'Company Name'])}}
                    </div>
                    <div class="form-group">
                            {{Form::label('field','Field of Work')}}
                            {{Form::text('field','',['class' => 'form-control', 'placeholder' => 'Field'])}}
                            </div>
                            <div class="form-group">
                                    {{Form::radio('payment_type', 'hourly')}}
                                    {{Form::label('hourly','HOURLY')}}
                                    </div>
                                    <div class="form-group">.
                                            {{Form::radio('payment_type', 'fixed')}}
                                            {{Form::label('fixed','FIXED PRICE')}}
                                            </div>
                    {{Form::submit('Post',['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}  
        </div>
    </div>
@endsection