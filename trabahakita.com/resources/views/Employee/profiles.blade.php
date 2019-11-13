@extends('layouts.app')
@section('content')
    
<div class="container" style="padding-top:20px;">
       <h2 style="margin-top:10px;margin-bottom:10px;">Seeker Profiles</h2>
       <button class="btn btn-info"><a href="/company/maps">Find Worker near me!</a></button>
                            @if(count($profile) > 0)
                            @foreach($profile as $profiles)
                                @if($profiles->status_update == '1')
                                <div class="card" style="margin-top:10px">
                                <div class="card-header">
                                    <div class="card-title">
                                    <h1>{{$profiles->first_name}} {{$profiles->last_name}}</h1>
                                        </div></div>
                                    <div class="card-body">
                                        <div class="card-text">
                                            <h4>
                                                    ADDRESS:{{$profiles->adress}}    
                                            </h4>
                                            <h4>
                                                    Email:{{$profiles->email}}
                                            </h4> 
                                            <h4>
                                                    Status:
                                                   @if($profiles->hire_status == '1')
                                                   
                                                   <span class="badge badge-pill badge-success">Hired</span>
                                                   @else
                                                   <span class="badge badge-pill badge-secondary">Unemployed</span>
                                                   @endif
                                            </h4>
                                               
                                             
                                        
                                           
                                           
                                           
                                        </div>
                                        <div class="card-footer">
                                        <button class="btn btn-info"><a href="/profile/{{$profiles->id}}" style="color:white">Visit</a></button>
                                        </div>
                                        
            
                                    </div>
                                    
                                </div>
                                @endif
                            @endforeach
                            @endif
                  
</div>



@endsection