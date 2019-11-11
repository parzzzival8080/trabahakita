@extends('layouts.app')
@section('content')
<div class="container">
        <div class="d-flex justify-content-center"> 
                <img class="card-img-top" style="height:400px;width:300px;" src="{{ Storage::url($profile->image)  }}" alt="Card image cap">
                </div>
                <h3>                   
                    {{$profile->last_name}},{{$profile->first_name}} {{$profile->middle_name}}
                </h3>
                <h5>
                    "{{$profile->title}}"
                </h5>
                <h5>
                        School:{{$profile->school}}
                        
                    </h5>
                    <h5>
                            Degree:{{$profile->degree}}
                        </h5>
                        <h5>
                                About:{{$profile->description}}
                            </h5>
                        
                         <div class="row">
                             <div class="col-sm">
                                <form action="/post/pdf" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <input type="text" name="id" value="{{$profile->id}}" hidden>
                                    <button type="submit" class="btn btn-primary">Download Resume</button>
                                   
                                </form>
                             </div>

                             <div class="col-sm">
                                <button class="btn btn-info" data-toggle="modal" data-target="#modalAppointment">Set Appointment</button>
                                <button class="btn btn-success" data-toggle="modal" data-target="#modalHire">Hire</button>
                             </div>
                         </div>
                           
                         
                         
                            
                            <!-- Button trigger modal -->

      
      <!-- Modal for appointment -->
      <div class="modal fade" id="modalAppointment" tabindex="-1" role="dialog" aria-labelledby="modalapplabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalapplabel">Set Desired Appointment</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="/setAppointment" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                              <div class="container">
                                    <div class="form-group row">
                                    <input type="text" name="id" value="{{$profile->id}}"  hidden>
                                    <input type="text" name="name"  value="{{$profile->first_name}} {{$profile->last_name}}"  hidden>
                                </div>  
                               
                                    <label>For:{{$profile->first_name}} {{$profile->last_name}}</label>
                                    <div class="form-group row">
                                            <label for="tyear">Date</label>  
                                    </div>
                                    <div class="form-group row">
                                            <input id="datepicker" width="276" required name="date"/>
                                    </div>
                                    <div class="form-group row">
                                            <script>
                                                $('#datepicker').datepicker({
                                                    uiLibrary: 'bootstrap4'
                                                });
                                            </script>
                                    </div>
                                    <div class="form-group row">
                                            <label for="tyear">Time</label>  
                                    </div>
                                    <div class="form-group row">
                                        <input id="timepicker" width="276" name="time" required/>
                                        <script>
                                            $('#timepicker').timepicker();
                                        </script>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tyear">Message</label>
                                        <textarea type="text" name="message" class="form-control" id="mesid" placeholder=" " rows="3" required></textarea>
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

      <!-- Modal for Hiring-->
      <div class="modal fade" id="modalHire" tabindex="-1" role="dialog" aria-labelledby="modalapplabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalapplabel">Hire this guy?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="/Appointment/hire" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                              <div class="container">
                                    <div class="form-group row">
                                    <input type="text" name="id" value="{{$profile->id}}"  hidden>
                                    <input type="text" name="name"  value="{{$profile->first_name}} {{$profile->last_name}}"  hidden>
                                </div>  
                               
                                    <div class="form-group row">
                                        <label for="tyear">Message</label>
                                        <textarea type="text" name="message" class="form-control" id="mesid" placeholder=" " rows="3" required></textarea>
                                    </div> 
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       
                        <button type="submit" class="btn btn-primary">Hire</button>
                </form>
            </div>
            <div class="modal-footer">
             
            </div>
          </div>
        </div>
      </div>
                             
                            
                            
                           
</div>
@endsection