@extends('layouts.app')
@section('content')
        <div class="container">
           <h1>YOU ARE A/AN?</h1>
           <div class="row">
                   <div class="col">
                <img src="../img/employee.png" alt="">
                       <button style="button" class="btn btn-primary"><a style="color:white" href="/register">EMPLOYEE</a></button>
                   </div>
                   <div class="col">
                           <button style="button" class="btn btn-primary"><a style="color:white" href="/register">COMPANY</a></button>
                   </div>
           </div>
        </div>
@endsection