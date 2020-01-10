@extends('layouts.app')
@section('content')

        @if(auth()->user()->type == 'employee')

        <div class="container" style="padding-top:20px;">
            <h2 style="margin-top:10px;margin-bottom:10px;">Seeker Profiles</h2>
            <form action="/post/search" method="POST" role="search">
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
                             @foreach($details as $posts)
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
                                          <hr class="hr-light">
                                          <!-- Text -->
                                          <h6 class="text-light">Type:{{$posts->job_type}}</h6>
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


        @if (count($post) > 0)
        <div class="container" style="padding:30px">
                <h2>POSTS</h2>
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
                                      <hr class="hr-light">
                                      <!-- Text -->
                                      <h6 class="text-light">Type:{{$posts->job_type}}</h6>
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
        @else
        <div class="container" style="padding-top:30px; padding-bottom:10px">
                <h2>Your Company's Post</h2>
        </div>
      
        @if (count($post_company) > 0)
       
        @foreach ($post_company as $posts)
        @if($posts->company_id == auth()->user()->id)
      
        <div class="card" style="margin-top:10px">
                <div class="card-body">
                  <div class="card-header">
                        <h3>{{$posts->Title}}</h3>
                        <h6 class="card-subtitle mb-2 text-muted"><a href="/company/profile/{{$posts->company_id}}" class="text-muted">{{$posts->company_name}}</a></h6>
                  </div>
                   <div class="card-text" style="margin:10px">
                    <h6 class="text-muted">Type:{{$posts->job_type}}</h6>
                    <h6 class="text-muted">Field:{{$posts->job_field}}</h6>
                    <h6 class="text-muted">Needed:{{$posts->employee_num}}</h6>
                    <h6 class="text-muted">Date Posted:{{$posts->created_at->toDateString()}}</h6>
                    </div>
                    <div class="card-footer">
                            <h3>Description:</h3>
                            <h6>
                                {{$posts->description}}
                            </h6>
                            <div class="row">
                                <div class="col">
                                        <button class="btn btn-info"><a href="/post/show/{{$posts->id}}" style="color:white">View</a></button>
                                        <button class="btn btn-warning"><a href="/post/show/{{$posts->id}}/edit" style="color:white">Edit</a></button>
                                </div>
                           
                            
                                <div class="col">
                                        @if($posts->post_status == '0')
                                        <form action="/post/deactivate" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="text" name="id" value="{{$posts->id}}" hidden>
                                        <button class="btn btn-danger">Deactivate</button>
                                        </form>
                                    
                                        @elseif($posts->post_status == '1')
                                        <form action="/post/activate" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="text" name="id" value="{{$posts->id}}" hidden>
                                        <button class="btn btn-success">Activate</button>
                                        </form>
                                        @endif
                                </div>
                            </div>
                          
                    </div>
                </div>  
            </div>
           
        
       
    @endif
    @endforeach
   @else
   <div class="container">
        <h4>You have no posts yet. Want to <a href="/post/create">create</a> one?</h4>
   </div>
  
    
   
    
    @endif
    @endif
    
     
   

@endsection
