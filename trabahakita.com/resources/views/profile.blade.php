@extends('layouts.app')
@section('content')
 
  
            @if($profile->type == 'employee')
            <h2>Customize Your Profile</h2>
            <form method="post" action="/employee/profile/update" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card">
                    <div class="container">
                            <div class="form-group row">
                                <div class="container">
                                    <h3>PERSONAL INFORMATION</h3>
                                </div>
                                <div class="container"> 
                                        <div class="d-flex justify-content-center"> 
                                        <img class="card-img-top" style="height:400px;width:300px;" src="{{ Storage::url($profile->image)  }}" alt="Card image cap">
                                        </div>
                                </div>
                               
                                    <div class="col-md-4 mb-3">
                                            <label for="lnid">Last Name</label>
                                            <input type="text" name="lastname" class="form-control" id="lnid" placeholder="Last Name" value="{{$profile->last_name}}" required>
                                          </div>
                                          <div class="col-md-4 mb-3">
                                            <label for="fnid">First Name</label>
                                            <input type="text" name="firstname" class="form-control" id="fnid" placeholder="First Name" value="{{$profile->first_name}}" required>
                                          </div>
                                          <div class="col-md-4 mb-3">
                                                <label for="mnid">Middle Name</label>
                                                <input type="text" name="middlename" class="form-control" id="mnid" placeholder="Middle Name" value="{{$profile->middle_name}}" required>
                                              </div>

                        </div>
                        <div class="form-group">
                                        <label for="title">Your Title</label>
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Title you want for yourself" value="{{$profile->title}}" required>
                        </div>

                        <div class="form-group row">
                            
                                    <div class="col">
                                            <label for="addid">Address</label>
                                            <input type="text" name="address" class="form-control" id="addid" placeholder="Permanent Address" value="{{$profile->adress}}" required>
                                          </div>
                           
                        </div>
                        <div class="form-group row">
                                <label for="numid" class="col-sm-3 col-form-label">Number</label>
                                <div class="col-sm-9">
                                <input name="number" type="text" class="form-control" id="numid" placeholder="Number" value="{{$profile->number}}">
                                </div>
                        </div>
                           
                    
                </div>
                <div class="container">
                    <h3>EDUCATION</h3>
                    <div class="container">

                        <div class="form-group row">
                                <label for="schoolid">School(Latest)</label>
                                <input type="text" name="school" class="form-control" id="schoolid" placeholder="School Graduated" value="{{$profile->school}}" required>
                                <div class="col-md-4 mb-3">
                                        <label for="fyear">From</label>
                                        <input type="text" name="from-year" class="form-control" id="year" placeholder="FROM(YEAR)" value="{{$profile->from_year}}" required>
                                       
                                      </div>
                                      <div class="col-md-4 mb-3">
                                            <label for="tyear">To</label>
                                            <input type="text" name="to-year" class="form-control" id="year" placeholder="TO(YEAR)" value="{{$profile->to_year}}" required>
                                          </div>
                        </div>
                        <div class="form-group row">
                                <div class="col">
                                        <label for="degid">Degree</label>
                                        <input type="text" name="degree" class="form-control" id="degid" placeholder="Degree Attained" value="{{$profile->degree}}" required>
                                      </div>
                        </div>

                        <div class="form-group row">
                                <div class="col">
                                        <label for="areaid">Area of Expertise</label>
                                        <input type="text" name="expertise" class="form-control" id="areaid" placeholder="Area of Expertise" value="{{$profile->area}}" required>
                                      </div>
                        </div>
                        <div class="form-group row">
                                <label for="desc" class="col-sm-3 col-form-label">DESCRIPTION OF YOURSELF</label>
                                <div class="col-sm-9">
                                    <textarea name="desc" type="text" class="form-control" id="desc" rows="3"
                                           placeholder="DESCRIPTION" >{{$profile->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label for="fileid">Resume</label>
                                    <input type="file" name="image" class="form-control-file" id="fileid" accept=""  required>
                                  </div>
                    </div>
                    
                </div>
               <div class="form-group row">
                   <div class="container">
                       <div class="offset-sm-3 col-sm-9">
                           <button type="submit" class="btn btn-primary">Save</button>
                       </div>
                   </div>
                </div>
                </div>
                <a href="/mez">Download Picture</a>
                
            </form>
            @else
            <h2>Customize Your Profile</h2>
            <form method="post" action="/employee/profile/update" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="container"> 
                        <div class="d-flex justify-content-center"> 
                        <img class="card-img-top" src="{{ Storage::url($profile->image)  }}" alt="Card image cap">
                        </div>
                        <div class="form-group">
                                <label for="fileid">Picture</label>
                                <input type="file" name="image" class="form-control-file" id="fileid" accept=""  required>
                              </div>
                </div>
                <div class="form-group row">
                    <label for="nameid" class="col-sm-3 col-form-label">COMPANY NAME</label>
                    <div class="col-sm-9">
                    <input name="company_name" type="text" class="form-control" id="nameid" placeholder="Company Name" value="{{$profile->company_name}}">
                    </div>
                </div>
                <div class="form-group row">
                        <label for="repid" class="col-sm-3 col-form-label">REPRESENTATIVE NAME</label>
                        <div class="col-sm-9">
                        <input name="representative" type="text" class="form-control" id="repid" placeholder="Representative Name" value="{{$profile->company_rep}}">
                        </div>
                    </div>
                        <div class="form-group row">
                                <label for="numid" class="col-sm-3 col-form-label">Number</label>
                                <div class="col-sm-9">
                                <input name="number" type="text" class="form-control" id="numid" placeholder="Number" value="{{$profile->number}}">
                                </div>
                        </div>
                           
                        <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                <input name="email" type="text" class="form-control" id="email" placeholder="Email" value="{{$profile->email}}">
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