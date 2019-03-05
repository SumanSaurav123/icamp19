@extends('icamp19.layout.mainLayout')
@section('mailverify')
<div class="main-content bg-default">
        <!-- Navbar -->
        <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
            <div class="container px-4">
                <a class="navbar-brand" href="../index.html">
                    <img src="{{asset('img/brand/white.png')}}" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-collapse-main">
                    <!-- Collapse header -->
                    <div class="navbar-collapse-header d-md-none">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <a href="../index.html">
                                    <img src="{{asset('img/brand/blue.png')}}">
                                </a>
                            </div>
                            <div class="col-6 collapse-close">
                                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main"
                                    aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Navbar items -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="/register">
                                <i class="ni ni-circle-08"></i>
                                <span class="nav-link-inner--text">Register</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="/login">
                                <i class="ni ni-key-25"></i>
                                <span class="nav-link-inner--text">Login</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->
        <div class="header bg-gradient-primary py-7 py-lg-8">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-6">
                            <h1 class="text-white">Password Reset</h1>
                            <p class="text-lead text-light"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <small>Please enter new password below</small>
                            </div>
                            
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-inner--text"><strong>Congratulation! </strong> {{ session('success') }}</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if($emsg!=null) 
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-inner--text"><strong>Warning! </strong> {{ $emsg }}</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @else
                            @if($token!=' ') 
                            {!! Form::open( ['action' => 'candidateController@resetPassword', 'method' => 'POST','enctype' => 'multipart/form-data','id' => 'myFormForget'] ) !!}
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input id="password" name="password" class="form-control" placeholder="new password" type="password" required> 
                                    </div>
                                </div>
                                <div id="passwordins"></div>
                                @if(($errors)->has('password')) 
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <span class="alert-inner--text">
                                        @foreach ($errors->get('password') as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                        </span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input name="cpassword" class="form-control" placeholder="confrim password" type="password" required> 
                                    </div>
                                </div>
                                <input type="hidden" value="{{ $token }}" name="token">
                                @if(($errors)->has('cpassword')) 
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <span class="alert-inner--text">
                                        @foreach ($errors->get('cpassword') as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                        </span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <div class="text-center">
                                    <input type="submit" value="Change Password" class="btn btn-primary my-4"></button>
                                </div>
                            {!! Form::hidden('_method','POST') !!}
                            {!! Form::close() !!}
                            @endif
                            @endif 
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
  <script>
      
        $('#password').focus(function() {
            $('#passwordins').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><span class="alert-inner--text"><li>Your password must contain <b>lowercase and uppercase letter</b></li><li>Your password must contain <b>number and special characters</b></li><li>Your password must contain at least 6 characters.</li></span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>').fadeIn();
       })
       $('#password').focusout(function() {
            $('#passwordins').fadeOut();
       })     
  </script>
@endsection