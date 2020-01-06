@extends('layouts.app')
@section('content')

<div class="container my-5">
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-end">
                <img style="height:300px;width:300px" src="{{$profile->image}}" alt="">
            </div>
        </div>
        <div class="col">
                <h3 class="text-muted mt-2">{{$profile->first_name}} {{$profile->last_name}}</h3>
                <h3 class="text-muted mt-2">{{$profile->area}}</h3>
               
        </div>
    </div>
   
</div>
<div class="container my-3">
   <div class="row">
       <div class="col">
           <div class="card" style="height:300px">
               <div class="card-header">
                   <div class="row">
                       <div class="col">
                        <i style="font-size:3em" class="fas fa-user-circle"></i>
                       </div>
                       <div class="col">
                        <h4>Personal Information</h4>
                       </div>
                       <div class="col"></div>
                   </div>
               </div>
               <div class="card-body">
                <h5 style="font-weight:300" class="text-muted mt-2">Phone Number:{{$profile->number}}</h5>
                <h5 style="font-weight:300" class="text-muted mt-2">Email:{{$profile->email}}</h5>
                <h5 style="font-weight:300" class="text-muted mt-2">Address:{{$profile->adress}}</h5>
                <div class="d-flex justify-content-end">
                    <a href="/employee/profile" class="text-muted" style="text-decoration:underline">Edit</a>
                </div>
               </div>
               
               
               
           </div>
       </div>
       <div class="col">
        <div class="card" style="height:300px">
            <div class="card-header">
             <div class="row">
                 <div class="col">
                    <i style="font-size:3em" class="fas fa-scroll"></i>
                 </div>
                 <div class="col">
                    <h4>Skill Summary</h4>
                 </div>
                 <div class="col"></div>
             </div>
            </div>
            <div class="card-body">
                @if(count($skills) > 0)
                    @foreach($skills as $skill)
                        @if($skill->user_id ==  $profile->id)
                            {{$skill->desc}}
                            @endif
                    @endforeach
                @endif
                <div class="d-flex justify-content-end">
                    <a href="/employee/education" class="text-muted">Edit</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card" style="height:300px">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                       <i style="font-size:3em" class="fas fa-book"></i>
                    </div>
                    <div class="col">
                       <h4>Educational Background</h4>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
            <div class="card-body">
                @if(count($education) > 0)
                @foreach($education as $edu)
                    @if($edu->user_id ==  $profile->id)
                        @if($edu->level == 'tertiary')
                            <h5 style="font-weight:300" class="text-muted">School: {{$edu->school}}</h5>
                            <h5 style="font-weight:300" class="text-muted">Course: {{$edu->attainment}}</h5>
                            <h5 style="font-weight:300" class="text-muted">Year: {{$edu->from}}-{{$edu->to}}</h5>
                            @endif
                        @endif
                @endforeach
            @endif
            <div class="d-flex justify-content-end">
                <a href="/employee/education" style="text-decoration:underline" class="text-muted">Edit</a>
            </div>
            </div>
        </div>
    </div>
   </div>
   
</div>

{{-- <div class="card my-5">
        <div class="card-body">

                <div class="d-flex justify-content-start"> 
                <div class="row">
                    <div class="col">
                        <img class="card-img-top" style="height:300px;width:300px" src="{{$profile->image}}" alt="Card image cap">
                    </div>

                </div>
                <div class="row">

                </div>
                
                
                </div>
           
                <h5 class="card-subtitle mb-2 text-muted">{{$profile->title}}</h5>
                </center>
                <div class="container" style="margin-top:10px">
                        <div class="card">
                                <div class="card-header">
                                        <h3>Education</h3>
                                </div>
                                <div class="card-text">
                                    @if(count($education) > 0)
                                    @foreach($education as $edu)
                                    <div class="row">
                                        <div class="col">
                                            {{$edu->school}}
                                        </div>
                                        <div class="col">
                                            {{$edu->course}}
                                        </div>
                                        <div class="col">
                                            {{$edu->from}}-{{$edu->to}}
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>

                            </div>
                </div>

                <div class="container" style="margin-top:10px">
                        <div class="card">
                                <div class="card-header">
                                        <h3>Experience</h3>
                                </div>
                                <div class="card-text">
                                        @if(count($experience) > 0)
                                        @foreach($experience as $edu)
                                        <div class="row">
                                            <div class="col">
                                                {{$edu->school}}
                                            </div>
                                            <div class="col">
                                                {{$edu->course}}
                                            </div>
                                            <div class="col">
                                                {{$edu->from}}-{{$edu->to}}
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                </div>
                            </div>
                </div>
                <div class="container" style="margin-top:10px">
                        <div class="card">
                                <div class="card-header">
                                        <h3>Skills</h3>
                                </div>
                                <div class="card-text">
                                        @if(count($skills) > 0)
                                        @foreach($skills as $edu)
                                        <div class="row">
                                            <div class="col">
                                                {{$edu->school}}
                                            </div>
                                            <div class="col">
                                                {{$edu->course}}
                                            </div>
                                            <div class="col">
                                                {{$edu->from}}-{{$edu->to}}
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                </div>
                            </div>
                </div>
              
                
            
           
            
            
            </div>
        </div>
    </div>
   
            <div class="card" style="margin-top:10px">
                <div class="card-header">
                    <h3>Summary</h3>
                    {{$profile->description}}
                </div>
            </div>
            



   
    @if(count($notification) > 0)
    @foreach($notification as $notif)
    @if($notif->type == 'employee')
    @if($notif->user_id == auth()->user()->id)
   
    @endif
    @endif
    @endforeach
    @endif
    
<div class="row" style="margin-top:20px;">
    <div class="col">
            <div class="card">
                    <div  class="card-header" style="background:#88AAFF; color:white">
                            <h1>Messages</h1>
                        </div>
                    <div class="card-body">
                        
                                <div class="card-text">
                                    <div class="row">
                                        <div class="col">
                                            Employer
                                        </div>  
                                        <div class="col">
                                            Message
                                        </div> 
                                        <div class="col">
                                            Date and Time
                                        </div>    
                                    </div> 
                                    
                                    @if(count($notification) > 0)
                                    @foreach($notification as $notif)
                                    <div class="row">       
                                            @if($notif->type == 'employee')
                                            @if($notif->user_id == auth()->user()->id)
                                        <div class="col" style="margin-top:5px">
                                        <h5>{{$notif->name}}</h5>
                                        </div>
                                        <div class="col" style="margin-top:5px">
                                        <h5><a href="/notification/show/{{$notif->id}}">{{$notif->subject}}</a></h5>
                                        </div>
                                        <div class="col" style="margin-top:5px">
                                                <p>{{$notif->created_at}}</p>
                                        </div>
                                        @endif
                                        @endif
                                      
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                    </div>
            </div>
    </div>
                
            
   
    <div class="col">
        <div class="card">
                <div class="card-header" style="background:#88AAFF; color:white">
                        <h1>Employment History</h1>
                        
                    </div>
            <div class="card-body">
               
                        @if(count($hire) > 0)
                        <div class="row">
                                <div class="col">
                                        Employer
                                    </div>
                                    <div class="col">
                                           Position
                                    </div>
                                    
                        </div>
                        @foreach($hire as $hires)
                        <div class="row" style="margin-top:5px">
                                <div class="col">
                                        {{$hires->company_name}}
                                    </div>
                                    <div class="col">
                                            {{$hires->position}}
                                    </div>
                                    
                        </div>
                      
                           
                        @endforeach
                        @endif
                </div>
               
            
        </div>
       
    </div>
    
</div> --}}

@endsection