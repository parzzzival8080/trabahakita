@extends('layouts.app')
@section('content')
<div class="card my-3">
        <div class="container my-3">
                <strong ><h5>Academic Background</h5></strong>
                <table class="table my-5">
                    <thead>
                        <tr>
                            <th scope="col">School</th>
                            <th scope="col">School Level</th>
                            <th scope="col">Year Attended</th>
                            <th scope="col">Highest Attainment</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                                @if(count($education) > 0)
                                @foreach($education as $exp)
                                <th>{{$exp->school}}</th>
                                <th>{{$exp->level}}</th>
                                <th>{{$exp->from}} - {{$exp->to}}</th>
                                <th>{{$exp->attainment}}</th>
                               
                                @endforeach
                                @else
                                <th>Add Your Academic Background</th>
                                @endif
                        </tr>
                    </tbody>
                </table>
            
                <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#educationmodal">Add Academic Background</button>
                </div>
        </div>
        
        <div class="modal fade" id="educationmodal" tabindex="-1" role="dialog" aria-labelledby="educationlabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                 <h5 class="modal-title" id="educationlabel">Academic Background</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                            </div>
                                <div class="modal-body">
                                  
                                    <div class="row">
                                        <div class="col">
                                                <form action="/profile/education" method="POST" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                            <label for="school">Name of your School</label>  
                                            <input type="text" class="form-control" placeholder="School">  
                                        </div>    
                                    </div>
                                    <div class="row">
                                            <div class="col">
                                                    <label for="level">School Level</label>
                                                    <select class="custom-select mr-sm-2" id="level" name="level" placeholder="Choose" required>
                                                            <option   disabled >Choose</option>
                                                                <option value="primary">Primary</option>
                                                                <option value="secondary">Secondary</option>
                                                                <option value="tertiary">Tertiary</option>             
                                                              </select>
                                            </div>
                                            
                                        </div>  
                                    <div class="row">
                                        <div class="col">
                                                <label for="school">From</label>  
                                            <input type="text" class="form-control" placeholder="Year Started">   
                                        </div>
                                        <div class="col">
                                                <label for="school">To</label>  
                                                <input type="text" class="form-control" placeholder="Year Ended">  
                                        </div>    
                                    </div> 
                                    <div class="row">
                                        <div class="col">
                                                <label for="attainment">Highest Attainment</label>    
                                                <input type="text" class="form-control" placeholder="Note:if tertiary, indicate your course">  
                                        </div>
                                      
                                    </div>  
                                   
                                           
                               
                             
                                </div>
              <div class="modal-footer">
                    <div class="d-flex justify-content-end my-3">
                            <button type="button" class="btn btn-secondary mx-2" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    
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
                                                    <input type="text" name="attainment" class="form-control" id="degid" placeholder="Degree Attained" value="{{$edu->attainment}}" required>
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
</div>

{{-- work experience --}}

<div class="card my-4">
    <div class="container my-3">
        <strong>Work Experience</strong>
        <table class="table my-5">
                <thead>
                    <tr>
                        <th scope="col">Office Name</th>
                        <th scope="col">Position</th>
                        <th scope="col">Year Attended</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @if(count($experience) > 0)
                        @foreach($experience as $exp)
                        <th>{{$exp->workplace}}</th>
                        <th>{{$exp->position}}</th>
                        <th>{{$exp->from}} - {{$exp->to}}</th>
                       
                        @endforeach
                        @else
                        <th>No Experience</th>
                        @endif
                      
                    </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#workmodal">Add Work Experience</button>
            </div>
    </div>
</div>

<div class="modal fade" id="workmodal" tabindex="-1" role="dialog" aria-labelledby="educationlabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="educationlabel">Work Experience</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                   
                        <div class="modal-body">
                                <form action="/profile/experience" method="post" enctype="multipart/form-data" >
                                    {{ csrf_field() }}
                                <div class="form-group row">
                                    <div class="container">
                                            <label for="schoolid">School</label>

                                            <input type="text" name="school" class="form-control" id="schoolid" placeholder="School Graduated"   required>
                                    </div>
                                       
                                        <div class="col-md-4 mb-3">
                                                <label for="fyear">From</label>
                                                <input type="text" name="from-year" class="form-control" id="year" placeholder="FROM(YEAR)"  required>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="tyear">To</label>
                                                    <input type="text" name="to-year" class="form-control" id="year" placeholder="TO(YEAR)"   required>
                                                    </div>
                                </div>
                                <label for="">Work Descriptions</label>
                                <input type="text" name="office" class="form-control" id="schoolid" placeholder="Description"  required>
                       
                        <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                        </div>
                    
            </div>
        </div>
    </div>

    {{-- Edit work --}}
    @foreach($experience as $exp)
    @if($exp->user_id == auth()->user()->id)
<div class="modal fade" id="workmodaledit{{$exp->id}}" tabindex="-1" role="dialog" aria-labelledby="educationlabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                             <h5 class="modal-title" id="educationlabel">Work Experience</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                             </button>
                        </div>
                       
                            <div class="modal-body">
                                    <form action="/profile/experience" method="post" enctype="multipart/form-data" >
                                        {{ csrf_field() }}
                                    <div class="form-group row">
                                        <div class="container">
                                                <input type="text" id="exp_id" name="id" value="{{$exp->id}}" hidden>
                                                <label for="schoolid">Office</label>
    
                                                <input type="text" name="office" class="form-control" id="schoolid" placeholder="School Graduated" value={{$exp->workplace}}   required>
                                        </div>
                                           
                                            <div class="col-md-4 mb-3">
                                                    <label for="fyear">From</label>
                                                    <input type="text" name="from-year" class="form-control" id="year" placeholder="FROM(YEAR)" value={{$exp->from}}  required>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="tyear">To</label>
                                                        <input type="text" name="to-year" class="form-control" id="year" placeholder="TO(YEAR)"  value={{$exp->to}}  required>
                                                        </div>
                                    </div>
                                    <label for="">Work Descriptions</label>
                                    <input type="text" name="office" class="form-control" id="schoolid" placeholder="School Graduated" value={{$exp->workplace}}   required>
                           
                            <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                            </div>
                        
                </div>
            </div>
        </div>
        @endif
        @endforeach
        
  

            {{-- Skills --}}
            <div class="card my-4">
                <div class="container my-3">
                    <strong>Your Skills</strong>
                    <table class="table my-5">
                            <thead>
                                <tr>
                                <th scope="col">Field: {{$profile->area}}</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @if(count($skills) > 0)
                                    @foreach($skills as $skill)
                                <th>{{$skill->desc}}</th>
                                    @endforeach
                                    @else
                                    <th>Add your skills</th>
                                    @endif
                                   
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#skillmodal">Add Skills</button>
                        </div>
                </div>
            </div>

            <div class="modal fade" id="skillmodal" tabindex="-1" role="dialog" aria-labelledby="educationlabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                 <h5 class="modal-title" id="educationlabel">Add a Skill</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                            </div>
                            <form action="/profile/skill" method="post" enctype="multipart/form-data" >
                                {{ csrf_field() }}
                                <div class="modal-body">
                                        <select class="custom-select mr-sm-2" id="field" name="field" placeholder="Choose" required>
                                                <option   disabled >Choose</option>
                                                    @foreach($category as $cat)
                                                    @if($profile->area == $cat->category)
                                                    <option value="{{$cat->skill}}">{{$cat->skill}}</option>
                                                    @endif
                                                    @endforeach
                                                  </select>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>sssssssssss
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>

   
@endsection