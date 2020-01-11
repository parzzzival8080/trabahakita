@extends('layouts.app')
@section('content')


<div class="container" style="padding-top:20px;">
    <h2 style="margin-top:10px;margin-bottom:10px;">Search for your ideal job</h2>
    <form action="/post/search" method="POST" role="search">
     {{ csrf_field() }}
    <div class="row">
        <div class="col-md-8">
        <input type="text" name="search" class="form-control" value="{{$query}}" placeholder="Search here ...">
        </div>
             <div class="col">
                   <select class="form-control" name="filter" id="">
                   <option value="{{$filter}}">{{$filter}}</option>
                   <option value="Nearest">Nearest</option>
                       <option value="Field">Field</option>
                       <option value="Salary">Salary</option>
                       <option value="Experience">Experience</option>
                   </select>

                   
    </div>
    
    </div>
    <button class="btn btn-info" type="submit">Search</button>
     <div class="container" style="margin-top:20px;">
        @if(@isset($details))
        <h3>Search Results for "{{$query}}" with the filter "{{$filter}}" </b> are :</h3>
        
        @if(count($details) > 0)
        <div class="row">
        @foreach($details as $posts)
        @if($filter == 'Field')
        <div class="col-md-6 mt-5">
               <div class="card">
                   <!-- Card image -->
                   <div class="view overlay">
                   @php
                       $image = DB::table('profiles')->where(['id' => $posts->company_id])->get();
                       if(count($image) > 0)
                       {
                           foreach($image as $images)
                       {
                           if($images->image == NULL)
                           {
                               echo '<img class="card-img-top" src="http://res.cloudinary.com/dntfm4ivf/image/upload/c_fit,h_554,w_554/whs7ihyxxa91889a6sot.png" alt="Card image cap">';      
                           }
                           else 
                               {
                                   echo '<img class="card-img-top" style="height:200px" src="'.$images->image.'" alt="Card image cap">';
                               }   
                       }
                       } 
                     @endphp
                     <a>
                       <div class="mask rgba-white-slight"></div>
                     </a>
                   </div>
                   <!-- Card content -->
                   <div class="card-body elegant-color white-text rounded-bottom">
                 
                     <!-- Social shares button -->
                    
                     <!-- Title -->
                     <h4 class="card-title">{{$posts->Title}}</h4>
                     <h6 class="card-subtitle mb-2 text-muted"><a href="/company/profile/{{$posts->company_id}}" class="text-muted">{{$posts->company_name}}</a></h6>
                     <hr class="hr-light">
                     <!-- Text -->
                     <h6 class="text-light">Field:{{$posts->job_field}}</h6>
                     <h6 class="text-light">Type:{{$posts->job_type}}</h6>
                     
                     <h6 class="text-light">Needed:{{$posts->employee_num}}</h6>
                     <h6 class="text-light">Date Posted:{{$posts->created_at->toDateString()}}</h6>
                     <!-- Link -->
                     <div class="d-flex justify-content-end">
                       <button class="btn" style="background-color:#e8505b"><a href="/post/show/{{$posts->id}}" style="color:white">View</a></button>
                   </div>
                   </div>  
                 </div>
                 <!-- Card Dark -->
               </div>
               @elseif($filter == 'Salary')
               <div class="col-md-6 mt-5">
                <div class="card">
                    <!-- Card image -->
                    <div class="view overlay">
                    @php
                        $image = DB::table('profiles')->where(['id' => $posts->company_id])->get();
                        if(count($image) > 0)
                        {
                            foreach($image as $images)
                        {
                            if($images->image == NULL)
                            {
                                echo '<img class="card-img-top" src="http://res.cloudinary.com/dntfm4ivf/image/upload/c_fit,h_554,w_554/whs7ihyxxa91889a6sot.png" alt="Card image cap">';      
                            }
                            else 
                                {
                                    echo '<img class="card-img-top" style="height:200px" src="'.$images->image.'" alt="Card image cap">';
                                }   
                        }
                        } 
                      @endphp
                      <a>
                        <div class="mask rgba-white-slight"></div>
                      </a>
                    </div>
                    <!-- Card content -->
                    <div class="card-body elegant-color white-text rounded-bottom">
                  
                      <!-- Social shares button -->
                     
                      <!-- Title -->
                      <h4 class="card-title">{{$posts->Title}}</h4>
                      <h6 class="card-subtitle mb-2 text-muted"><a href="/company/profile/{{$posts->company_id}}" class="text-muted">{{$posts->company_name}}</a></h6>
                      <hr class="hr-light">
                      <!-- Text -->
                      <h6 class="text-light">Expected Salary:{{$posts->salary}}</h6>
                      <h6 class="text-light">Type:{{$posts->job_type}}</h6>
                      
                      <h6 class="text-light">Needed:{{$posts->employee_num}}</h6>
                      <h6 class="text-light">Date Posted:{{$posts->created_at->toDateString()}}</h6>
                      <!-- Link -->
                      <div class="d-flex justify-content-end">
                        <button class="btn" style="background-color:#e8505b"><a href="/post/show/{{$posts->id}}" style="color:white">View</a></button>
                    </div>
                    </div>  
                  </div>
                  <!-- Card Dark -->
                </div>
                @elseif($filter == 'Experience')
                <div class="col-md-6 mt-5">
                 <div class="card">
                     <!-- Card image -->
                     <div class="view overlay">
                     @php
                         $image = DB::table('profiles')->where(['id' => $posts->company_id])->get();
                         if(count($image) > 0)
                         {
                             foreach($image as $images)
                         {
                             if($images->image == NULL)
                             {
                                 echo '<img class="card-img-top" src="http://res.cloudinary.com/dntfm4ivf/image/upload/c_fit,h_554,w_554/whs7ihyxxa91889a6sot.png" alt="Card image cap">';      
                             }
                             else 
                                 {
                                     echo '<img class="card-img-top" style="height:200px" src="'.$images->image.'" alt="Card image cap">';
                                 }   
                         }
                         } 
                       @endphp
                       <a>
                         <div class="mask rgba-white-slight"></div>
                       </a>
                     </div>
                     <!-- Card content -->
                     <div class="card-body elegant-color white-text rounded-bottom">
                   
                       <!-- Social shares button -->
                      
                       <!-- Title -->
                       <h4 class="card-title">{{$posts->Title}}</h4>
                       <h6 class="card-subtitle mb-2 text-muted"><a href="/company/profile/{{$posts->company_id}}" class="text-muted">{{$posts->company_name}}</a></h6>
                       <hr class="hr-light">
                       <!-- Text -->
                       <h6 class="text-light">Experience Needed:{{$posts->experience}}</h6>
                       <h6 class="text-light">Expected Salary:{{$posts->salary}}</h6>
                       <h6 class="text-light">Type:{{$posts->job_type}}</h6>
                       
                       <h6 class="text-light">Needed:{{$posts->employee_num}}</h6>
                       <h6 class="text-light">Date Posted:{{$posts->created_at->toDateString()}}</h6>
                       <!-- Link -->
                       <div class="d-flex justify-content-end">
                         <button class="btn" style="background-color:#e8505b"><a href="/post/show/{{$posts->id}}" style="color:white">View</a></button>
                     </div>
                     </div>  
                   </div>
                   <!-- Card Dark -->
                 </div>
             @endif                           
        @endforeach
