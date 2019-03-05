<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Icamp19</title>
  <!-- Favicon -->
  <link href="{{asset('img/brand/favicon.png')}}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{asset('vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel='stylesheet' type='text/css'>
  <!-- Argon CSS -->
  <link type="text/css" href="{{asset('css/argon.css?v=1.0.0')}}" rel="stylesheet">
  
   <!-- Core -->
   <script src="{{asset('vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" rel="stylesheet">
  
  
  <link href="">
  <style type="text/css">
  	.dropdown-dash{
  		display: none;
      }
  </style>
</head>



<body>
    @if(Auth::user())

        @yield('content')
    @endif
    @yield('member')
    @yield('login')
    @yield('mailverify')
    @yield('script')
    @include('icamp19.inc.footerPage')
  
   
</html>
