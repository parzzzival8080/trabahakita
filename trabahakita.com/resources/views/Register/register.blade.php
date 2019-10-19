@extends('layouts.app')
 
@section('content')
 
    <h2>Register</h2>
    <form method="POST" action="/register">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
 
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
 
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Password Confirmation:</label>
            <input type="password" class="form-control" id="password_confirmation"
                   name="password_confirmation">
        </div>

        <div class="form-group">
            <input type="radio" name="type" value="employee" checked>
            <label for="type">Employee</label>
               
            </div>
            <div class="form-group">
                <input type="radio" name="type" value="company">
                <label for="type">Company</label>
            </div>
            <div class="col-md-8 col-sm-12">
                <div id="map" style="height: 70vh; width: auto">
                    <!-- Google Map Goes Here -->
                </div>        
            </div>
            <div class="form-group">
            <input name="lng" id ="lng" value="0">
            <input name="lat" id="lat" value="0">
            </div>

 
        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
       
    </form>
 
    <script type="text/javascript">
        function initMap() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function (result) {
                        // IF GEOLOCATION IS SUCCESSFULL

                        // GOOGLE MAP
                        var map = new google.maps.Map(
                            document.getElementById('map'), {
                                zoom: 18, // GOOGLE MAP ZOOM LEVEL
                                scrollwheel: false,
                                center: { // GOOGLE MAP CENTER 
                                    lat: result.coords.latitude, // GEOLOCATION RESULT LATITUDE
                                    lng: result.coords.longitude // GEOLOCATION RESULT LONGITUDE
                                }
                        });
                            
                        // GOOGLE MAP MARKER
                        var marker = new google.maps.Marker({
                            position: { // GOOGLE MAP MARKER POSITION
                                lat: result.coords.latitude, // GEOLOCATION RESULT LATITUDE
                                lng: result.coords.longitude // GEOLOCATION RESULT LONGITUDE
                            },
                            map: map,
                            draggable: true // GOOGLE MAP WHERE THE MARKER IS TO BE ADDED
                        });

                        //Initial entry
                        $('#lat').val(marker.getPosition().lat());
                        $('#lng').val(marker.getPosition().lng());

                        //var myLatlng = new google.maps.LatLng(marker, 'position');
                        google.maps.event.addListener(marker, 'position_changed', function () {
                            var lat = marker.getPosition().lat();
                            var lng = marker.getPosition().lng();

                            $('#lat').val(lat);
                            $('#lng').val(lng);
                        });

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

    <!-- NEEDED FOR GOOGLE MAPS TO WORK -->
    <!-- AFTER A SUCCESSFULL FETCH, LOOKS FOR initMap FUNCTION THEN EXECUTE -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwG2FvuLOl_rGjp4LHR6XSeLIG_ZjjJ0M&callback=initMap" type="text/javascript"></script>


@endsection