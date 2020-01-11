@extends('layouts.app')
@section('content')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwG2FvuLOl_rGjp4LHR6XSeLIG_ZjjJ0M&libraries=places" type="text/javascript"></script>
    <div class="container my-3">
        <h4><strong>Find your Ideal Job</strong></h4>
    </div>
    <div class="container" style="padding-top:20px;">
        <h2 style="margin-top:10px;margin-bottom:10px;">Search for your ideal job</h2>
        <form action="/post/search" method="POST" role="search">
         {{ csrf_field() }}
        <div class="row">
            <div class="col-md-8">
                <input type="text" name="search" class="form-control" placeholder="Search here ...">
            </div>
                 <div class="col">

                       <select class="form-control" name="filter" id="">
                        <option value="Nearest">Nearest</option>
                           <option value="Field">Field</option>
                           <option value="Salary">Salary</option>
                           <option value="Experience">Experience</option>
                       </select>

                       
        </div>
        </div>
        <button class="btn btn-info" type="submit">Search</button>
         <div class="container" style="margin-top:20px;">
           
         </div>
    </form>
    </div>
    <div id="map" style="width:100%;height:400px" ></div>
    {{-- @foreach($locations as $loc)
<button class="btn btn-info" id="{{$loc['id']}}">Show Direction</button>
{{$loc['id']}}
    @endforeach --}}

    
    @if(auth()->user()->type == 'employee')
    @if(count($locations) > 0 )
    @php

        // $result = DB::table('profile')->where(['id' => auth()->user->id])->select('area')->get();

        // if($result->area == )
        // {
        //     echo '<h3>These are the nearest job posts we got for you</h3>';
        // }
        // else {
        //     echo '<h3>There are no matching jobs for your field this time...</h3>';
        // }
    @endphp
    <h3 class="text-muted mt-5">This are the nearest Job Posts on your Area</h3>
    <div class="row">
   
    @foreach($locations as $locate)
    @if(round($locate['distance']/1000, 1) < 5 )
    @if(count($post) > 0)
    @foreach($post as $posts)
    @if($posts->job_field == $user->area)
    @if($posts->company_id == $locate['id'])
    <div class="col-md-5 mt-5 mx-auto">
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
              <h6 class="text-light">Field:{{$posts->job_field}}</h6>
              <h6 class="text-light">Needed:{{$posts->employee_num}}</h6>
              <h6 class="text-light">Date Posted:{{$posts->created_at->toDateString()}}</h6>
              <h6 class="text-light">Distance from you:{{ round($locate['distance']/1000, 1) }}Km </h6>
              <!-- Link -->
              <div class="d-flex justify-content-end">
                <button class="btn" type="button"><a href="/company/profile/{{$posts->company_id}}" style="color:white"> Get Direction</a></button>
                  <button class="btn" style="background-color:#e8505b"><a href="/post/show/{{$posts->id}}" style="color:white">View</a></button>
              </div>
          
            </div>
          
          </div>
       
   
          <!-- Card Dark -->
        </div>
        @endif
        @else
      

        
        @if($posts->company_id == $locate['id'])
    <div class="col-md-5 mt-5 mx-auto">
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
              <h6 class="text-light">Field:{{$posts->job_field}}</h6>
              <h6 class="text-light">Needed:{{$posts->employee_num}}</h6>
              <h6 class="text-light">Date Posted:{{$posts->created_at->toDateString()}}</h6>
              <h6 class="text-light">Distance from you:({{ round($locate['distance']/1000, 1) }}Km)  
                                                    {{$locate['distance']}}</h6>
              <!-- Link -->
              <div class="d-flex justify-content-end">
                <button class="btn" type="button"><a href="/company/profile/{{$posts->company_id}}" style="color:white"> Get Direction</a></button>
                <button class="btn" style="background-color:#e8505b"><a href="/post/show/{{$posts->id}}" style="color:white">View</a></button>
            </div>
          
            </div>
          
          </div>
          <!-- Card Dark -->
        </div>
 
       
      
        @endif
    
       

    @endif
    @endforeach
    @endif

    @endif
    @endforeach
    </div>
    @endif
    @elseif(auth()->user()->type == 'company')
    @if(count($locations) > 0 )
    @foreach($locations as $locate)
    @if(round($locate['distance']/1000, 1) < 5 )
    
    @if($locate['type'] == 'employee')
    <div class="card my-3" style="margin-top:10px">
            <div class="card-body">
              <div class="card-header">
              <h3>{{$locate['name']}}</h3>
              <h6 class="card-subtitle mb-2 text-muted">{{Title}}</h6>
              <div class="card-text">
              <h6 class="text-muted">Address: {{$locate['adress']}}</h6>
              <h5 class="text-muted">Skills</h5>
              @if(count($skills) > 0)
              @foreach($skills as $skill)
              @if($skill->user_id == $locate['id'])
                <h6 class="text-muted"> {{$skill->desc}}</h6>
              @endif
              @endforeach
              @endif
              </div>
              </div>
            </div>
        </div>
    @endif
    @endif
    @endforeach
    @endif
    @endif


   
    

