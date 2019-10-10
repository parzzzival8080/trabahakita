@extends('layouts.app')
@section('content')
<h1>
        POSTS
        </h1>

   
        @if (count($post) > 0)
        @foreach ($post as $posts)
        <div class="container" style="margin-top:20px;">
        <div class="card">
            <div class="container">

                <h3>Job Title:{{$posts->Title}}</h3>
                <h3>Job Description:</h3>
                <h5>
                    
                    {{$posts->description}}
                </h5>
                <div class="form-group row">
                    <div class="offset-sm-3 col-sm-9">
                        <button class="btn btn-primary">Check it Out</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @endforeach
     @endif
   

@endsection
