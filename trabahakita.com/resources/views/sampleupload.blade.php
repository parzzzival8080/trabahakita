@extends('layouts.app')
@section('content')
<body>

    <div class="container" style="margin-top: 100px;">
       <div class="row">
           <h4 class="text-center">
               Upload Images
           </h4>
    
           <div class="row">

            <img src='http://res.cloudinary.com/dntfm4ivf/image/upload/c_fit,h_720,w_960/e0styl0gj7jm9iekxggm.png' class="img-fluid"  alt="">
               <div id="formWrapper" class="col-md-4 col-md-offset-4">
                   <form class="form-vertical" role="form" enctype="multipart/form-data" method="post" action="{{ route('uploadImage')  }}">
                       {{csrf_field()}}
                       @if(session()->has('status'))
                           <div class="alert alert-info" role="alert">
                               {{session()->get('status')}}
                           </div>
                       @endif
                       <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                           <input type="file" name="image_name" class="form-control" id="name" value="">
                           @if($errors->has('image_name'))
                               <span class="help-block">{{ $errors->first('image_name') }}</span>
                           @endif
                       </div>
    
                       <div class="form-group">
                           <button type="submit" class="btn btn-success">Upload Image </button>
                       </div>
                   </form>
    
               </div>
           </div>
       </div>
    </div>
    </body>
@endsection