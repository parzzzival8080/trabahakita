@extends('layouts.app')
@section('content') 
@if(auth()->check())

@if(auth()->user()->type == 'employee')
{{-- <div class="row" style="padding:1em">
        <div class="col">
                <img src={{ asset('storage/images/maps.jpg') }} class="rounded mx-auto d-block"/>
        </div>
        
        <div class="col" style="margin-top:3em;">
          
            <h1 style="font-family:Century Gothic; font-weight: 300; ">WHAT DO YOU WANT TO DO?</h1>
            <button class="btn btn-info round">Scan for nearby applications</button>
                
        </div>
    </div>  --}}
    
   
    <div class="container" style="margin-top:5px">
        <h1>Bulletin Board</h1>
        <div class="container" style="margin-top">
                <input type="text" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-info" type="submit">Search</button>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-sm">
                <div class="card">
                    <div class="card-header">
                            Computers and Technology
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <center>
                           <button class="btn btn-success">{{$post_field_1->count()}} Job Postings</button> 
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                    <div class="card" >
                            <div class="card-header">
                                    Health Care and Allied Health
                            </div>
                            <div class="card-body">
                                <div class="card-text">
                                        <center>
                                                <button class="btn btn-success">{{$post_field_2->count()}} Job Postings</button> 
                                                 </center>
                                </div>
                            </div>
                        </div>
            </div>
            <div class="col">
                    <div class="card">
                            <div class="card-header">
                                    Education and Social Services
                            </div>
                            <div class="card-body">
                                <div class="card-text">
                                        <center>
                                                <button class="btn btn-success">{{$post_field_3->count()}} Job Postings</button> 
                                                 </center>
                                </div>
                            </div>
                        </div>
            </div>
        </div>

        <div class="row" style="margin-top:10px;">
                <div class="col-sm">
                    <div class="card">
                        <div class="card-header">
                                Arts and Communications
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                    <center>
                                            <button class="btn btn-success">{{$post_field_4->count()}} Job Postings</button> 
                                             </center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                        <div class="card">
                                <div class="card-header">
                                        Trades and Transportation
                                </div>
                                <div class="card-body">
                                    <div class="card-text">
                                            <center>
                                                    <button class="btn btn-success">{{$post_field_5->count()}} Job Postings</button> 
                                                     </center>
                                    </div>
                                </div>
                            </div>
                </div>
                <div class="col">
                        <div class="card">
                                <div class="card-header">
                                        Management, Business, and Finance
                                </div>
                                <div class="card-body">
                                    <div class="card-text">
                                            <center>
                                                    <button class="btn btn-success">{{$post_field_6->count()}} Job Postings</button> 
                                                     </center>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>

            <div class="row" style="margin-top:10px;">
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-header">
                                    Architecture and Civil Engineering
                            </div>
                            <div class="card-body">
                                <div class="card-text">
                                        <center>
                                                <button class="btn btn-success">{{$post_field_7->count()}} Job Postings</button> 
                                                 </center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                            <div class="card">
                                    <div class="card-header">
                                            Science
                                    </div>
                                    <div class="card-body">
                                        <div class="card-text">
                                                <center>
                                                        <button class="btn btn-success">{{$post_field_8->count()}} Job Postings</button> 
                                                         </center>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    <div class="col">
                            <div class="card">
                                    <div class="card-header">
                                            Hospitality, Tourism, and the Service Industry
                                    </div>
                                    <div class="card-body">
                                        <div class="card-text">
                                                <center>
                                                        <button class="btn btn-success">{{$post_field_9->count()}} Job Postings</button> 
                                                         </center>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                <div class="row" style="margin-top:10px;">
               
                        <div class="card">
                                <div class="card-header">
                                        Hospitality, Tourism, and the Service Industry
                                </div>
                                <div class="card-body">
                                    <div class="card-text">
                                            <center>
                                                    <button class="btn btn-success">{{$post_field_10->count()}} Job Postings</button> 
                                                     </center>
                                    </div>
                                </div>
                            </div>
                </div>
                    
            </div>
               
    </div>
                    
            
               
