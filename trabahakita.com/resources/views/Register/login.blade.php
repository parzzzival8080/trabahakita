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
        <div class="col">
                <div class="align-self-center" style="margin-top:70px">
                <img data-aos="fade-up" style="margin-left:70px" src="{{ Storage::url('/images/landing.png')  }}" alt="landing_picture">
                </div>
        </div>
    </div>
      
</div>
  


    
               
               
        
 
@endsection