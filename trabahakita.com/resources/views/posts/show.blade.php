@extends('layouts.app')
@section('content')
   
    <div class="card" style="margin-top:5px">
       
            <div class="card-body">
                    <div class="card-header">
                          <h3>{{$post->Title}}</h3>
                          <h6 class="card-subtitle mb-2 text-muted"><a href="/company/profile/{{$post->company_id}}" class="text-muted">{{$post->company_name}}</a></h6>
                    </div>
                     <div class="card-text" style="margin:10px">
                      <h6 class="text-muted">Type:{{$post->job_type}}</h6>
                      <h6 class="text-muted">Field:{{$post->job_field}}</h6>
                      <h6 class="text-muted">Needed:{{$post->emp_hired}}/{{$post->employee_num}}</h6>
                      <h6 class="text-muted">Date Posted:{{$post->created_at->toDateString()}}</h6>
                      </div>
                      <div class="card-footer">
                              <h3>Job Description:</h3>
                              <h6>
                                  {{$post->description}}
                              </h6>
                              
                      </div>
                  </div>  
        </div>
   
     
                    @if(auth()->user()->type == 'company')
                    <div class="container" style="margin-top:10px;">
                            <h3>Applicants</h3>
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
                                                <h5 class="card-subtitle mb-2 text-muted">Application Summary</h5>

                                                <div class="card-text">
                                                
                                                <h6>{{$com->message}}</h6>
                                                Contacts:
                                                <h6>{{$com->contact_fb}}</h6>
                                                <h6>{{$com->contact_twitter}}</h6>
                                                <h6>{{$com->contact_email}}</h6>
                                                </div>
                                                <div class="card-footer">
                                                        <button class="btn btn-info" type="submit" disabled>Application Submitted</button>
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
                                                                        <input hidden name="company_name" type="text" class="form-control" id="company_name" value="{{$post->company_name}}">
                                                                        <textarea name="message" id="message" class="form-control" cols="30" rows="8" placeholder="Skill Summary" required></textarea>
            
                                                            </div>
                                                            <label for="">Contacts</label>
                                                            <div class="form-group row">
                                                                <div class="col">
                                                                    <input name="fb" type="text" class="form-control" id="fb" placeholder="Facebook" required>
                                                                </div>
                                                                <div class="col">
                                                                    <input name="viber" type="text" class="form-control" id="viber" placeholder="Viber" required>
                                                                </div>
                                                                <div class="col">
                                                                    <input name="email" type="text" class="form-control" id="email" placeholder="Email" value="{{auth()->user()->email}}" required>
                                                                </div>
                                                               
                                                            </div>
                                                           
                                                                    
                                                                   
                                                        </div>
                                                        </div>
                                                </div>
                                                            <div class="card-footer">
                                                                <div class="d-flex justify-content-end">
                                                                    <button class="btn btn-primary" type="submit">Apply</button>
                                                                </div>
                                                           
                                                        </div> 
                                    </div>        
                                </div>
                            </form>
                           
                          
@endif
                           
                           
                       @endif
                        
                      
   
   
    
@endsection