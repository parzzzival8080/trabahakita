@extends('layouts.app')
@section('content')
    <h1>
        POSTS
        </h1>
    <div class="container">
    <div class="card">
        <div class="container">

        <h2>{{$post->company_name}}</h2>
        <br>
        <h4>Job Position:{{$post->Title}}</h4>
        <h4>Job Type:    {{$post->job_type}}</h4>
        <h4>Salary:    {{$post->salary}}</h4>
        <h4>Description</h4>
        <h5>
                {{$post->description}}
            </h5>
            

        </div>
        <div class="card">
            <div class="container">
                    <div class="container">

                            <h3>Comments</h3>
                    @if(auth()->user()->type == 'company')
                    <div class="container">
                            @if (count($comments) > 0)
                                @foreach($comments as $com)
                                    @if($com->post_id == $post->id)
                                    <h3>{{$com->name}}</h3>
                                    <h5>{{$com->comment_desc}}</h5>
                                    <button class="btn btn-primary"><a href="/profile/{{$com->user_id}}" style="color:white">Visit</a></button>
                                    @endif
                                @endforeach
                            @endif
                    </div>
                    @elseif(auth()->user()->type == 'employee')
                    <form method="post" action="/post/comment">
                                {{ csrf_field() }}
                                <div class="container">
                                        <div class="form-group row">
                                                <input hidden name="post_id" type="text" class="form-control" id="post_id"
                                                value="{{$post->id}}">
                                                <input hidden name="company_id" type="text" class="form-control" id="company_id"
                                                value="{{$post->company_id}}">
                                                <label for="commentid" class="col-sm-3 col-form-label"></label> 
                                                    <input name="comment" type="text" class="form-control" id="commentid"
                                                           placeholder="comment here...">
                                             
                                               
                                            </div>
                                </div>
                                <div class="container">
                                        <button class="btn btn-primary" type="submit">Apply</button>
                                   </div>
                                
                            </form>
                            <div class="container">
                                    @if (count($comments) > 0)
                                        @foreach($comments as $com)
                                            @if($com->post_id == $post->id)
                            <h3>{{$com->name}}</h3>
                            <h5>{{$com->comment_desc}}</h5>

                                            @endif
                                        @endforeach
                                    @endif
    
                            </div>
                            @endif
                        </div>
                        </div>
                       
            </div>
      
    </div>
   
    </div>
@endsection