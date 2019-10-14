@extends('layouts.app')
@section('content')
    <h1>
        POSTS
        </h1>
    <div class="container">
    <div class="card">
        <div class="container">
        <h1>{{$post->company_name}}</h1>
        </div>
        <div class="container">
                <h3>{{$post->Title}}</h3>
                <h3>{{$post->description}}</h3>

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
                    <h5>{{$com->comment_desc}}</h5>
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
                                        <button class="btn btn-primary" type="submit">Comment</button>
                                   </div>
                                
                            </form>
                            <div class="container">
                                    @if (count($comments) > 0)
                                        @foreach($comments as $com)
                                            @if($com->post_id == $post->id)
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