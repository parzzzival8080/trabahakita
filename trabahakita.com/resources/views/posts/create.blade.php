@extends('layouts.app')
 
@section('content')
 
    <h2 class="mt-5">CREATE YOUR POST</h2>
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
                            <label for="empid" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                            <select class="custom-select mr-sm-2" id="type" name="type">
                                            <option   selected>Choose...</option>
                                            <option value="Full Time">Full Time</option>
                                            <option value="Part-time">Part-time</option>
                                            <option value="Project">Project</option>
                                            <option value="Casual">Casual</option>
                                          </select>
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="empid" class="col-sm-3 col-form-label">Field</label>
                                <div class="col-sm-9">
                                    <select class="custom-select mr-sm-2" id="field" name="field" placeholder="Choose" required>
                                        <option   disabled >Choose</option>
                                            <option value="Accounting & Consulting">Accounting & Consulting</option>
                                            <option value="Admin Support">Admin Support</option>
                                            <option value="Customer Service">Customer Service</option>
                                            <option value="Data Science & Analytics">Data Science & Analytics</option>
                                            <option value="Design & Creative">Design & Creative</option>
                                            <option value="Engineering & Architecture">Engineering & Architecture</option>
                                            <option value="IT & Engineering">IT & Engineering</option>
                                            <option value="Legal">Legal</option>
                                            <option value="Translation">Translation</option>
                                            <option value="Web, Mobile & Software Development">Web, Mobile & Software Development</option>
                                          </select>
                                </div>
                            </div>
                        <div class="form-group row">
                                <label for="person" class="col-sm-3 col-form-label">People Needed</label>
                                <div class="col-sm-9">
                                    <input name="per_num" type="text" class="form-control" id="person"
                                           placeholder="Input Number" required>
                                </div>
                        </div>
                   
                    <div class="form-group row">
                            <label for="salary" class="col-sm-3 col-form-label">Tentative Salary</label>
                            <div class="col-sm-9">
                                <input name="salary" type="text" class="form-control" id="salary"
                                       placeholder="Ex: 20000" required>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label for="salary" class="col-sm-3 col-form-label">Experience Needed</label>
                        <div class="col">
                            <input name="experience" min="0" type="text" class="form-control" id="salary"
                                   placeholder="Format Example: 1 Year or more|"  required>
                        </div>
                        
                </div>
                    <div class="form-group row">
                            <label for="desc" class="col-sm-3 col-form-label">DESCRIPTION</label>
                            <div class="col-sm-9">
                                <textarea name="description" type="text" class="form-control" id="desc" rows="5"
                                       placeholder="DESCRIPTION" ></textarea>
                            </div>
                    </div> 
                    <div class="form-group row">
                        <div class="offset-sm-3 col-sm-9">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Post Job</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>

                
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