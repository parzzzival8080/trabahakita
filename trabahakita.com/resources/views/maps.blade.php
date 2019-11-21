@extends('layouts.app')
@section('content')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwG2FvuLOl_rGjp4LHR6XSeLIG_ZjjJ0M&libraries=places" type="text/javascript"></script>
    <div id="map" style="width:100%;height:700px"></div>
    {{-- @foreach($locations as $loc)
<button class="btn btn-info" id="{{$loc['id']}}">Show Direction</button>
{{$loc['id']}}
    @endforeach --}}


    

    @if(count($locations) > 0 )
    @foreach($locations as $locate)
    @if(round($locate['distance']/1000, 1) < 5 )    

    @if(count($post) > 0)
    @foreach($post as $posts)
    @if($posts->company_id == $locate['id'])
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
               <h6 class="text-muted">Location:{{$locate['adress']}}</h6>

               <h6 class="text-muted" id="{{$locate['id']}}1"></h6>
               <h6 class="text-muted" id="{{$locate['id']}}2"></h6>
                </div>
                <div class="card-footer">
                        <h3>Description:</h3>
                        <h6>
                            {{$posts->description}}
                        </h6>
                        <button class="btn btn-primary"><a href="/post/show/{{$posts->id}}" style="color:white">Check it Out</a></button>
                        <button class="btn btn-info" id="{{$locate['id']}}">Get Direction</button>
                </div>
            </div>  
        </div>
    @endif
    @endforeach
    @endif

    @endif
    @endforeach
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
            lat: {{ $user->lat }}, 
            lng: {{ $user->lng }}
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
                url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png",
            },
            draggable: false
        }
    );

  

    directionsDisplay.setMap(map);

    

        // function calculateRoute()
        // {
        //     var request = 
        //     {
        //         origin:
        //         {
        //             lat: {{$user->lat}}, 
        //             lng: {{$user->lng}}
        //         },
        //         destination:
        //         {
        //             lat:6.925378200000001, 
        //             lng:122.04822280000008
        //         },
        //         travelMode:'DRIVING',
        //     };

        //     directionsService.route(request, function(result, status)
        //     {
        //         if(status == 'OK')
        //         {
        //            directionsDisplay.setDirections(result);
        //         }
        //     });


        // }

        // document.getElementById('get').onclick = function()
        // {
        //     calculateRoute();
        // }

        @foreach($locations as $a)
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
                    lat: {{$user->lat}}, 
                    lng: {{$user->lng}}
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
                    document.getElementById('{{$a['id']}}' + '1').innerHTML = "Travel Mode:Walking<br>Distance: " + totalDist + " km<br>Travel Time: " + (totalTime / 60).toFixed(2) + " minutes</p>";
                    
                }
            });

            directionsService.route(request2, function(result, status)
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
                    document.getElementById('{{$a['id']}}' + '2').innerHTML = "Travel Mode:Driving<br>Distance: " + totalDist + " <br>Travel Time: " + (totalTime / 60).toFixed(2) + " minutes";
                }
            });


        }
        
        document.getElementById('{{$a['id']}}').onclick = function()
        {
            calculateRoute();
        }
                                    
                                    
                            }
                            @endforeach

        




</script>
@endsection