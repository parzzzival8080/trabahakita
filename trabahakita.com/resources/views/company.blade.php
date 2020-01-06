@extends('layouts.app')
@section('content')
<div class="container" style="margin-top:20px">
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwG2FvuLOl_rGjp4LHR6XSeLIG_ZjjJ0M&libraries=places" type="text/javascript"></script>

</div>

<img class="card-img-top" src="{{ Storage::url($profile->image)  }}" alt="Card image cap" >
<div class="container my-3">
      
                <H6 class="text-muted"> Address:{{$profile->adress}}</H6>
                <H6 class="text-muted"> Email:{{$profile->email}}</H6>
                <H6 class="text-muted"> Representative:{{$profile->company_rep}}</H6>
       
</div>



<div class="container">
        <div class="d-flex justify-content-end">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Location</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Posts</a>
                        </li>
                      
                      </ul>
                </div>
                      <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="container my-3" >
                                        <div id="map" style="width:100%;height:300px"></div> 
                                       <button class="btn btn-info my-3" id="get">Get Direction</button>
                                       <div class="row">
                                           <div class="col">
                                              
                                            <div id="walk"></div>
                                           </div>
                                           <div class="col">
                                            <div id="drive"></div>
                                           </div>
                                       </div>
                                      
                                      
                                </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="container" style="margin-top:10px;">
                                       
                                        @if (count($post) > 0)
                                        @foreach ($post as $posts)
                                      @if($posts->company_id == $profile->id)
                                      @if($posts->post_status == '0')
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
                                                        <button class="btn btn-primary"><a href="/post/show/{{$posts->id}}" style="color:white">Check it Out</a></button>
                                                </div>
                                            </div>  
                                        </div>
                                        @endif
                                  @endif
                                    @endforeach
                                    @endif
                                </div>
                        </div>
                      
                      </div>
</div>



   
  

    <script>
     var directionsDisplay = new google.maps.DirectionsRenderer();
    var directionsService = new google.maps.DirectionsService();
   
   
    var map = new google.maps.Map(document.getElementById('map'),
    {
        zoom: 18,
            scrollwheel: false,
            center:
             {
            lat: {{ $profile->lat }}, 
            lng: {{ $profile->lng }}
             }
    });
    

    var marker = new google.maps.Marker(
        {
            position: {
                lat: {{ $profile->lat }}, 
                lng: {{ $profile->lng }}
                    },

            map: map,
            title: 'This is the Company',
            icon: {
                url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png",
               
            },
            
            draggable: false
        }
    );

    var marker2 = new google.maps.Marker(
        {
            position: {
                lat: {{ $profiles->lat }}, 
                lng: {{ $profiles->lng }}
                    },

            map: map,
            title: 'You are here!',
         
            
            draggable: false
        }
    );

    google.maps.event.addListener(marker, 'click', function() {                                      
               alert('This is {{$profile->company_name}}');
                         });

                         google.maps.event.addListener(marker2, 'click', function() {                                      
               alert('This is You');
                         });

  

    directionsDisplay.setMap(map);
    directionsDisplay.setOptions({
        polylineOptions:{
            strokeColor: '#9dc1fc',
            strokeWeight: '8'
        }
    });

    function calculateRoute()
    {
            var request =
            {
                origin:
                {
                    lat: {{$profiles->lat}}, 
                    lng: {{$profiles->lng}},
                },
                
                destination:
                {
                    lat:{{$profile['lat']}}, 
                    lng:{{$profile['lng']}}
                },

              
                travelMode:'WALKING',
            }

            var request2 =
            {
                origin:
                {
                    lat: {{$profiles->lat}}, 
                    lng: {{$profiles->lng}},
                },
                
                destination:
                {
                    lat:{{$profile['lat']}}, 
                    lng:{{$profile['lng']}}
                },

              
                travelMode:'DRIVING',
            }
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
                    document.getElementById("walk").innerHTML = "<div class='card'><div class='card-header'>Travel Mode: Walking <i class='fas fa-walking'></i></div><div class='card-body'><div card='card-text'>Distance: " + totalDist + " km<br>Travel Time: " + (totalTime / 60).toFixed(2) + " minutes</p></div></div></div>";
                    return console.log()
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
                    document.getElementById("drive").innerHTML = "<div class='card'><div class='card-header'>Travel Mode: Driving <i class='fas fa-car'></i></div><div class='card-body'><div card='card-text'>Distance: " + totalDist + " km<br>Travel Time: " + (totalTime / 60).toFixed(2) + " minutes</p></div></div></div>";
                }
                }
               
            });

           
            
    }
    document.getElementById("get").onclick = function()
                {
                calculateRoute();       
                }
    
    </script>
@endsection