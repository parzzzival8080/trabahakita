@extends('layouts.app')
@section('content')
    <div class="container my-5" style="margin-top:10px">
        <h2>
                Posts related to "Accounting & Consulting"  
        </h2>
        
        @if(count($post) > 0)
        <button class="btn btn-danger"><a href="/home" style="color:white">Back</a></button>
        <div class="row">
            @foreach ($post as $posts)
        
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
           
            @endforeach
        </div>
        
            @else
                <h2>Sorry, There are no related posts for Computer and Technology. <a href="/home">Go Back.</a></h2>
            @endif

    </div>
@endsection