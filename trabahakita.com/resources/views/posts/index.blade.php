@extends('layouts.app')
@section('content')
<h3>Posts</h3>
@if(count($posts) > 1)
    @foreach($posts as $post)
    <div class="card">
            <h5>
                    <a href="/posts/{{$post->id}}"> {{$post->title}}</a>
                    <div>

                        {{$post->body}}
                    </div>
                    </h5>
                <h6>{{$post->created_at}}</h6>
    </div>
    @endforeach
@else
    <h1>There are no posts</h1>
@endif
@endsection