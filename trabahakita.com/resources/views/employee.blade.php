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
                            <button class="btn btn-success">Download Resume</button>
</div>
@endsection