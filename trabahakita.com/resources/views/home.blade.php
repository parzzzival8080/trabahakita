@extends('layouts.app')
@section('content') 
@if(auth()->check())
<div class="row" style="padding:1em">
        <div class="col">
                <img src={{ asset('storage/images/maps.jpg') }} class="rounded mx-auto d-block"/>
        </div>
        
        <div class="col" style="margin-top:3em;">
          
            <h1 style="font-family:Century Gothic; font-weight: 300; ">WHAT DO YOU WANT TO DO?</h1>
            <button class="btn btn-info round">Scan for nearby applications</button>
                
        </div>
    </div>  
   
</div>
@endif

@endsection