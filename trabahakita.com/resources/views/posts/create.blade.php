@extends('layouts.app')
 
@section('content')
 
    <h2>CREATE YOUR POST</h2>
    <div class="card">
        <div class="container" style="padding:20px;">
            
            <form method="POST" action="/post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            <input name="title" type="text" class="form-control" id="title" placeholder="title" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Description" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <input name="description" type="text" class="form-control" id="description"
                                   placeholder="Job Description" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-primary">Post Job</button>
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