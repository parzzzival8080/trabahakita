@extends('layouts.app')
 
@section('content')
 
    <h2>CREATE YOUR POST</h2>
    <div class="card">
        <div class="container" style="padding:20px;">
            
            <form method="POST" action="/post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label">Position</label>
                        <div class="col-sm-9">
                            <input name="title" type="text" class="form-control" id="title" placeholder="Position" required>
                        </div>
                    </div>
                    <div class="form-group row">
                            <label for="empid" class="col-sm-3 col-form-label">Job Type</label>
                            <div class="col-sm-9">
                                    <select class="custom-select mr-sm-2" id="type" name="type">
                                            <option   selected>Choose...</option>
                                            <option value="Full Time">Full Time</option>
                                            <option value="Term">Term</option>
                                            <option value="Project">Project</option>
                                            <option value="Seasonal">Seasonal</option>
                                            <option value="Casual">Casual</option>
                                          </select>
                            </div>
                        </div>
                   
                   
                    <div class="form-group row">
                            <label for="salary" class="col-sm-3 col-form-label">Tentative Salary</label>
                            <div class="col-sm-9">
                                <input name="salary" type="text" class="form-control" id="salary"
                                       placeholder="Tentative Salary" required>
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="desc" class="col-sm-3 col-form-label">DESCRIPTION OF YOURSELF</label>
                            <div class="col-sm-9">
                                <textarea name="description" type="text" class="form-control" id="desc" rows="5"
                                       placeholder="DESCRIPTION" ></textarea>
                            </div>
                    </div>
                    
                           
                    <div class="form-group row">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-primary">Post Job</button>
                        </div>
                    </div>
                </div>
                </form>

                
        </div>
    </div>
    @if(count($errors))
    <div class="form-group">
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
 
@endsection