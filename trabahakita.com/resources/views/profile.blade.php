@extends('layouts.app')
@section('content')
<div class="container my-3">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwG2FvuLOl_rGjp4LHR6XSeLIG_ZjjJ0M&libraries=places" type="text/javascript"></script>
    <h4><strong>Personal Information</strong></h4>
</div>


    @if(auth()->user()->type == 'employee')
        <div class="container my-5">
                <form method="post" action="/employee/profile/update" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="row my-3" >
                             <div class="col-4">
                                        <center>
                                            @if($profile->image == null)
                                            <img  alt="" class="img-fluid" style="background:gray;width:200px;height:200px" src="https://res.cloudinary.com/dntfm4ivf/image/upload/c_fit,h_554,w_554/whs7ihyxxa91889a6sot.png">
                                            @else
                                            <img  alt="" class="img-fluid" style="background:gray;width:200px;height:200px" src="{{$profile->image}}">
                                            @endif
                                                
                                              
                                               
                                        </center>
                                        <center>
                                        <label for="fileid" class=""><strong>Profile</strong></label>
                                        @if(session()->has('status'))
                                        <div class="alert alert-info" role="alert">
                                            {{session()->get('status')}}
                                        </div>
                                    @endif
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <input type="file" name="image_name" class="form-control" id="name" value="{{$profile->image}}">
                                        @if($errors->has('image_name'))
                                            <span class="help-block">{{ $errors->first('image_name') }}</span>
                                        @endif
                                    </div>
                 
                                        </center>
                                           

                                     
                             </div>
                             <div class="col-8">
                                 <div class="row ">
                                         <div class="col">
                                                 <label for="firstname">First Name*</label>
                                                  <input type="text" name="first_name" class="form-control"  placeholder="First name" value="{{$profile->first_name}}" required>
                                             </div>

                                             <div class="col">
                                                  <label for="middlename">Middle Name*</label>
                                                  <input type="text" name="middle_name" class="form-control" placeholder="Middle Name" value="{{$profile->middle_name}}" required>
                                             </div>
                                             <div class="col">
                                                  <label for="lastname">Last Name*</label>
                                                  <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{$profile->last_name}}" required>
                                             </div>
                                             <div class="col">
                                                  <label for="extname">Extension Name*</label>
                                                  <input type="text" name="ext_name" class="form-control" placeholder="Extension Name" value="{{$profile->ext_name}}" >
                                             </div>
                                 </div>
                                 <div class="row my-3">
                                     
                                     <div class="col">
                                             <label for="extname">Field of Work*</label>
                                             <select class="custom-select mr-sm-2" id="field" name="field" placeholder="Choose" required>
                                                    <option   disabled >Choose</option>
                                                        <option value="Accounting & Consulting">Accounting & Consulting</option>
                                                        <option value="Admin Support">Admin Support</option>
                                                        <option value="Customer Service">Customer Service</option>
                                                        <option value="Data Science & Analytics">Data Science & Analytics</option>
                                                        <option value="Design & Creative">Design & Creative</option>
                                                        <option value="Engineering & Architecture">Engineering & Architecture</option>
                                                        <option value="IT & Engineering">IT & Engineering</option>
                                                        <option value="Legal">Legal</option>
                                                        <option value="Translation">Translation</option>
                                                        <option value="Web, Mobile & Software Development">Web, Mobile & Software Development</option>
                                                      </select>
                                     </div>
                                     <div class="col">
                                        <label for="extname">Expected Salary*</label>
                                         <input type="text" class="salary" class="form-control" placeholder="Ex: 20,000" >
                                     </div>
                                     <div class="col">
                                        <label for="extname">Year's of Experience*</label>
                                         <input type="text" class="exp" class="form-control" placeholder="Number of years" >
                                     </div>
                                 </div>
                                 <div class="row my-3">
                                        <div class="col">
                                                <label for="number">Your Number*</label>
                                                <input type="text" name="number" class="form-control" placeholder="Phone Number/Tel. Number" required value={{$profile->number}}>
                                        </div>
                                        <div class="col">
                                                <label for="extname">Your Email*</label>
                                                <input type="email" name="email" class="form-control" placeholder="johndoe@example.com" required value={{auth()->user()->email}}>
                                        </div>
                                    </div>
                                   
                             </div>
                            
                        </div>
                        <div class="row">
                            <label for="desc">Description of Yourself*</label>
                        <textarea name="desc" id="descid" class="form-control" cols="30" rows="5" placeholder="Describe yourself :)" required>{{$profile->description}}</textarea>
                        </div>
                        <div class="row my-3">
                                <label for="desc">Address*</label>
                                <input type="text" name="address" class="form-control" id="searchmap" placeholder="Permanent Address" required value="{{$profile->adress}}" required>
                                <input  name="lat" id="lat" value="{{$profile->lat}}"  hidden>
                                <input  name="lng" id="lng" value="{{$profile->lng}}" hidden>  
                            </div>
                            {{-- <div class="row my-3"> --}}
                                    <div class="card">
                                            <div id="map" style="height: 350px; width:100%"></div>
                                        </div>
                            {{-- </div> --}}
                           
                            </div>

                      <div class="d-flex justify-content-end">
                       
                            
                            <button class="btn btn-success mb-5">
                                   Save
                                </button>
                      </div>
                  
             
                    </form>
                    <div class="d-flex justify-content-end">
                        <a href="/employee/education" style="color:white"><button class="btn btn-info mb-5">
                      
                        Academic And Working Background </a>
                     </button>
                    </div>

        </div>
      
    @elseif(auth()->user()->type == 'company')
          
                <div class="container">
                        <form method="post" action="/employee/profile/update" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="container mt-2"> 
                                <center>
                                    @if($profile->image == null)
                                    <img  alt="" class="img-fluid" style="background:gray;width:1000px;height:400px" src="http://res.cloudinary.com/dntfm4ivf/image/upload/c_fit,h_554,w_554/whs7ihyxxa91889a6sot.png">
                                    @else
                                    <img  alt="" class="img-fluid" style="background:gray;width:1000px;height:400px" src="{{$profile->image}}">
                                    @endif
                                        
                                      
                                       
                                </center>
                                <center>
                                <label for="fileid" class="">Banner<strong></strong></label>
                                @if(session()->has('status'))
                                <div class="alert alert-info" role="alert">
                                    {{session()->get('status')}}
                                </div>
                            @endif
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <input type="file" name="image_name" class="form-control" id="name" value="" required>
                                @if($errors->has('image_name'))
                                    <span class="help-block">{{ $errors->first('image_name') }}</span>
                                @endif
                            </div>
         
                                </center>
                            </div>
                            <div class="form-group row">
                                <label for="nameid" class="col-sm-3 col-form-label">Company Name</label>
                                <div class="col-sm-9">
                                <input name="company_name" type="text" class="form-control" id="nameid" placeholder="Company Name" value="{{$profile->company_name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="repid" class="col-sm-3 col-form-label">Representative Name</label>
                                    <div class="col-sm-9">
                                    <input name="representative" type="text" class="form-control" id="repid" placeholder="Representative Name" value="{{$profile->company_rep}}">
                                    </div>
                                </div>
                                    <div class="form-group row">
                                            <label for="numid" class="col-sm-3 col-form-label">Telephone Number</label>
                                            <div class="col-sm-9">
                                            <input name="number" type="text" class="form-control" id="numid" placeholder="Tel. Number" value="{{$profile->number}}">
                                            </div>
                                    </div>
                                       
                                    <div class="form-group row">
                                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                            <input name="email" type="text" class="form-control" id="email" placeholder="Email" value="{{$profile->email}}">
                                            </div>
                                    </div>
                            <div class="form-group row">
                                <label for="desc" class="col-sm-3 col-form-label">Description of the Company</label>
                                <div class="col-sm-9">
                                    <textarea name="desc" type="text" class="form-control" id="desc" rows="3"
                                           placeholder="DESCRIPTION" >{{$profile->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-sm-3 col-form-label">Company Address</label>
                                <div class="col-sm-9">
                                    <textarea name="address" type="text" class="form-control" id="searchmap" rows="2"
                                           placeholder="ADDRESS" >{{$profile->adress}}</textarea>
                                </div>
                            </div>   
                        <input  name="lat" id="lat" value="{{$profile->lat}}" hidden>
                            <input name="lng" id="lng" value="{{$profile->lng}}" hidden>
                                <div class="card">
                                    <div id="map" style="height: 400px"></div>
                                </div>
        
                   
                            <div class="d-flex justify-content-end">
                                 <button type="submit" class="btn btn-success" style="margin-top:10px">Save</button>
                
                         
            </div>
                           
                        </form>  
                </div>
            
                
    @endif

    <script>
   
    </script>

   


   
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwG2FvuLOl_rGjp4LHR6XSeLIG_ZjjJ0M&callback=initMap&libraries=places" type="text/javascript"></script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwG2FvuLOl_rGjp4LHR6XSeLIG_ZjjJ0M&libraries=places" type="text/javascript"></script> --}}
<script type="text/javascript">
    var foo = {!! json_encode($profile->toArray())!!}
    console.log(foo.lat)
    if (foo.lat == '0' || foo.lng == '0' )
    {  
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
                            draggable: false // GOOGLE MAP WHERE THE MARKER IS TO BE ADDED
                        });

                        //Initial entry
                        $('#lat').val(marker.getPosition().lat());
                        $('#lng').val(marker.getPosition().lng());

                        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));

                        google.maps.event.addListener(searchBox, 'places_changed', function () {

                            var places = searchBox.getPlaces();
                            var bounds = new google.maps.LatLngBounds();
                            var i, place;

                            for (i = 0; place = places[i]; i++) {
                                bounds.extend(place.geometry.location);
                                marker.setPosition(place.geometry.location);

                            }

                            map.fitBounds(bounds);
                            map.setZoom(18);

                        });

                        //var myLatlng = new google.maps.LatLng(marker, 'position');
                        google.maps.event.addListener(marker, 'position_changed', function () {
                            var lat = marker.getPosition().lat();
                            var lng = marker.getPosition().lng();

                            $('#lat').val(lat);
                            $('#lng').val(lng);
                      

                        var latlng = new google.maps.LatLng(lat, lng);

                        var geocoder = new google.maps.Geocoder();

                        geocoder.geocode({ 'latLng': latlng }, function (results, status) {

                            if (status !== google.maps.GeocoderStatus.OK) {
                                alert(status);
                            }

                            if (status == google.maps.GeocoderStatus.OK) {
                                console.log(results);

                                var address = (results[0].formatted_address);
                                
                                document.getElementById('searchmap').value = results[0].formatted_address;
                                }
                        });
                        });
                    },
                    
                    function (error) {
                        // IF GEOLOCATION IS UNSUCCESSFULL
                        alert("Ooops! Something went wrong.")
                    }
                )
            } 
            else {
                alert("Ooops! Browser doesn't support Geolocation.")
            }
        }

    }
    else{
        function initMap() 
        {
        
        var myLatlng = new google.maps.LatLng(foo.lat, foo.lng);
        var mapOptions = {
            zoom: 18,
            center: myLatlng,
            scrollwheel: false
        }
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            draggable: false
        });

        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));

        google.maps.event.addListener(searchBox, 'places_changed', function () {

            var places = searchBox.getPlaces();
            var bounds = new google.maps.LatLngBounds();
            var i, place;

            for (i = 0; place = places[i]; i++) {
                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location);

            }

            map.fitBounds(bounds);
            map.setZoom(18);

        });

        google.maps.event.addListener(marker, 'position_changed', function () {

            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();

            $('#lat').val(lat);
            $('#lng').val(lng);

        var latlng = new google.maps.LatLng(lat, lng);
    
        var geocoder = new google.maps.Geocoder();

        geocoder.geocode({ 'latLng': latlng }, function (results, status) {

            if (status !== google.maps.GeocoderStatus.OK) {
                alert(status);
            }

            if (status == google.maps.GeocoderStatus.OK) {
                console.log(results);

                var address = (results[0].formatted_address);
                
                document.getElementById('searchmap').value = results[0].formatted_address;
                }
            });
        });
    }
    }
    </script>
@endsection