<script>
   
    var directionsDisplay = new google.maps.DirectionsRenderer();
    var directionsService = new google.maps.DirectionsService();
   
   
    var map = new google.maps.Map(document.getElementById('map'),
    {
        zoom: 16,
            scrollwheel: false,
            center:
             {
            lat: {{$user->lat}}, 
            lng: {{$user->lng}}
             }
    });
    

    var marker = new google.maps.Marker(
        {
            position: {
                lat: {{ $user->lat }}, 
                lng: {{ $user->lng }}
                    },

            map: map,
            icon: {
                url: "https://maps.google.com/mapfiles/ms/icons/blue-dot.png",
            },
            draggable: false
        }
    );

  

    directionsDisplay.setMap(map);
    directionsDisplay.setOptions({
        polylineOptions:{
            strokeColor: 'green',
            strokeWeight: '8'
        }
    });

    var clat = {{$user->lat}};
    var clng = {{$user->lng}};

         



    
        
       
           
        

    
     




        @foreach($locations as $a)
        {
            @if($a['lat'] == '' || $a['lng'] == '')
        {

        }
        @else

      
                            {
                               
                                    marker = new google.maps.Marker({
                                        position: {
                                            lat: {{$a['lat']}},
                                            lng: {{$a['lng']}},
                                        },
                                        map: map,
                                       
                                        label: '{{$a['name']}}',
                                        title: '{{$a['name']}}',
                                        draggable: false // GOOGLE MAP WHERE THE MARKER IS TO BE ADDED
                                       
                                        
                                    });
                                   
                                    
                                    // google.maps.event.addListener(marker, 'click', function() {window.location.href = 'http://www.facebook.com';});
                                    google.maps.event.addListener(marker, 'click', function() {
                                       
                                        window.open('/company/profile/{{$a['id']}}');
                                       
                              
                                                                });
                                                                
                                                            
       
     
        function calculateRoute()
        {
            var request = 
            {
                origin:
                {
                    lat: clat, 
                    lng: clng,
                },
                
                destination:
                {
                    lat:{{$a['lat']}}, 
                    lng:{{$a['lng']}}
                },

              
              
                travelMode:'WALKING',
            };



            var request2 = 
            {
                origin:
                {
                    lat: {{$user->lat}}, 
                    lng: {{$user->lng}}
                },
                destination:
                {
                    lat:{{$a['lat']}}, 
                    lng:{{$a['lng']}}
                },
                travelMode:'DRIVING',
            };

            directionsService.route(request, function(result, status)
            {
                
                {
                    if(status == 'OK')
                {
                   directionsDisplay.setDirections(result);
                   var totalDist = 0;
                    var totalTime = 0;
                    var myroute = result.routes[0];
                    for (i = 0; i < myroute.legs.length; i++) {
                    totalDist += myroute.legs[i].distance.value;
                    totalTime += myroute.legs[i].duration.value;
                    totalDist = totalDist / 1000;
                    }
                    document.getElementById('{{$a['id']}}1').innerHTML = "Travel Mode:Walking<br>Distance: " + totalDist + " km<br>Travel Time: " + (totalTime / 60).toFixed(2) + " minutes</p>";
                    
                }
                }
                
            });

            directionsService.route(request2, function(result, status)
            {
                
                {
                    if(status == 'OK')
                {
                  
                   var totalDist = 0;
                    var totalTime = 0;
                    var myroute = result.routes[0];
                    for (i = 0; i < myroute.legs.length; i++) {
                    totalDist += myroute.legs[i].distance.value;
                    totalTime += myroute.legs[i].duration.value;
                    totalDist = totalDist / 1000;
                    }
                    document.getElementById('{{$a['id']}}2').innerHTML = "Travel Mode:Driving<br>Distance: " + totalDist + " <br>Travel Time: " + (totalTime / 60).toFixed(2) + " minutes";
                }
                }
               
            });
           


        }

       
        
      
}

@endif
        }
        document.getElementById("{{$a['id']}}").onclick = function()
        {
            calculateRoute();     
        }  
        @endforeach




</script>
@endsection