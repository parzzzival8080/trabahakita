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
                        @if(count($education) > 0)
                        <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <h4>School</h4>
                                       
                                    </div>
                                    <div class="col-sm">
                                        <h4>Course</h4>
                                        
                                    </div>
                                    <div class="col-sm">
                                        <h4>From</h4>
                                       
                                    </div>
                                    <div class="col-sm">
                                        <h4>To</h4>
                                       
                                    </div>
                                    <div class="col-sm">
                                            <h4>Action</h4>
                                        </div>
                                </div>
                            </div>
                            @foreach($education as $edu)
                                @if($edu->user_id == auth()->user()->id)
                                    <div class="container">  
                                        <div class="row">
                                            <div class="col-sm">
                                                <h5>{{$edu->school}}</h5>
                                            </div>
                                            <div class="col-sm">
                                                <h5>  {{$edu->course}}</h5>
                                            </div>
                                            <div class="col-sm">
                                                <h5> {{$edu->from}}</h5>
                                            </div>
                                            <div class="col-sm">
                                                <h5>{{$edu->to}}</h5>
                                            </div>
                                            <div class="col-sm">
                                                    <button class="btn btn-info" data-toggle="modal" data-target="#educationmodaledit{{$edu->id}}">Edit</button>
                                                    <button class="btn btn-danger">Delete</button>
                                                </div>
                                        </div>
                                   
                                        
                                    </div>
                                    <hr>
                                @endif
                            @endforeach
                            @else
                            <h5>Add Educational Attainment for Higher chance of Hiring! :)</h5>
                        @endif
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#educationmodal">
                            Add Educational Attainment
                            </button>
                            <h3>Skills</h3>
                            @if(count($skills) > 0)
                                @foreach($skills as $skill)
                                    @if($skill->user_id == auth()->user()->id)
                                        <div class="container">  
                                            <div class="row">
                                                <div class="col-sm">
                                                    <h5>{{$skill->desc}}</h5>
                                                </div>
                                                <div class="col-sm">
                                                      
                                                    </div>
                                                    <div class="col-sm">
                                                          
                                                        </div>
                                                
                                                <div class="col-sm">
                                                <button class="btn btn-info" data-toggle="modal" data-target="#skillmodaledit{{$skill->id}}">Edit</button>
                                                        <button class="btn btn-danger">Delete</button>
                                                    </div>
                                                </div>
                                            
                                        </div>
                                        <hr>
                                    @endif
                                @endforeach
                                @else
                                <h5>Add skills for Higher chance of Hiring! :)</h5>
                            @endif
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#skillmodal">
                                    Add Skill
                                    </button>
                                
                                <h3>Experience</h3>
                                @if(count($experience) > 0)
                                    @foreach($experience as $exp)
                                        @if($exp->user_id == auth()->user()->id)
                                            <div class="container">  
                                                <div class="row">
                                                        <div class="col-sm">
                                                                <h5>{{$exp->workplace}}</h5>
                                                            </div>
                                                    <div class="col-sm">
                                                    <h5>{{$exp->from}}-{{$exp->to}}</h5>
                                                    </div>
                                                    <div class="col-sm">
                                                           
                                                        </div>
                                                    <div class="col-sm">
                                                            <button class="btn btn-info" data-toggle="modal" data-target="#expmodaledit{{$exp->id}}">Edit</button>
                                                                    <button class="btn btn-danger">Delete</button>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                    <div class="col-sm">
                                                                            <h5>• {{$exp->desc_1}}</h5>
                                                                    </div>
                                                                        </div>
                                                                        <div class="row">
                                                                                <div class="col-sm">
                                                                                        <h5>• {{$exp->desc_2}}</h5>
                                                                                </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                            <div class="col-sm">
                                                                                                    <h5>• {{$exp->desc_3}}</h5>
                                                                                            </div>
                                                                                                </div>
                                            </div>
                                            <hr>
                                        @endif
                                    @endforeach
                                    @else
                                    <h5>Add skills for Higher chance of Hiring! :)</h5>
                                @endif
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#expmodal">
                                        Add Experience
                                        </button>
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
              
                
            </form>
            <form action="/post/pdf" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Generate Resume</button>
            </form>

          
  
                <!-- Modal for Educational Attainment Add-->
        <div class="modal fade" id="educationmodal" tabindex="-1" role="dialog" aria-labelledby="educationlabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                             <h5 class="modal-title" id="educationlabel">Educational Attainment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                             </button>
                        </div>
                            <div class="modal-body">
                                    <form action="/profile/education" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="schoolid">School</label>
                                    <input type="text" name="school" class="form-control" id="schoolid" placeholder="School Graduated"  required>
                                    <div class="col-md-4 mb-3">
                                            <label for="fyear">From</label>
                                            <input type="text" name="from-year" class="form-control" id="year" placeholder="FROM(YEAR)"  required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="tyear">To</label>
                                                <input type="text" name="to-year" class="form-control" id="year" placeholder="TO(YEAR)"  required>
                                                </div>
                            </div>
                            <div class="form-group row">
                                    <div class="col">
                                            <label for="degid">Degree</label>
                                            <input type="text" name="degree" class="form-control" id="degid" placeholder="Degree Attained" required>
                                            </div>
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                            </div>
          <div class="modal-footer">
           
          </div>
        </div>
      </div>
    </div>

          {{-- Edit for educational Attainment --}}
          @foreach($education as $edu)
            @if($edu->user_id == auth()->user()->id)
          <div class="modal fade" id="educationmodaledit{{$edu->id}}" tabindex="-1" role="dialog" aria-labelledby="educationlabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="educationlabel">Educational Attainment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body">
                                    <form action="/profile/education/update" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                        <input type="text" id="edu_id" name="id" value="{{$edu->id}}" hidden>
                                    <div class="form-group row">
                                        <label for="schoolid">School</label>
                                        <input type="text" name="school" class="form-control" id="schoolid" placeholder="School Graduated" value="{{$edu->school}}"  required>
                                        <div class="col-md-4 mb-3">
                                                <label for="fyear">From</label>
                                                <input type="text" name="from-year" class="form-control" id="year" placeholder="FROM(YEAR)" value="{{$edu->from}}"  required>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="tyear">To</label>
                                                    <input type="text" name="to-year" class="form-control" id="year" placeholder="TO(YEAR)" value="{{$edu->to}}"  required>
                                                    </div>
                                </div>
                                <div class="form-group row">
                                        <div class="col">
                                                <label for="degid">Degree</label>
                                                <input type="text" name="degree" class="form-control" id="degid" placeholder="Degree Attained" value="{{$edu->course}}" required>
                                                </div>
                                </div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>
                                </div>
            <div class="modal-footer">
            
            </div>
            </div>
        </div>
        </div>
        @endif
        @endforeach


    <!-- Modal for skills -->
 
    <div class="modal fade" id="skillmodal" tabindex="-1" role="dialog" aria-labelledby="skillmodallabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="skillmodallabel">Add Skill</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="/profile/skill" method="post" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div class="form-group row">
                    <div class="col">
                         <label for="skillid">Skill</label>
                         <input type="text" name="skill" class="form-control" id="skillid" placeholder="Describe your skill" required>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
            <div class="modal-footer">
             
            </div>
          </div>
        </div>
      </div>

        <!-- Modal for skills edit -->
        @foreach($skills as $skill)
        @if($skill->user_id == auth()->user()->id)
    <div class="modal fade" id="skillmodaledit{{$skill->id}}" tabindex="-1" role="dialog" aria-labelledby="skillmodallabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="skillmodallabel">Add Skill</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="/profile/skill/update" method="post" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div class="form-group row">
                    <div class="col">
                         <label for="skillid">Skill</label>
                         <input type="text" id="edu_id" name="id" value="{{$skill->id}}" hidden>
                    <input type="text" name="skill" class="form-control" id="skillid" placeholder="Describe your skill" value="{{$skill->desc}}" required>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
            <div class="modal-footer">
             
            </div>
          </div>
        </div>
      </div>
      @endif
      @endforeach

      {{-- Modal for Experience --}}
      <div class="modal fade" id="expmodal" tabindex="-1" role="dialog" aria-labelledby="expmodallabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="skillmodallabel">Add Experience</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="/profile/experience" method="post" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div class="form-group row">
                    <div class="col">
                         <label for="workid">Workplace</label>
                         <input type="text" name="work" class="form-control" id="workid" placeholder="Describe your skill" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                         <label for="workid">From</label>
                         <input type="text" name="from" class="form-control" id="workid" placeholder="Year or Month" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                         <label for="workid">To</label>
                         <input type="text" name="to" class="form-control" id="workid" placeholder="Year or Month" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                         <label for="desc1">Description 1</label>
                         <input type="text" name="desc_1" class="form-control" id="desc1" placeholder="Describe your work" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                         <label for="desc2">Description 2</label>
                         <input type="text" name="desc_2" class="form-control" id="desc2" placeholder="Describe your work" required>
                    </div>
                </div>  
                <div class="form-group row">
                    <div class="col">
                         <label for="desc3">Description 3</label>
                         <input type="text" name="desc_3" class="form-control" id="desc3" placeholder="Describe your work" required>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
            <div class="modal-footer">
             
            </div>
          </div>
        </div>
      </div>

       {{-- Modal for Experience edit --}}
       @foreach($experience as $exp)
       @if($exp->user_id == auth()->user()->id)
       <div class="modal fade" id="expmodaledit{{$exp->id}}" tabindex="-1" role="dialog" aria-labelledby="expmodallabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="skillmodallabel">Add Experience</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="/profile/experience" method="post" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div class="form-group row">
                    <div class="col">
                            <input type="text" id="edu_id" name="id" value="{{$exp->id}}" hidden>
                         <label for="workid">Workplace</label>
                         <input type="text" name="work" class="form-control" id="workid" placeholder="Describe your skill" value="{{$exp->workplace}}" required>
                    </div>
                </div>
                <div class="form-group row">
                        <div class="col">
                             <label for="workid">From</label>
                             <input type="text" name="from" class="form-control" id="workid" placeholder="Year or Month" value="{{$exp->from}}"  required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                             <label for="workid">To</label>
                             <input type="text" name="to" class="form-control" id="workid" placeholder="Year or Month" value="{{$exp->to}}" required>
                        </div>
                    </div>
                <div class="form-group row">
                    <div class="col">
                         <label for="desc1">Description 1</label>
                         <input type="text" name="desc_1" class="form-control" id="desc1" placeholder="Describe your work" value="{{$exp->desc_1}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                         <label for="desc2">Description 2</label>
                         <input type="text" name="desc_2" class="form-control" id="desc2" placeholder="Describe your work" value="{{$exp->desc_2}}" required>
                    </div>
                </div>  
                <div class="form-group row">
                    <div class="col">
                         <label for="desc3">Description 3</label>
                         <input type="text" name="desc_3" class="form-control" id="desc3" placeholder="Describe your work" value="{{$exp->desc_3}}" required>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
            <div class="modal-footer">
             
            </div>
          </div>
        </div>
      </div>
          @endif
          @endforeach  
           
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