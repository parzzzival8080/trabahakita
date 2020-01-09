@extends('layouts.app')
@section('content')
    
<div class="container" style="padding-top:20px;">
       <h2 style="margin-top:10px;margin-bottom:10px;">Seeker Profiles</h2>
       <form action="/company/search" method="POST" role="search">
        {{ csrf_field() }}
       <div class="row">
                <div class="col">
                        <select class="custom-select mr-sm-2" id="field" name="search" placeholder="Choose" required>
                                <option   disabled >Choose</option>
                                    <option value="Accounting & Consulting">Accounting & Consulting</option>
                                    <option value="Admin Support">Admin Support</option>
                                    <option value="Customer Service">Customer Service</option>
                                    <option value="Data Science & Analytics">Data Science & Analytics</option>
                                    <option value="Design & Creative">Design & Creative</option>
                                    <option value="Engineering & Architecture">Engineering & Architecture</option>
                                    <option value="IT & Engineering">IT & Engineering</option>
                                    <option value="Legal">Legal</option>
                                    <option value="Translation">Translation</option>
                                    <option value="Web, Mobile & Software Development">Web, Mobile & Software Development</option>
                                    
                                  </select>
                                  <button type="submit" class="btn btn-info" style="margin-top">SEARCH</button>
                      </div>
                      <div class="d-flex justify-content-end">
                        <div class="col">
                                <button class="btn btn-info"><a href="/company/maps" style="color:white">Find Worker near me!</a></button>
                          </div>
                      </div>
                    
       </div>
     
              
              
       

        <div class="container" style="margin-top:20px;">
                @if(@isset($details))
                        <h3>Search Results for "{{$query}}" </b> are :</h3>
                        @if(count($details) > 0)
                        <div class="row">
                        @foreach($details as $profiles)

                        <div class="col-md-4 mt-5">
                                <div class="card">

                                        <!-- Card image -->
                                        <div class="view overlay">
                                        <div class="d-flex justify-content-center my-auto py-2 px-2">
                                                <img class="card-img-top" style="height:200px; width:200px; border-radius:50%" src="{{$profiles->image}}" alt="Card image cap">
                                        </div>
                                      
                                          <a>
                                            <div class="mask rgba-white-slight"></div>
                                          </a>
                                        </div>
                                      
                                        <!-- Card content -->
                                        <div class="card-body elegant-color white-text rounded-bottom" style="height:320px">
                                      
                                          <!-- Social shares button -->
                                         
                                          <!-- Title -->
                                        <h4 class="card-title">{{$profiles->first_name}} {{$profiles->last_name}}</h4>
                                          <hr class="hr-light">
                                          <!-- Text -->
                                          <p class="card-text white-text mb-4">
                                                <h5 style="font-weight:300">
                                                        Field:{{$profiles->area}}
                                                </h5> 
                                                <h5 style="font-weight:300">
                                                        Number:{{$profiles->number}}
                                                </h5> 
                                                <h5 style="font-weight:300">
                                                        Email:{{$profiles->email}}
                                                </h5> 
                                                <h5 style="font-weight:300">
                                                        Status:
                                                       @if($profiles->hire_status == '1')
                                                       
                                                       <span class="badge badge-pill badge-success">Hired</span>
                                                       @else
                                                       <span class="badge badge-pill badge-secondary">Unemployed</span>
                                                       @endif
                                                </h5>
                                          </p>
                                          <!-- Link -->
                                          <div class="d-flex justify-content-end">
                                                <button class="btn" style="border:none; background-color:#e8505b"><a href="/profile/{{$profiles->id}}" style="color:white">Visit</a></button>
                                          </div>
                                        </div>
                                      
                                      </div>
                              </div>
                                
                           
                                                        
                        @endforeach
                </div>
                        @else
                        <h3 class="mt-3">There are no Individuals the same with the tag.</h3>
                        @endif
                        <h3 class="mt-3"> <strong>Other Seekers Searching for Jobs</strong> </h3>
                        @else
                       
                @endisset
                
        </div>
</form>
                        

                       
                            @if(count($profile) > 0)
                            <div class="row ">
                            @foreach($profile as $profiles)
                                @if($profiles->status_update == '1')
                               
                              <div class="col-md-4 mt-5">
                                <div class="card">

                                        <!-- Card image -->
                                        <div class="view overlay">
                                        <div class="d-flex justify-content-center my-auto py-2 px-2">
                                                <img class="card-img-top" style="height:200px; width:200px; border-radius:50%" src="{{$profiles->image}}" alt="Card image cap">
                                        </div>
                                      
                                          <a>
                                            <div class="mask rgba-white-slight"></div>
                                          </a>
                                        </div>
                                      
                                        <!-- Card content -->
                                        <div class="card-body elegant-color white-text rounded-bottom" style="height:320px">
                                      
                                          <!-- Social shares button -->
                                         
                                          <!-- Title -->
                                        <h4 class="card-title">{{$profiles->first_name}} {{$profiles->last_name}}</h4>
                                          <hr class="hr-light">
                                          <!-- Text -->
                                          <p class="card-text white-text mb-4">
                                                <h5 style="font-weight:300">
                                                        Field:{{$profiles->area}}
                                                </h5> 
                                                <h5 style="font-weight:300">
                                                        Number:{{$profiles->number}}
                                                </h5> 
                                                <h5 style="font-weight:300">
                                                        Email:{{$profiles->email}}
                                                </h5> 
                                                <h5 style="font-weight:300">
                                                        Status:
                                                       @if($profiles->hire_status == '1')
                                                       
                                                       <span class="badge badge-pill badge-success">Hired</span>
                                                       @else
                                                       <span class="badge badge-pill badge-secondary">Unemployed</span>
                                                       @endif
                                                </h5>
                                          </p>
                                          <!-- Link -->
                                          <div class="d-flex justify-content-end">
                                                <button class="btn" style="border:none; background-color:#e8505b"><a href="/profile/{{$profiles->id}}" style="color:white">Visit</a></button>
                                          </div>
                                   
                                        </div>
                                      
                                      </div>
                              </div>
                               
                            
                                      
                                @endif
                            @endforeach
                        </div>
                            @endif
                        
                  
</div>



@endsection