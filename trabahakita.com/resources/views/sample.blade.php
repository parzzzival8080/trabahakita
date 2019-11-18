@extends ('layouts.app')

@section ('content')

    <div class="container" style="margin-top:20px">
        <div class="container">
                <H1>Find Jobs Near you</H1>
        </div>
        <div class="container">
<div class="card">
    <div class="card-body">
         
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwG2FvuLOl_rGjp4LHR6XSeLIG_ZjjJ0M&libraries=places" type="text/javascript"></script>
                <div id="map" style="height: 70vh; width: auto">
                        <!-- Google Map Goes Here -->
                    </div>

                   
        </div>

       <p id="dvDistance"></p>

        <button id="get">Get</button>
            
    </div>
</div>
   <div class="container" style="margin-top:10px;">
         <H2>On 5 kilometer Radius</H2>
                @if(count($locations) > 0 )
                @foreach($locations as $locate)
                @if(round($locate['distance']/1000, 1) < 5 )              
             
               
               
                        <div class="card" style="margin-top:20px;">
                                <div class="card-header">
                                        <h3>
                                                {{$locate['name']}}  
                                        </h3>
                                </div>
                                <div class="card-text">
                                    <div class="container">
                                            <h5>
                                                    Distance from you:({{ round($locate['distance']/1000, 1) }}Km)  
                                                    {{$locate['distance']}}
                                            </h5>
                                            <h5>
                                                {{$locate['adress']}}
                                                
                                            </h5>
                                            <h5>
                                                Number of Posts:
                                                @if(count($post) > 0)
                                                @php
                                                    $post = DB::table('posts')->where(['company_id' => $locate['id']])->get();
                                                    echo $post->count();
                                                @endphp
                                                @else
                                                0
                                                @endif
                                            </h5>
                                    </div>                                            
                                </div>
                            </div>
              
            @endif
                @endforeach
                @endif
        </div> 
                       
                    
                  
                         
                   
            </div>
        </div>
         <script>
            function initMap()
            {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        function (result) {
                            // IF GEOLOCATION IS SUCCESSFULL
        
                            // GOOGLE MAP
                            var map = new google.maps.Map(
                                document.getElementById('map'), {
                                    zoom: 16, // GOOGLE MAP ZOOM LEVEL
                                    scrollwheel: false,
                                    center: { // GOOGLE MAP CENTER 
                                        lat: {{ $user->lat }}, // GEOLOCATION RESULT LATITUDE
                                        lng: {{ $user->lng }}, // GEOLOCATION RESULT LONGITUDE
                                    }
                            })
                            // GOOGLE MAP MARKER
                            marker = new google.maps.Marker({
                                position: {
                                    lat: {{$user->lat}},
                                    lng: {{$user->lng}},
                                },
                                map: map,
                                icon: {                             
                                    url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"                   
                                },
                                draggable: false // GOOGLE MAP WHERE THE MARKER IS TO BE ADDED
                            });
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
                                       
                                    direction = new google.maps.DirectionsRenderer({
                                        function calculateRoute() 
        {
                                        var request = 
                                        {
                                            origin: $a['lat'], $a['lng'],
                                            destination: $user->lat,$user->l
                                            travelMode: 'WALKING',
                                            
                                        };
                                    

                                        directionsService.route(request, function(result, status)
                                        {
                                        if(status == 'OK')
                                        {
                                        
                                            directionsDisplay.setDirections(result);
                                                // var totalDist = 0;
                                                // var totalTime = 0;
                                                // var myroute = result.routes[0];
                                                // for (i = 0; i < myroute.legs.length; i++) {
                                                // totalDist += myroute.legs[i].distance.value;
                                                // totalTime += myroute.legs[i].duration.value;
                                                // totalDist = totalDist / 1000.
                                                // document.getElementById('dvDistance').innerHTML = "total distance is: " + totalDist + " km<br>total time is: " + (totalTime / 60).toFixed(2) + " minutes";
                                            }                  
                                        }
                                        });
                                                                });
                                    });
                                    
                                    
                            }
                            @endforeach
                            
                        },
                        function (error) {
                            // IF GEOLOCATION IS UNSUCCESSFULL
                            alert("Ooops! Something went wrong.")
                        }
                    )
                } else {
                    alert("Ooops! Browser doesn't support Geolocation.")
                }
            }
        </script>


        <script>
         
                var directionsDisplay = new google.maps.DirectionsRenderer();
                var directionsService = new google.maps.DirectionsService();

        var map;

        var boudha = new google.maps.LatLng(6.913594199999999, 122.06137260000003);
        var hattisar = new google.maps.LatLng(6.925378200000001, 122.04822280000008);
        

   

        var mapOptions = 
        {
            zoom: 14,
            center: {
                lat: {{ $user->lat }}, 
            lng: {{ $user->lng }},
            },

            
           

           
           
        };

        var marker = new google.maps.Marker({
                                position: {
                                    lat: {{$user->lat}},
                                    lng: {{$user->lng}},
                                },
                                map: map,
                                icon: {                             
                                    url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"                   
                                },
                                draggable: false // GOOGLE MAP WHERE THE MARKER IS TO BE ADDED
                            });

       

        map = new google.maps.Map(document.getElementById('map'), mapOptions, marker);

        directionsDisplay.setMap(map);


        function calculateRoute() 
        {
            var request = 
            {
                origin: boudha,
                destination: hattisar,
                travelMode: 'WALKING',
                
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
                    totalDist = totalDist / 1000.
                    document.getElementById('dvDistance').innerHTML = "total distance is: " + totalDist + " km<br>total time is: " + (totalTime / 60).toFixed(2) + " minutes";
                }                  
               }
            });



          
          
        }

   
        document.getElementById('get').onclick = function()
            {
                calculateRoute();   
            }

       

       
         

           
            </script>
        

        
@endsection