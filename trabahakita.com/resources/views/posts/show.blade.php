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
     
                    @if(auth()->user()->type == 'company')
                    <div class="container" style="margin-top:10px;">
                            <h3>Comments</h3>
                    </div>
                            @if (count($comments) > 0)
                                @foreach($comments as $com)
                                    @if($com->post_id == $post->id)
                                        <div class="card" style=" margin-top:5px;">
                                            <div class="card-body">
                                                    <div class="card-title">      
                                                            <h3>{{$com->name}}</h3>          
                                                        </div>
                                                        <h6 class="card-subtitle mb-2 text-muted">Actions</h6>
                                                        <div class="card-footer">
                                                            <div class="row">
                                                                <div class="col-sm">
                                                                        <form action="/post/pdf" method="POST" enctype="multipart/form-data">
                                                                            {{ csrf_field() }}
                                                                        <input type="text" name="id" value="{{$com->user_id}}" hidden>
                                                                        <button class="btn btn-info"><a href="/profile/{{$com->user_id}}" style="color:white">View Profile</a></button>
                                                                        <button type="submit" class="btn btn-secondary">Download Resume</button>
                                                                    </form>
                                                                       
                                                                </div>
                                                               
                                                            </div>
                                                            
                                                        </div>
                                            </div>
                                        </div> 
                                    @endif
                                  
                                   
      
                                @endforeach
                              
                               
                  
                                                                               
     
      
                            @endif
                            

                    
                    @elseif(auth()->user()->type == 'employee')   
                        @if(count($comments) > 0)
                        @foreach($comments as $com)
                            <div class="card" style=" margin-top:5px;">
                                    <div class="card-body">
                                            <div class="card-title">      
                                                    <h3>{{$com->name}}</h3>          
                                                </div>
                                                <h6 class="card-subtitle mb-2 text-muted">Actions</h6>

                                                <div class="card-text">
                                                <h5>{{$com->message}}</h5>
                                                </div>
                                                <div class="card-footer">
                                                        <button class="btn btn-danger" type="submit">Decline Application</button>
                                                    </div>
                                    </div>
                                </div> 
                                @endforeach
                          @else
                            <form method="post" action="/post/comment">
                                {{ csrf_field() }}
                                    <div class="card" style="margin-top:5px;">
                                        <div class="card-body">
                                            <div class="card-title">
                                                   <p>
                                                    <span style="font-family: Montserrat;font-weight:400; font-size:1em">Application Form</span>
                                                </p>
                                                </div>
                                                <div class="container">
                                                        <div class="card-text">
                                                                <div class="form-group row">
                                                                        <input hidden name="post_id" type="text" class="form-control" id="post_id"
                                                                        value="{{$post->id}}">
                                                                        <input hidden name="company_id" type="text" class="form-control" id="company_id"
                                                                        value="{{$post->company_id}}">
                                                                        <textarea name="message" id="message" class="form-control" cols="30" rows="3" placeholder="Skill Summary"></textarea>
            
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="">Contacts</label>
                                                                    <input name="fb" type="text" class="form-control" id="fb" placeholder="FACEBOOK">
                                                            </div>
                                                            <div class="form-group row">
                                                                    <input name="viber" type="text" class="form-control" id="viber" placeholder="VIBER">
                                                            </div>
                                                             <div class="form-group row">
                                                                    <input name="email" type="text" class="form-control" id="email" placeholder="EMAIL">
                                                             </div>
                                                                    
                                                                   
                                                        </div>
                                                        </div>
                                                </div>
                                                            <div class="card-footer">
                                                            <button class="btn btn-primary" type="submit">Apply</button>
                                                        </div> 
                                    </div>        
                                </div>
                            </form>
                           
                          
@endif
                           
                           
                       @endif
                        
                      
   
   
    
@endsection