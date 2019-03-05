@extends('icamp19.layout.mainLayout')
@section('member')
<!-- Sidenav -->
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="/member/dashboard">
        <img src="{{asset('img/brand/blue.png')}}" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="{{asset('img/theme/team-1-800x800.jpg')}}">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="/member/logout" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="/member/dashboard">
                <img src="{{asset('img/brand/blue.png')}}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        
        <!-- Navigation -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/member/idcard">
                  <i class="ni ni-shop text-orange"></i>Icard Distribution
                </a>
              </li>
        </ul>
               <!-- Divider -->
               <hr class="my-3">
               <!-- Heading -->
               <h6 class="navbar-heading text-muted">Navigate</h6>
               <!-- Navigation -->
               <ul class="navbar-nav mb-md-3">
                 <li class="nav-item">
                   <a class="nav-link" href="#">
                     <i class="ni ni-spaceship"></i> Esummit home page
                   </a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" href="https://ecell.org.in/">
                     <i class="ni ni-support-16"></i> KIIT E-Cell
                   </a>
                 </li>
                 <li class="nav-item">
                  <a class="nav-link" href="https://ecell.org.in/">
                    <i class="ni ni-support-16"></i> About KIIT and KISS
                  </a>
                </li>
                 
               </ul>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="/member/dashboard">Profile</a>
        <!-- Form -->
        
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="{{asset('img/theme/team-4-800x800.jpg')}}">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">Jessica Jones</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <!-- <a href="./pages/profile.html" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="./pages/profile.html" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span> -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="/member/logout" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
            
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
        <div class="row mt-5">
        </div>

	 <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-10 col-md-10">
          <div class="card bg-secondary shadow border-0">
            <div class="card-header bg-transparent pb-5">
              
            <div class="card-body px-lg-5 py-lg-5">
            @if(session('success')) 
                <div style="margin-top:10px;" class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-inner--text"><strong>Congratulation! </strong> {{ session('success')}}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif  
            @if(session('error')) 
                <div style="margin-top:10px;" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-inner--text"><strong>Warning! </strong> {{ session('error')}}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif 
              <h1 style="text-align: center;">ID CARD DISTRIBUTION</h1>
              <div class="text-center text-muted mb-4">
                <small>Create New admins here.</small>
              </div>
              {!! Form::open( ['action' => 'memberController@getCandidateDetails', 'method' => 'POST','enctype' => 'multipart/form-data','id' => 'myForm'] ) !!}
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email*</label>
                          <input type="email" class="form-control"id="exampleFormControlInput1" name="email" value="" placeholder="name.kiitecell@gmail.com" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="icampid">ICAMP ID*</label>
                          <input type="text" value="" name="icampid" placeholder="ICAMP ID" class="form-control" requried>
                        </div>
                      </div>
                  	
                    </div>
                    <center>
                    <input type="submit" value="Submit" class="btn btn-primary mt-4">
                    </center>
            {!! Form::hidden('_method','POST') !!}
            {!! Form::close() !!}
            </div>
          </div>
        </div>
          
        </div>
      </div>
    </div>
@if(session('success'))
@if(session('companies')->count()>0)
    <div class="table-responsive">
        <table class="table align-items-center table-dark">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Company Name</th>
                <th scope="col">{{ session('name') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach(session('companies') as $company)
            <tr>  
                <td>
                   {{ $company->companies->Company_name }}
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
@endif
@endif
@endsection