@extends('layouts.app')
@section('content')

<div class="container" style="padding-top:20px;">
    <h2 style="margin-top:10px;margin-bottom:10px;">Seeker Profiles</h2>
    <form action="/employee/search" method="POST" role="search">
     {{ csrf_field() }}
    <div class="row">
             <div class="col">
                    <input type="text" name="search" class="form-control">
                               <button type="submit" class="btn btn-info" style="margin-top">SEARCH</button>
                   </div>
    </div>
  
           
           
    

     <div class="container" style="margin-top:20px;">
             @if(@isset($details))
                     <h3>Search Results for "{{$query}}" </b> are :</h3>
                     @if(count($details) > 0)
                     <div class="row">
                     @foreach($details as $profiles)
                     <div class="col-md-6 mt-5">
                             <div class="card">

                                     <!-- Card image -->
                                     <div class="view overlay">
                                     <div class="d-flex justify-content-center my-auto py-2 px-2">
                                             <img class="card-img-top" style="height:300px" src="{{$profiles->image}}" alt="Card image cap">
                                     </div>
                                   
                                       <a>
                                         <div class="mask rgba-white-slight"></div>
                                       </a>
                                     </div>
                                   
                                     <!-- Card content -->
                                     <div class="card-body elegant-color white-text rounded-bottom" style="height:350px">
                                   
                                       <!-- Social shares button -->
                                      
                                       <!-- Title -->
                                     <h4 class="card-title">{{$profiles->company_name}}</h4>
                                       <hr class="hr-light">
                                       <!-- Text -->
                                       <p class="card-text white-text mb-4">
                                      
                                            <h5 >
                                                    Address:{{$profiles->adress}}    
                                            </h5 >
                                            <h5 >
                                                    Email:{{$profiles->email}}
                                            </h5 >
                                           
                                           <h5 >
                                                Representative:{{$profiles->company_rep}}
                                           </h5>
                                           <h5 >
                                                Posts:
                                                @if(count($post) > 0 )
                                                   @php
                                                        $count = DB::table('posts')->where(['company_id' => $profiles->id, 'post_status' => '0'])->get();
                                                        echo $count->count();
                                                   @endphp
                                                    @endif
                                           </h5>
                                            
                                       </p>
                                       <!-- Link -->
                                       <div class="d-flex justify-content-end">
                                        <button class="btn" style="border:none; background-color:#e8505b"><a href="/company/profile/{{$profiles->id}}" style="color:white">Visit</a></button>
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
</div>
    
<div class="container" style="padding-top:20px">
        <h2>COMPANY PROFILES</h2>
        @if(count($profile) > 0)
        <div class="row">
        @foreach($profile as $profiles)
        @if($profiles->status_update == '1')
        <div class="col-md-6 mt-5">
            <div class="card">

                    <!-- Card image -->
                    <div class="view overlay">
                    <div class="d-flex justify-content-center my-auto py-2 px-2">
                            <img class="card-img-top" style="height:300px" src="{{$profiles->image}}" alt="Card image cap">
                    </div>
                  
                      <a>
                        <div class="mask rgba-white-slight"></div>
                      </a>
                    </div>
                  
                    <!-- Card content -->
                    <div class="card-body elegant-color white-text rounded-bottom" style="height:350px">
                  
                      <!-- Social shares button -->
                     
                      <!-- Title -->
                    <h4 class="card-title">{{$profiles->company_name}}</h4>
                      <hr class="hr-light">
                      <!-- Text -->
                      <p class="card-text white-text mb-4">
                     
                           <h5 >
                                   Address:{{$profiles->adress}}    
                           </h5 >
                           <h5 >
                                   Email:{{$profiles->email}}
                           </h5 >
                          
                          <h5 >
                               Representative:{{$profiles->company_rep}}
                          </h5>
                          <h5 >
                               Posts:
                               @if(count($post) > 0 )
                                  @php
                                       $count = DB::table('posts')->where(['company_id' => $profiles->id, 'post_status' => '0'])->get();
                                       echo $count->count();
                                  @endphp
                                   @endif
                          </h5>
                           
                      </p>
                      <!-- Link -->
                      <div class="d-flex justify-content-end">
                        <button class="btn" style="border:none; background-color:#e8505b"><a href="/company/profile/{{$profiles->id}}" style="color:white">Visit</a></button>
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