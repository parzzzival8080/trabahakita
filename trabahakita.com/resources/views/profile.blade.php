@extends('layouts.app')
@section('content')
 
  
            @if($profile->type == 'employee')
            <h2>Customize Your Profile</h2>
            <form method="post" action="/employee/profile/update" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="nameid" class="col-sm-3 col-form-label">NAME</label>
                    <div class="col-sm-9">
                    <input name="name" type="text" class="form-control" id="nameid" placeholder="Name" value="{{$profile->name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="courseid" class="col-sm-3 col-form-label">Course</label>
                    <div class="col-sm-9">
                        <input name="course" type="text" class="form-control" id="courseid"
                               placeholder="Course" value="{{$profile->course}}">
                    </div>
                </div>
               
                <div class="form-group row">
                    <label for="skill" class="col-sm-3 col-form-label">Skills</label>
                    <div class="col-sm-9">
                        <input name="skill" type="text" class="form-control" id="skill"
                               placeholder="Skills" value="{{$profile->skill}}">
                    </div>
                </div>
        
                <div class="form-group row">
                    <label for="desc" class="col-sm-3 col-form-label">DESCRIPTION OF YOUR SELF</label>
                    <div class="col-sm-9">
                        <textarea name="desc" type="text" class="form-control" id="desc" rows="3"
                               placeholder="DESCRIPTION" >{{$profile->description}}</textarea>
                    </div>
                </div>
                
                 
                <div class="form-group row">
                    <div class="offset-sm-3 col-sm-9">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                
            </form>
            @else
            <h2>Customize Your Profile</h2>
            <form method="post" action="/employee/profile/update" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="nameid" class="col-sm-3 col-form-label">NAME</label>
                    <div class="col-sm-9">
                    <input name="name" type="text" class="form-control" id="nameid" placeholder="Name" value="{{$profile->name}}">
                    </div>
                </div>
            
        
                <div class="form-group row">
                    <label for="desc" class="col-sm-3 col-form-label">DESCRIPTION OF THE COMPANY</label>
                    <div class="col-sm-9">
                        <textarea name="desc" type="text" class="form-control" id="desc" rows="3"
                               placeholder="DESCRIPTION" >{{$profile->description}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-sm-3 col-form-label">ADDRESS</label>
                    <div class="col-sm-9">
                        <textarea name="address" type="text" class="form-control" id="address" rows="2"
                               placeholder="ADDRESS" >{{$profile->adress}}</textarea>
                    </div>
                </div>
                
                 
                <div class="form-group row">
                    <div class="offset-sm-3 col-sm-9">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                
            </form>
            @endif
              
              
  
    
  
 
@endsection