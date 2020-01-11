@extends('layouts.app')
 
@section('content')
 
<div class="container"  style="margin-bottom:220px" >
    <div class="row">
        <div class="col">
                <div class="card" data-aos="fade-up" style="margin-top:90px;">
                        <div class="card-header py-2" style="background:#212121">
                           <div class="d-flex justify-content-center">
                            <h3 style="color:white; font-weight:300">Log In</h3>
                           </div>
                                
                           
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                    <form method="POST" action="/login">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="email" style="font-size:1.5em;">Email:</label>
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="password" style="font-size:1.5em;">Password:</label>
                                            <input type="password" class="form-control" id="password" name="password">
                                        </div>
                                        <div class="form-group">
                                                <div class="d-flex justify-content-end">
                                            <button style="cursor:pointer" type="submit" class="btn btn-success">Login</button>
                                                </div>
                                        </div>
                                       
                                    </form>
                            </div>
                        </div>
                    </div>
        </div>
        <div class="col mx-auto">
                
                <img data-aos="fade-up" style="height:500px; width:700px" src="https://res.cloudinary.com/dntfm4ivf/image/upload/v1578729558/2landingpage_w5n42p.jpg" alt="landing_picture">
                
          
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <h3  class="mx-auto" style="font-weight:300; color:grey">We give you a Free Job Fair, Everyday!</h3>
    </div>
   
      
</div>
  


    
               
               
        
 
@endsection