</div>
        @else
        <h3 class="mt-3">There are no Jobs the same with the tag.</h3>
        @endif
        
        @else
       
@endisset     

     </div>
</form>
</div>

@if (count($post) > 0)
<div class="container" style="padding:30px">
    <h2 class="mt-5">Other jobs for you.</h2>
        <div class="row">

        
        @foreach ($post as $posts)
        @if($posts->post_status == '0')
                 
                        <div class="col-md-6 mt-3">

                        
                        <div class="card">

                            <!-- Card image -->
                            <div class="view overlay">
                            @php
                                $image = DB::table('profiles')->where(['id' => $posts->company_id])->get();
                                if(count($image) > 0)
                                {
                                    foreach($image as $images)
                                {
                                    if($images->image == NULL)
                                    {
                                        echo '<img class="card-img-top" src="http://res.cloudinary.com/dntfm4ivf/image/upload/c_fit,h_554,w_554/whs7ihyxxa91889a6sot.png" alt="Card image cap">';
                                        
                                    }
                                    else 
                                        {
                                            echo '<img class="card-img-top" style="height:200px" src="'.$images->image.'" alt="Card image cap">';
                                        }
                                    
                                    
                                }
                                }
                               
                               
                             
                              @endphp
                              <a>
                                <div class="mask rgba-white-slight"></div>
                              </a>
                            </div>
                          
                            <!-- Card content -->
                            <div class="card-body elegant-color white-text rounded-bottom">
                          
                              <!-- Social shares button -->
                             
                              <!-- Title -->
                              <h4 class="card-title">{{$posts->Title}}</h4>
                              <h6 class="card-subtitle mb-2 text-muted"><a href="/company/profile/{{$posts->company_id}}" class="text-muted">{{$posts->company_name}}</a></h6>
                              <hr class="hr-light">
                              <!-- Text -->
                              <h6 class="text-light">Type:{{$posts->job_type}}</h6>
                              <h6 class="text-light">Experience Needed:{{$posts->experience}}</h6>
                              <h6 class="text-light">Expected Salary:{{$posts->salary}}</h6>
                              <h6 class="text-light">Field:{{$posts->job_field}}</h6>
                              <h6 class="text-light">Needed:{{$posts->employee_num}}</h6>
                              <h6 class="text-light">Date Posted:{{$posts->created_at->toDateString()}}</h6>
                              <!-- Link -->
                              <div class="d-flex justify-content-end">
                                <button class="btn" style="background-color:#e8505b"><a href="/post/show/{{$posts->id}}" style="color:white">View</a></button>
                            </div>
                          
                            </div>
                          
                          </div>
                          <!-- Card Dark -->
                        </div>
        @else
        @endif
                        @endforeach


 </div>   
</div>
@else
<h1>there are no posts</h1>
@endif

    
@endsection