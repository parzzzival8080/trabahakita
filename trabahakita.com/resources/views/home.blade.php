@extends('layouts.app')
@section('content') 
@if(auth()->check())

@if(auth()->user()->type == 'employee')
{{-- <div class="row" style="padding:1em">
        <div class="col">
                <img src={{ asset('storage/images/maps.jpg') }} class="rounded mx-auto d-block"/>
        </div>
        
        <div class="col" style="margin-top:3em;">
          
            <h1 style="font-family:Century Gothic; font-weight: 300; ">WHAT DO YOU WANT TO DO?</h1>
            <button class="btn btn-info round">Scan for nearby applications</button>
                
        </div>
    </div>  --}}
    <div class="container" style="margin-top:5px">
        <h1>Bulletin Board</h1>
            <div class="row" style="margin-top:5px">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                    <div class="card-title"><h3>Computers and Technology</h3><hr></div> 
                                    @if(count($post_field_1) > 0)
                                    <div class="row">
                                        <div class="col">
                                            <h4>Company</h4>
                                        </div>
                                        <div class="col">
                                                <h4>Position</h4>
                                            </div>
                                            <div class="col">
                                                    
                                                </div>
                                    </div>
                                    <div class="card-text">
                                        @foreach($post_field_1 as $post)
                                           

                                            <div class="row" style="padding-bottom:5px">
                                                <div class="col">
                                                    {{$post->company_name}}
                                                </div>
                                                <div class="col">
                                                        {{$post->Title}}
                                                </div>
                                                <div class="col">
                                                <button class="btn btn-info"><a  href="/post/show/{{$post->id}}" style="color:white">View Details</a></button>
                                                </div>
                                            </div>
                                           
                                        @endforeach
                                       
                                    </div>
                                    <div class="card-footer">    
                                            <div class="row">
                                                <div class="col"></div>
                                                <div class="col"></div>
                                                <div class="col" style="padding-right:5px;">
                                                    <button class="btn btn-secondary">view more</button>
                                                </div>
                                            </div> 
                                    </div>
                                    @else
                                    <h3>There's no job posting for this field</h3>
                                    @endif
                            </div>
                            
                        </div>    
                    </div>
                    <div class="col">
                            <div class="card">
                                <div class="card-body">
                                        <div class="card-title"><h3>Health Care and Allied Health</h3><hr></div> 
                                        @if(count($post_field_2) > 0)
                                        <div class="row">
                                            <div class="col">
                                                <h4>Company</h4>
                                            </div>
                                            <div class="col">
                                                    <h4>Position</h4>
                                                </div>
                                                <div class="col">
                                                        
                                                    </div>
                                        </div>
                                        <div class="card-text">
                                            @foreach($post_field_2 as $post)
                                               
    
                                                <div class="row" style="padding-bottom:5px">
                                                    <div class="col">
                                                        {{$post->company_name}}
                                                    </div>
                                                    <div class="col">
                                                            {{$post->Title}}
                                                    </div>
                                                    <div class="col">
                                                    <button class="btn btn-info"><a  href="/post/show/{{$post->id}}" style="color:white">View Details</a></button>
                                                    </div>
                                                </div>
                                               
                                            @endforeach
                                           
                                        </div>
                                        <div class="card-footer">    
                                                <div class="row">
                                                    <div class="col"></div>
                                                    <div class="col"></div>
                                                    <div class="col" style="padding-right:5px;">
                                                        <button class="btn btn-secondary">view more</button>
                                                    </div>
                                                </div> 
                                        </div>
                                        @else
                                        <h3>There's no job posting for this field</h3>
                                        @endif
                                </div>
                                
                            </div>    
                        </div>    
                </div> 
                <div class="row" style="margin-top:5px">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                        <div class="card-title"><h3>Education and Social Services</h3><hr></div> 
                                        @if(count($post_field_3) > 0)
                                        <div class="row">
                                            <div class="col">
                                                <h4>Company</h4>
                                            </div>
                                            <div class="col">
                                                    <h4>Position</h4>
                                                </div>
                                                <div class="col">
                                                        
                                                    </div>
                                        </div>
                                        <div class="card-text">
                                            @foreach($post_field_3 as $post)
                                               
    
                                                <div class="row" style="padding-bottom:5px">
                                                    <div class="col">
                                                        {{$post->company_name}}
                                                    </div>
                                                    <div class="col">
                                                            {{$post->Title}}
                                                    </div>
                                                    <div class="col">
                                                    <button class="btn btn-info"><a  href="/post/show/{{$post->id}}" style="color:white">View Details</a></button>
                                                    </div>
                                                </div>
                                               
                                            @endforeach
                                           
                                        </div>
                                        <div class="card-footer">    
                                                <div class="row">
                                                    <div class="col"></div>
                                                    <div class="col"></div>
                                                    <div class="col" style="padding-right:5px;">
                                                        <button class="btn btn-secondary">view more</button>
                                                    </div>
                                                </div> 
                                        </div>
                                        @else
                                        <h3>There's no job posting for this field</h3>
                                        @endif
                                </div>
                                
                            </div>    
                        </div>
                        <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                            <div class="card-title"><h3>Arts and Communications</h3><hr></div> 
                                            @if(count($post_field_4) > 0)
                                            <div class="row">
                                                <div class="col">
                                                    <h4>Company</h4>
                                                </div>
                                                <div class="col">
                                                        <h4>Position</h4>
                                                    </div>
                                                    <div class="col">
                                                            
                                                        </div>
                                            </div>
                                            <div class="card-text">
                                                @foreach($post_field_4 as $post)
                                                   
        
                                                    <div class="row" style="padding-bottom:5px">
                                                        <div class="col">
                                                            {{$post->company_name}}
                                                        </div>
                                                        <div class="col">
                                                                {{$post->Title}}
                                                        </div>
                                                        <div class="col">
                                                        <button class="btn btn-info"><a  href="/post/show/{{$post->id}}" style="color:white">View Details</a></button>
                                                        </div>
                                                    </div>
                                                   
                                                @endforeach
                                               
                                            </div>
                                            <div class="card-footer">    
                                                    <div class="row">
                                                        <div class="col"></div>
                                                        <div class="col"></div>
                                                        <div class="col" style="padding-right:5px;">
                                                            <button class="btn btn-secondary">view more</button>
                                                        </div>
                                                    </div> 
                                            </div>
                                            @else
                                            <h3>There's no job posting for this field</h3>
                                            @endif
                                    </div>
                                    
                                </div>    
                            </div>    
                    
                
                    </div> 
                        <div class="row" style="margin-top:5px">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                        <div class="card-title"><h3> Trades and Transportation</h3><hr></div> 
                                        @if(count($post_field_5) > 0)
                                        <div class="row">
                                            <div class="col">
                                                <h4>Company</h4>
                                            </div>
                                            <div class="col">
                                                    <h4>Position</h4>
                                                </div>
                                                <div class="col">
                                                        
                                                    </div>
                                        </div>
                                        <div class="card-text">
                                            @foreach($post_field_5 as $post)
                                               
    
                                                <div class="row" style="padding-bottom:5px">
                                                    <div class="col">
                                                        {{$post->company_name}}
                                                    </div>
                                                    <div class="col">
                                                            {{$post->Title}}
                                                    </div>
                                                    <div class="col">
                                                    <button class="btn btn-info"><a  href="/post/show/{{$post->id}}" style="color:white">View Details</a></button>
                                                    </div>
                                                </div>
                                               
                                            @endforeach
                                           
                                        </div>
                                        <div class="card-footer">    
                                                <div class="row">
                                                    <div class="col"></div>
                                                    <div class="col"></div>
                                                    <div class="col" style="padding-right:5px;">
                                                        <button class="btn btn-secondary">view more</button>
                                                    </div>
                                                </div> 
                                        </div>
                                        @else
                                        <h3>There's no job posting for this field</h3>
                                        @endif
                                </div>
                                
                            </div>    
                        </div>
                        <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                            <div class="card-title"><h3>Management, Business, and Finance</h3><hr></div> 
                                            @if(count($post_field_6) > 0)
                                            <div class="row">
                                                <div class="col">
                                                    <h4>Company</h4>
                                                </div>
                                                <div class="col">
                                                        <h4>Position</h4>
                                                    </div>
                                                    <div class="col">
                                                            
                                                        </div>
                                            </div>
                                            <div class="card-text">
                                                @foreach($post_field_6 as $post)
                                                   
        
                                                    <div class="row" style="padding-bottom:5px">
                                                        <div class="col">
                                                            {{$post->company_name}}
                                                        </div>
                                                        <div class="col">
                                                                {{$post->Title}}
                                                        </div>
                                                        <div class="col">
                                                        <button class="btn btn-info"><a  href="/post/show/{{$post->id}}" style="color:white">View Details</a></button>
                                                        </div>
                                                    </div>
                                                   
                                                @endforeach
                                               
                                            </div>
                                            <div class="card-footer">    
                                                    <div class="row">
                                                        <div class="col"></div>
                                                        <div class="col"></div>
                                                        <div class="col" style="padding-right:5px;">
                                                            <button class="btn btn-secondary">view more</button>
                                                        </div>
                                                    </div> 
                                            </div>
                                            @else
                                            <h3>There's no job posting for this field</h3>
                                            @endif
                                    </div>
                                    
                                </div>    
                            </div>    
                    
                
                    </div> 
                    <div class="row" style="margin-top:5px">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                            <div class="card-title"><h3>Architecture and Civil Engineering</h3><hr></div> 
                                            @if(count($post_field_7) > 0)
                                            <div class="row">
                                                <div class="col">
                                                    <h4>Company</h4>
                                                </div>
                                                <div class="col">
                                                        <h4>Position</h4>
                                                    </div>
                                                    <div class="col">
                                                            
                                                        </div>
                                            </div>
                                            <div class="card-text">
                                                @foreach($post_field_7 as $post)
                                                   
        
                                                    <div class="row" style="padding-bottom:5px">
                                                        <div class="col">
                                                            {{$post->company_name}}
                                                        </div>
                                                        <div class="col">
                                                                {{$post->Title}}
                                                        </div>
                                                        <div class="col">
                                                        <button class="btn btn-info"><a  href="/post/show/{{$post->id}}" style="color:white">View Details</a></button>
                                                        </div>
                                                    </div>
                                                   
                                                @endforeach
                                               
                                            </div>
                                            <div class="card-footer">    
                                                    <div class="row">
                                                        <div class="col"></div>
                                                        <div class="col"></div>
                                                        <div class="col" style="padding-right:5px;">
                                                            <button class="btn btn-secondary">view more</button>
                                                        </div>
                                                    </div> 
                                            </div>
                                            @else
                                            <h3>There's no job posting for this field</h3>
                                            @endif
                                    </div>
                                    
                                </div>    
                            </div>
                            <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                                <div class="card-title"><h3>Science</h3><hr></div> 
                                                @if(count($post_field_8) > 0)
                                                <div class="row">
                                                    <div class="col">
                                                        <h4>Company</h4>
                                                    </div>
                                                    <div class="col">
                                                            <h4>Position</h4>
                                                        </div>
                                                        <div class="col">
                                                                
                                                            </div>
                                                </div>
                                                <div class="card-text">
                                                    @foreach($post_field_8 as $post)
                                                       
            
                                                        <div class="row" style="padding-bottom:5px">
                                                            <div class="col">
                                                                {{$post->company_name}}
                                                            </div>
                                                            <div class="col">
                                                                    {{$post->Title}}
                                                            </div>
                                                            <div class="col">
                                                            <button class="btn btn-info"><a  href="/post/show/{{$post->id}}" style="color:white">View Details</a></button>
                                                            </div>
                                                        </div>
                                                       
                                                    @endforeach
                                                   
                                                </div>
                                                <div class="card-footer">    
                                                        <div class="row">
                                                            <div class="col"></div>
                                                            <div class="col"></div>
                                                            <div class="col" style="padding-right:5px;">
                                                                <button class="btn btn-secondary">view more</button>
                                                            </div>
                                                        </div> 
                                                </div>
                                                @else
                                                <h3>There's no job posting for this field</h3>
                                                @endif
                                        </div>
                                        
                                    </div>    
                                </div>    
                        
                    
                        </div> 
                        <div class="row" style="margin-top:5px">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                                <div class="card-title"><h5>Hospitality, Tourism, and the Service Industry</h5><hr></div> 
                                                @if(count($post_field_9) > 0)
                                                <div class="row">
                                                    <div class="col">
                                                        <h4>Company</h4>
                                                    </div>
                                                    <div class="col">
                                                            <h4>Position</h4>
                                                        </div>
                                                        <div class="col">
                                                                
                                                            </div>
                                                </div>
                                                <div class="card-text">
                                                    @foreach($post_field_9 as $post)
                                                       
            
                                                        <div class="row" style="padding-bottom:5px">
                                                            <div class="col">
                                                                {{$post->company_name}}
                                                            </div>
                                                            <div class="col">
                                                                    {{$post->Title}}
                                                            </div>
                                                            <div class="col">
                                                            <button class="btn btn-info"><a  href="/post/show/{{$post->id}}" style="color:white">View Details</a></button>
                                                            </div>
                                                        </div>
                                                       
                                                    @endforeach
                                                   
                                                </div>
                                                <div class="card-footer">    
                                                        <div class="row">
                                                            <div class="col"></div>
                                                            <div class="col"></div>
                                                            <div class="col" style="padding-right:5px;">
                                                                <button class="btn btn-secondary">view more</button>
                                                            </div>
                                                        </div> 
                                                </div>
                                                @else
                                                <h3>There's no job posting for this field</h3>
                                                @endif
                                        </div>
                                        
                                    </div>    
                                </div>
                                <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                    <div class="card-title"><h3>Law and Law Enforcement</h3><hr></div> 
                                                    @if(count($post_field_10) > 0)
                                                    <div class="row">
                                                        <div class="col">
                                                            <h4>Company</h4>
                                                        </div>
                                                        <div class="col">
                                                                <h4>Position</h4>
                                                            </div>
                                                            <div class="col">
                                                                    
                                                                </div>
                                                    </div>
                                                    <div class="card-text">
                                                        @foreach($post_field_10 as $post)
                                                           
                
                                                            <div class="row" style="padding-bottom:5px">
                                                                <div class="col">
                                                                    {{$post->company_name}}
                                                                </div>
                                                                <div class="col">
                                                                        {{$post->Title}}
                                                                </div>
                                                                <div class="col">
                                                                <button class="btn btn-info"><a  href="/post/show/{{$post->id}}" style="color:white">View Details</a></button>
                                                                </div>
                                                            </div>
                                                           
                                                        @endforeach
                                                       
                                                    </div>
                                                    <div class="card-footer">    
                                                            <div class="row">
                                                                <div class="col"></div>
                                                                <div class="col"></div>
                                                                <div class="col" style="padding-right:5px;">
                                                                    <button class="btn btn-secondary">view more</button>
                                                                </div>
                                                            </div> 
                                                    </div>
                                                    @else
                                                    <h3>There's no job posting for this field</h3>
                                                    @endif
                                            </div>
                                            
                                        </div>    
                                    </div>    
                            
                        
                            </div> 
                    
            
               
@elseif(auth()->user()->type == 'company')
    <h1>Test</h1>
   @endif


@else 
<h1 style="font-family:san-serif;font-weight:300;font-size:3em">TRABAHAKITA.COM</h1>
@endif

@endsection