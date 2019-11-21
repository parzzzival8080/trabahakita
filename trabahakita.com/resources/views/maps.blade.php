@extends('layouts.app')
@section('content')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwG2FvuLOl_rGjp4LHR6XSeLIG_ZjjJ0M&libraries=places" type="text/javascript"></script>
    <div id="map" style="width:700px;height:700px"></div>
    @foreach($locations as $loc)
<button class="btn btn-info" id="{{$loc['id']}}">Show Direction</button>
{{$loc['id']}}
    @endforeach
    <p id="dvDistance"></p>

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

    var marker = new google.maps.Marker(
        {
            position: {
                lat:6.925378200000001, 
                lng:122.04822280000008
                    },

            map: map,
           label:'point 2',
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
                    document.getElementById('dvDistance').innerHTML = "total distance is: " + totalDist + " km<br>total time is: " + (totalTime / 60).toFixed(2) + " minutes";
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