@extends('layouts.app')
 
@section('content')
 
<div class="container" style="margin-top:50px">
    <div class="row">
        <div class="col">
                <div class="card">
                        <div class="card-header">
                                <h2>Log In</h2>
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                    <form method="POST" action="/login">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="password">Password:</label>
                                            <input type="password" class="form-control" id="password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <button style="cursor:pointer" type="submit" class="btn btn-primary">Login</button>
                                        </div>
                                       
                                    </form>
                            </div>
                        </div>
                    </div>
        </div>
        <div class="col">
                <div class="align-self-center" style="margin-top:70px">
            <h1 style="font-weight:300">We give you a Free Job Fair, Everyday!</h1>
                </div>
        </div>
    </div>
      
</div>
  


    
               
               
        
 
@endsection