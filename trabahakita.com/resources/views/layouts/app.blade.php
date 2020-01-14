<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TRABAHAKITA
           
    </title>
    {{-- bootstrap normal --}}
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/css/sticky-footer.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> --}}

    {{-- mdbootstrap --}}
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

{{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<link rel="stylesheet" href="node_modules/mdbootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="node_modules/mdbootstrap/css/mdb.min.css">
<link rel="stylesheet" href="node_modules/mdbootstrap/css/style.css"> --}}

 
<body>
 
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-4">
        <a class="navbar-brand" href="/"> <span style="color:#e8505b">TRABAHA</span><span data-aos="fade-right" data-aos-delay="500">KITA</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
            
              @if(auth()->check())
              <li>
              <img class="nav-item mt-1" src="{{auth()->user()->image}}" style="width:30px; border-radius:50%; " alt="">
              </li>
              @if(auth()->user()->type == 'employee')
              <li class="nav-item"><a class="nav-link" href="/seeker/profile">
                {{auth()->user()->name}}    
              </a></li>
              @elseif(auth()->user()->type == 'company')
              <li class="nav-item"><a class="nav-link" href="/employee/profile">
                {{auth()->user()->name}}    
              </a></li>
              @endif
              @if(auth()->user()->type == 'employee')
              <a class="nav-link" href="/seeker/maps"><span class="sr-only">(current)</span>Find Jobs Near Me</a>
              @else
              <a class="nav-link" href="/"><span class="sr-only">(current)</span>Home</a>
              @endif
             
              <li class="nav-item">
              {{-- <a class="nav-link" href="/post">Job Posts</a> --}}
              {{-- <span class="badge badge-primary badge-pill">{{$post->count()}}</span> --}}
            </li>
            @if(auth()->user()->type == 'company')
            <a class="nav-link" href="/company/profiles">Find Employee</a>
            @elseif(auth()->user()->type == 'employee')
            {{-- <a class="nav-link" href="/company/profiles">Find Employer</a> --}}
            <a class="nav-link" href="/seeker/profile">My Profile</a>
            @endif
            <a class="nav-link" href="/Notification">Notification<span class="badge badge-info badge-pill">{{$notifcount->count()}}</span>
            
            </a>
            
            <a class="nav-link" href="/logout">Logout</a>
             
          {{-- <li class="nav-item dropdown">     
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if(auth()->user()->type == 'employee')
           
            @endif
          <a class="dropdown-item" href="/employee/profile">Edit Profile</a>
          <a class="dropdown-item"  href="/Notification">Job Applications<span class="badge badge-info badge-pill">{{$notifcount->count()}}</span></a>
        </div>
        
      </li> --}}
   
           
              @else
            
        </li>
        <li class="nav-item">
                <a class="nav-link" href="/register">SIGNUP</a>
         
        </li>
        <li class="nav-item">
                <a class="nav-link" href="/login">LOGIN</a>
          </li>
          @endif
          </ul>
         
        </div>
      </nav>
       
 
<div class="container">
    @yield('content')
    @include('layouts.messages')
</div>
<!-- Footer -->
@if(auth()->check())
<footer class="page-footer font-small blue pt-4 bg-dark mt-5 " >

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase">TRABAHAKITA.COM</h5>
        <p>We give you a Free Job Fair, Everyday!</p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Tags for Work!</h5>

        <div class="row">
          <div class="col">
            <ul class="list-unstyled">
              <li>
                <a href="#!">Accounting & Consulting</a>
              </li>
              <li>
                <a href="#!">Admin Support</a>
              </li>
              <li>
                <a href="#!">Customer Service</a>
              </li>
              <li>
                <a href="#!">Data Science & Analytics</a>
              </li>
              <li>
                <a href="#!">Design & Creative</a>
              </li>
            </ul>
          </div>
          <div class="col">
            <ul class="list-unstyled">
              <li>
                <a href="#!">Engineering & Architecture</a>
              </li>
              <li>
                <a href="#!">IT & Engineering</a>
              </li>
              <li>
                <a href="#!">Legal</a>
              </li>
              <li>
                <a href="#!">Translation</a>
              </li>
              <li>
                <a href="#!">Web, Mobile & Software Development</a>
              </li>
            </ul>
          </div>
        </div>
      
      

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Tips and Tricks</h5>

        <ul class="list-unstyled">
          <li>
            <a href="/tips">Your First Job Interview!</a>
          </li>
          <li>
            {{-- <a href="#!">Thing</a>
          </li>
          <li>
            <a href="#!">Link 4</a>
          </li> --}}
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="https://mdbootstrap.com/education/bootstrap/"> Trabahakita.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
@else
<footer class="page-footer font-small blue pt-4 bg-dark " >

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase">TRABAHAKITA.COM</h5>
        <p>We give you a Free Job Fair, Everyday!</p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Tags for Work!</h5>
<div class="row">
  <div class="col">
    <ul class="list-unstyled">
      <li>
        <a href="#!">Accounting & Consulting</a>
      </li>
      <li>
        <a href="#!">Admin Support</a>
      </li>
      <li>
        <a href="#!">Customer Service</a>
      </li>
      <li>
        <a href="#!">Data Science & Analytics</a>
      </li>
      <li>
        <a href="#!">Design & Creative</a>
      </li>
    </ul>
  </div>
  <div class="col">
    <ul class="list-unstyled">
      <li>
        <a href="#!">Engineering & Architecture</a>
      </li>
      <li>
        <a href="#!">IT & Engineering</a>
      </li>
      <li>
        <a href="#!">Legal</a>
      </li>
      <li>
        <a href="#!">Translation</a>
      </li>
      <li>
        <a href="/tips">Web, Mobile & Software Development</a>
      </li>
    </ul>
  </div>
</div>
      
      

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Tips and Tricks</h5>

        <ul class="list-unstyled">
          <li>
            <a href="/tips">Your First Job Interview!</a>
          </li>
          <li>
            <a href="#!">Playlist of a nervous applicant</a>
          </li>
          <li>
            {{-- <a href="#!">Thing</a>
          </li>
          <li>
            <a href="#!">Link 4</a>
          </li> --}}
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="/home"> Trabahakita.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
@endif
 

 
{{-- normal bootstrap --}}
{{-- <script src="/js/tether.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}

{{-- mdbootstrap --}}

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/js/mdb.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
  AOS.init();
</script>

</body>
</html>