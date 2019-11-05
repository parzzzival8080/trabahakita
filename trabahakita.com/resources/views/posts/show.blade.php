@extends('layouts.app')
@section('content')
   
    <div class="card" style="margin-top:5px">
       <div class="card-body">
           <div class="card-title">
                <h2>{{$post->company_name}}</h2>
           </div>
       
       <div class="container">
            <h6 class="card-subtitle mb-2 text-muted">Job Position:{{$post->Title}}</h6>
       </div>
       <div class="container">
            <div class="card-text">
                    <h4>Job Type:{{$post->job_type}}</h4>
                    <h4>Salary:  {{$post->salary}}</h4>
                   
               </div>
       </div> 
        <div class="card-footer">
                <h4>Description</h4>
        </div>
        </div>
    </div>
    </div>   
                    @if(auth()->user()->type == 'company')
                    <div class="container" style="margin-top:10px;">
                            <h3>Comments</h3>
                    </div>
                            @if (count($comments) > 0)
                                @foreach($comments as $com)
                                    @if($com->post_id == $post->id)
                                    <div class="container">
                                        <div class="card" style=" margin-top:5px;">
                                            <div class="card-body">
                                                    <div class="card-title">      
                                                            <h3>{{$com->name}}</h3>          
                                                        </div>
                                                        <h6 class="card-subtitle mb-2 text-muted">Content</h6>
                                                            <div class="card-text">
                                                                <h5>{{$com->comment_desc}}</h5>
                                                            </div> 
                                                        <div class="card-footer">
                                                            <button class="btn btn-info"><a href="/profile/{{$com->user_id}}" style="color:white">View Profile</a></button>
                                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            @endif
                    
                    @elseif(auth()->user()->type == 'employee')
                    <form method="post" action="/post/comment">
                                {{ csrf_field() }}
                                <div class="container" style="margin-top:5px;">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-title">
                                                   <p>
                                                    <span style="font-family: Montserrat;font-weight:400; font-size:1em">Put your message here</span>
                                                </p>
                                                </div>
                                                <div class="container">
                                                        <div class="card-text">
                                                                <div class="form-group row">
                                                                        <input hidden name="post_id" type="text" class="form-control" id="post_id"
                                                                        value="{{$post->id}}">
                                                                        <input hidden name="company_id" type="text" class="form-control" id="company_id"
                                                                        value="{{$post->company_id}}">
                                                                        <label for="commentid" class="col-sm-3 col-form-label"></label> 
                                                                            <input name="comment" type="text" class="form-control" id="commentid"
                                                                        placeholder="message here...">
                                                            </div>
                                                        </div>
                                                </div>
                                                            <div class="card-footer">
                                                            <button class="btn btn-primary" type="submit">Apply</button>
                                                        </div>
                                               
                                          
                                        </div>
                                    </div>
                                        
                                </div>
                               
                                
                            </form>
                           
                                    @if (count($comments) > 0)
                                    @foreach($comments as $com)
                                        @if($com->post_id == $post->id)
                                        <div class="container">
                                            <div class="card" style=" margin-top:5px;">
                                                <div class="card-body">
                                                        <div class="card-title">      
                                                                <h3>{{$com->name}}</h3>          
                                                            </div>
                                                            <h6 class="card-subtitle mb-2 text-muted">Content</h6>
                                                                <div class="card-text">
                                                                    <h5>{{$com->comment_desc}}</h5>
                                                                </div>  
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                @endif
    
                           
                            @endif
                       
      
   
   
    
@endsection