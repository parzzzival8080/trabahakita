@extends('layouts.app')
@section('content')
<div class="container">
        <img class="card-img-top" src="{{ Storage::url($profile->image)  }}" alt="Card image cap">
<H1>{{$profile->company_name}}</H1>
<H3> Location:{{$profile->company_rep}}</H3>
<H3> Email:{{$profile->email}}</H3>
<H3> Representative:{{$profile->company_rep}}</H3>

</div>
    <div class="container">
            <h3>
                    POSTS
                    </h3>
            @if (count($post) > 0)
            @foreach ($post as $posts)
          @if($posts->company_id == $profile->id)
            <div class="container" style="margin-top:20px;">
            <div class="card">
                <div class="container">
                    <h4>Job Title:{{$posts->Title}}</h4>
                    <h4>Job Description:</h4>
                    <h5>     
                        {{$posts->description}}
                    </h5>
                    <div class="form-group row">
                        <div class="offset-sm-3 col-sm-9">
                            <button class="btn btn-primary"><a href="/post/show/{{$posts->id}}" style="color:white">Check it Out</a></button>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
      @endif
        @endforeach
        @endif
    </div>
@endsection