<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TRABAHAKITA
           
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/css/sticky-footer.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
 
<body>
 
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">TRABAHAKITA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="/">HOME<span class="sr-only">(current)</span></a>
              @if(auth()->check())
              <li class="nav-item">
              <a class="nav-link" href="/post">Posts </a>
              {{-- <span class="badge badge-primary badge-pill">{{$post->count()}}</span> --}}
            </li>
            @if($notifcount->count() == 0)
            <a class="nav-link" href="/Notification">Notification</a>
            @else
            <li class="nav-item">
            <a class="nav-link" href="/Notification">Notification<span class="badge badge-info badge-pill">{{$notifcount->count()}}</span></a>
            </li>
            @endif
              <li class="nav-item">
                <a class="nav-link font-weight-bold" href="/employee/profile">Hi {{ auth()->user()->name }}</a>
            </li>
          
         
            <li class="nav-item">
                <a class="nav-link" href="/logout">Log Out</a>
            </li>
              @else
            
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/login">LOGIN</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/register">SIGNUP</a>
          </li>
          @endif
          </ul>
         
        </div>
      </nav>
        {{-- <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#">We Like Games</a>
             
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/games">List Games</a>
                        </li>
                        @if( auth()->check() )
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="#">Hi {{ auth()->user()->name }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Log Out</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Log In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/register">Register</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav> --}}
 
<div class="container">
    @yield('content')
</div>
 
<footer class="footer">
    <div class="container">
        <span class="text-muted">TRABAHAKITA.COM</span>
    </div>
</footer>
 

<script src="/js/tether.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>