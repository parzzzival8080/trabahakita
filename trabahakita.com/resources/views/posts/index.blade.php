@extends('layouts.app')
@section('content')

        @if(auth()->user()->type == 'employee')
        @if (count($post) > 0)
        <h1>
                POSTS
                </h1>
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
                    <button class="btn btn-primary"><a href="/post/show/{{$posts->id}}" style="color:white">Check it Out</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <h1>there are no posts</h1>
    @endif
        @else
        <h1>
                POSTS     <button class="btn btn-primary"><a href="/post/create" style="color:white">Create One</a></button>
                </h1>
        @if (count($post) > 0)
       
        @foreach ($post as $posts)
        @if($posts->company_id == auth()->user()->id)
      
      
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
                        <button class="btn btn-primary"><a href="/post/show/{{$posts->id}}" style="color:white">View</a></button>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
    @endif
    @endforeach
    @else
    <h1>You have no posts</h1>
   
    
    @endif
    @endif
    
     
   

@endsection