@elseif(auth()->user()->type == 'company')
    


    <div class="row" style="margin-top:10px">
            <div class="col-3">
              <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-create-post" role="tab" aria-controls="v-pills-home" aria-selected="true">CREATE YOUR POST</a>
                    @if(count($post) > 0)
                    @foreach($post as $posts)
                    @if($posts->company_id == auth()->user()->id)
              <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-post{{$posts->id}}" role="tab" aria-controls="v-pills-home" aria-selected="true">{{$posts->Title}}</a>
                @endif
                @endforeach
                @endif
              </div>
            </div>
            <div class="col-9">
              <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-create-post" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        {{-- Create Posting --}}
                        <div class="card">
                            <div class="card-title">
                            <center>
                                    <h1>Job Opening</h1>
                            </center>
                            </div>
                            <div class="card-text">
                                   
                                            <div class="container" style="padding:20px;">
                                                
                                                <form method="POST" action="/post" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <div class="form-group row">
                                                            <label for="title" class="col-sm-3 col-form-label">Position</label>
                                                            <div class="col-sm-9">
                                                                <input name="title" type="text" class="form-control" id="title" placeholder="Position" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="empid" class="col-sm-3 col-form-label">Job Type</label>
                                                                <div class="col-sm-9">
                                                                        <select class="custom-select mr-sm-2" id="type" name="type">
                                                                                <option   selected>Choose...</option>
                                                                                <option value="Full Time">Full Time</option>
                                                                                <option value="Term">Term</option>
                                                                                <option value="Project">Project</option>
                                                                                <option value="Seasonal">Seasonal</option>
                                                                                <option value="Casual">Casual</option>
                                                                              </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                    <label for="empid" class="col-sm-3 col-form-label">Job Field</label>
                                                                    <div class="col-sm-9">
                                                                            <select class="custom-select mr-sm-2" id="field" name="field">
                                                                                    <option   selected>Choose...</option>
                                                                                    <option value="Computers and Technology">Computers and Technology</option>
                                                                                    <option value="Health Care and Allied Health">Health Care and Allied Health</option>
                                                                                    <option value="Education and Social Services">Education and Social Services</option>
                                                                                    <option value="Arts and Communications">Arts and Communications</option>
                                                                                    <option value="Trades and Transportation">Trades and Transportation</option>
                                                                                    <option value="Management, Business, and Finance">Management, Business, and Finance</option>
                                                                                    <option value="Architecture and Civil Engineering">Architecture and Civil Engineering</option>
                                                                                    <option value="Science">Science</option>
                                                                                    <option value="Hospitality, Tourism, and the Service Industry">Hospitality, Tourism, and the Service Industry</option>
                                                                                    <option value="Law and Law Enforcement">Law and Law Enforcement</option>
                                                                                  </select>
                                                                    </div>
                                                                </div>
                                                            <div class="form-group row">
                                                                    <label for="person" class="col-sm-3 col-form-label">Number of Person</label>
                                                                    <div class="col-sm-9">
                                                                        <input name="person" type="text" class="form-control" id="person"
                                                                               placeholder="Input Number" required>
                                                                    </div>
                                                            </div>
                                                       
                                                        <div class="form-group row">
                                                                <label for="salary" class="col-sm-3 col-form-label">Tentative Salary</label>
                                                                <div class="col-sm-9">
                                                                    <input name="salary" type="text" class="form-control" id="salary"
                                                                           placeholder="Tentative Salary" required>
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="desc" class="col-sm-3 col-form-label">DESCRIPTION</label>
                                                                <div class="col-sm-9">
                                                                    <textarea name="description" type="text" class="form-control" id="desc" rows="5"
                                                                           placeholder="DESCRIPTION" ></textarea>
                                                                </div>
                                                        </div>
                                                        
                                                               
                                                        <div class="form-group row">
                                                            <div class="offset-sm-3 col-sm-9">
                                                                <button type="submit" class="btn btn-primary">Post Job</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                    
                                                    
                                           
                            </div>
                        </div>
                    </div>
                           
                    @if(count($post) > 0)
                    @foreach($post as $posts)
                    @if($posts->company_id == auth()->user()->id)
                <div class="tab-pane fade show" id="v-pills-post{{$posts->id}}" role="tabpanel" aria-labelledby="v-pills-home-tab">

                        <div class="card" style="margin-top:5px">
                                <div class="card-body">
                                    <div class="card-title">
                                         <h2>Job Position:{{$posts->Title}}</h2>
                                    </div>
                                
                                <div class="container">
                                     <h6 class="card-subtitle mb-2 text-muted">{{$posts->company_name}}</h6>
                                </div>
                                <div class="container">
                                     <div class="card-text">
                                             <h4>Job Type:{{$posts->job_type}}</h4>
                                             <h4>Salary:  {{$posts->salary}}</h4>
                                             <h4>Needed:  {{$posts->employee_num}}</h4>
                                             <h4>Hired:  {{$posts->hired_num}}</h4>
                                             @if($posts->employee_num == $posts->hired_num)
                                                Closed
                                                @else
                                                Open
                                             @endif
                                            
                                        </div>
                                </div> 
                                 <div class="card-footer">
                                         <h4>Description</h4>
                                         <h5>{{$posts->description}}</h5>
                                 </div>
                                 </div>
                             </div>
                      

                        @if(count($comments) > 0)
                        @foreach($comments as $com)
                        @if($com->post_id == $posts->id )
                        <div class="card" style=" margin-top:5px;">
                                <div class="card-body">
                                        <div class="card-title">      
                                                <h3>{{$com->name}}</h3>          
                                            </div>
                                          
                                            <div class="card-text">
                                                       
                                                                        <h5>{{$com->message}}</h5>
                                                                      <h5>Contacts</h5>
                                            <h6>Facebook:{{$com->contact_fb}}</h6>
                                            <h6>Viber:{{$com->contact_twitter}}</h6>
                                            <h6>Email:{{$com->contact_email}}</h6>
                                            </div>
                                            <h6 class="card-subtitle mb-2 text-muted">Actions</h6>
                                            <div class="card-footer">
                                                <div class="row">
                                                    
                                                    @if($com->hired_status == '1')
                                                    <div class="col-sm">
                                                            <div class="d-flex justify-content-end">
                                                            <button class="btn btn-secondary" disabled>Waiting for Confirmation</button>
                                                            </div>
                                                    </div>
                                                   @elseif($com->hired_status == '0')
                                                    <div class="col-sm">
                                                            <form action="/post/pdf" method="POST" enctype="multipart/form-data">
                                                                {{ csrf_field() }}
                                                            <input type="text" name="id" value="{{$com->user_id}}" hidden>
                                                            <button class="btn btn-info"><a href="/profile/{{$com->user_id}}" style="color:white">View Profile</a></button>
                                                            <button type="submit" class="btn btn-secondary">Download Resume</button>
                                                           
                                                           
                                                        </form>
                                                           
                                                    </div>
                                                    <div class="col-sm">
                                                            <div class="d-flex justify-content-end">
                                                            <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal{{$com->id}}">Hire</button>
                                                            </div>
                                                    </div>
                                                    @else
                                                    <div class="col-sm">
                                                            <div class="d-flex justify-content-end">
                                                            <button class="btn btn-success" disabled>Hired</button>
                                                            </div>
                                                    </div>
                                                 @endif
                                                        
                                                 
                                                </div>
                                                
                                            </div>
                                </div>
                            </div> 
                        @endif
                        @endforeach
                        @endif
                </div>
                @endif
                @endforeach
                @endif


                
                    @foreach($post as $posts)
                    @if($posts->company_id == auth()->user()->id)
                    @foreach($comments as $com)
                    @if($com->post_id == $posts->id )
            <div class="modal fade" id="exampleModal{{$com->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hire this Guy?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                      <h4>Hire {{$com->name}} for the position of {{$posts->Title}}?</h4>

                                      <form action="/Appointment/hire" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                              <div class="container">
                                                    <div class="form-group row">
                                                            <input type="text" name="comment_id" value="{{$com->id}}"  hidden>
                                                    <input type="text" name="id" value="{{$com->user_id}}"  hidden>
                                                    <input type="text" name="name"  value="{{$posts->company_name}}"  hidden>
                                                    <input type="text" name="post_id"  value="{{$posts->id}}"  >
                                                </div>  
                                               
                                                    <div class="form-group row">
                                                        <label for="tyear">Message</label>
                                                        <textarea type="text" name="message" class="form-control" id="mesid" placeholder=" " rows="3" required></textarea>
                                                    </div> 
                                        </div>
                                       
                                      </div>
                                      <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                       
                                            <button type="submit" class="btn btn-primary">Hire</button>
                                    </form>
                                      </div>
                                    </div>
                                  </div>
                    </div>
                    @endif
                    @endforeach
                    @endif
                    @endforeach


                
              </div>
            </div>
           
            @endif
          </div>




  


@else 
<h1 style="font-family:san-serif;font-weight:300;font-size:3em">TRABAHAKITA.COM</h1>
@endif

@endsection