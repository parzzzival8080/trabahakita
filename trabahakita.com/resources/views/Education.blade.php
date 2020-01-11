@extends('layouts.app')
@section('content')
<div class="container my-3">
    <h4><strong>Education, Experience and Skills</strong></h4>
</div>
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
                            @if(count($education) > 0)
                            @foreach($education as $exp)
                            @if($exp->user_id == auth()->user()->id)
                        <tr>
                                <th scope="row">{{$exp->school}}</th>
                                <td>{{$exp->level}}</td>
                                <td>{{$exp->from}} - {{$exp->to}}</td>
                                <td>{{$exp->attainment}}</td>
                                
                                    <form action="/remove/school" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <td> 
                                            <input type="text" name="edu_id" value="{{$exp->id}}" hidden>
                                            <button type="button" class="btn btn-md" style="background-color:#7791c9; color:white" data-toggle="modal" data-target="#educationmodaledit{{$exp->id}}">Edit</button>
    
                                                <button type="submit" class="btn btn-md" style="background-color:#ed7777; color:white">Remove</button>
                                            </td> 
                                    </form>
                                  
                        </tr>
                        @endif
                        @endforeach
                        @else
                        <tr>
                                <th>Add Your Academic Background</th>
                        </tr>
                        
                        @endif
                    </tbody>
                </table>
            
                <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#educationmodal">Add Academic Background</button>
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
                                            <input type="text" name="school" class="form-control" placeholder="School" required>  
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
                                            <input type="text" name="from-year" class="form-control" placeholder="Year Started" required>   
                                        </div>
                                        <div class="col">
                                                <label for="school">To</label>  
                                                <input type="text" name="to-year" class="form-control" placeholder="Year Ended" required>  
                                        </div>    
                                    </div> 
                                    <div class="row">
                                        <div class="col">
                                                <label for="attainment">Highest Attainment</label>    
                                                <input type="text" name="attainment" class="form-control" placeholder="Note:if tertiary, indicate your course" required>   
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
                                  
                                    <div class="row">
                                        <div class="col">
                                                <form action="/profile/education/update" method="POST" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                            <label for="school">Name of your School</label>  
                                                <input type="text" name="school" class="form-control" placeholder="School" value="{{$edu->school}}" required>  
                                        </div>    
                                    </div>
                                    <div class="row">
                                            <div class="col">
                                                    <label for="level">School Level</label>
                                                    <select class="custom-select mr-sm-2" id="level" name="level" placeholder="Choose" required>
                                                        <option value="{{$edu->level}}">{{$edu->level}}</option>
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
                                            <input type="text" name="from-year" class="form-control" placeholder="Year Started" value="{{$edu->from}}" required>   
                                        </div>
                                        <div class="col">
                                                <label for="school">To</label>  
                                                <input type="text" name="to-year" class="form-control" placeholder="Year Ended" value="{{$edu->to}}" required>  
                                        </div>    
                                    </div> 
                                    <div class="row">
                                        <div class="col">
                                                <label for="attainment">Highest Attainment</label>    
                                                <input type="text" name="attainment" class="form-control" placeholder="Note:if tertiary, indicate your course" value="{{$edu->attainment}}" required>   
                                        </div>
                                      
                                    </div>  
                                   
                                           
                               
                             
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    </form>
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
                        @if(count($experience) > 0)
                        @foreach($experience as $exp)
                        @if($exp->user_id == auth()->user()->id)
                    <tr>
                        
                        <th scope="row">{{$exp->workplace}}</th>
                        <td>{{$exp->position}}</td>
                        <td>{{$exp->from}} - {{$exp->to}}</td>
                    <form action="/remove/exp" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <td> <div class="row">
                                <div class="col-lg-2">
                                    <input type="text" name="exp_id" value="{{$exp->id}}" hidden>
                                    <button type="button" class="btn btn-md" style="background-color:#7791c9; color:white" data-toggle="modal" data-target="#workmodaledit{{$exp->id}}">Edit</button>
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-md" style="background-color:#ed7777; color:white">Remove</button>
                                </div>
                            </div></td> 
                        </form>
                        
                       
                       
                      
                    </tr>
                    @endif
                    @endforeach
                    @else
                    <tr>
                        <th>No Experience</th>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#workmodal">Add Work Experience</button>
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
                                            <label for="schoolid">Office Name</label>

                                            <input type="text" name="office" class="form-control" id="schoolid" placeholder="Office Name"   required>
                                            <label for="schoolid">Position</label>

                                            <input type="text" name="position" class="form-control" id="schoolid" placeholder="Position"   required>
                                    </div>
                                       
                                        <div class="col-md-4 mb-3">
                                                <label for="fyear">From</label>
                                                <input type="text" name="from-year" class="form-control" id="year" placeholder="From" required>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="tyear">To</label>
                                                    <input type="text" name="to-year" class="form-control" id="year" placeholder="To"   required>
                                                    </div>
                                </div>
                                <label for="">Position</label>
                                <input type="text" name="position" class="form-control" id="schoolid" placeholder="Work Description"   required>
                                <label for="">Work Descriptions</label>
                                <input type="text" name="work_desc" class="form-control" id="schoolid" placeholder="Description"  required>
                       
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
                                    <form action="/profile/experience/update" method="post" enctype="multipart/form-data" >
                                        {{ csrf_field() }}
                                    <div class="form-group row">
                                        <div class="container">
                                                <input type="text" id="exp_id" name="id" value="{{$exp->id}}" hidden>
                                                <label for="schoolid">Office</label>
    
                                                <input type="text" name="office" class="form-control" id="schoolid" placeholder="Office Name" value={{$exp->workplace}}   required>
                                        </div>
                                           
                                            <div class="col-md-4 mb-3">
                                                    <label for="fyear">From</label>
                                                    <input type="text" name="from-year" class="form-control" id="year" placeholder="FROM" value={{$exp->from}}  required>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="tyear">To</label>
                                                        <input type="text" name="to-year" class="form-control" id="year" placeholder="TO"  value={{$exp->to}}  required>
                                                        </div>
                                    </div>
                                    <label for="">Position</label>
                                    <input type="text" name="pos" class="form-control" id="schoolid" placeholder="Work Description" value={{$exp->position}}   required>
                                    <label for="">Work Descriptions</label>
                                    <input type="text" name="workdesc" class="form-control" id="schoolid" placeholder="Work Description" value="{{$exp->desc_1}}"   required>
                           
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
                                    @if(count($skills) > 0)
                                    @foreach($skills as $skill)
                                    @if($skill->user_id == auth()->user()->id)
                                <tr>
                                   
                                <th>{{$skill->desc}}</th>
                                <form action="/remove/skill" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="text" name="skill_id" value="{{$exp->id}}" hidden>
                                <td><button class="btn btn-md" style="background-color:#ed7777; color:white">Remove</button></td> 
                                </form>
                                   
                                   
                               
                                </tr>
                                @endif
                                @endforeach
                                @else
                                <tr> <th>Add your skills</th></tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#skillmodal">Add Skills</button>
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
                                        <select class="custom-select mr-sm-2" id="skill " name="skill" placeholder="Choose" required>
                                                <option   disabled >Choose</option>
                                                    @foreach($category as $cat)
                                                    @if($profile->area == $cat->category)
                                                    <option value="{{$cat->skill}}">{{$cat->skill}}</option>
                                                    @endif
                                                    @endforeach
                                                  </select>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>

   
@endsection