@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div id="map" style="height: 70vh; width: auto">
                    <!-- Google Map Goes Here -->
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
                            google.maps.event.addListener(marker, 'click', function() {alert('TANGINA MO AYEAH AYEAH')});
                            
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwG2FvuLOl_rGjp4LHR6XSeLIG_ZjjJ0M&callback=initMap"></script>