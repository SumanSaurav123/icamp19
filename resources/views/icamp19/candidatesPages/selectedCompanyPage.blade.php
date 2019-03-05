@extends('icamp19.layout.mainLayout')
@section('content')
<style>
@import url(https://fonts.googleapis.com/css?family=Lato:400,700,900);
*, *:before, *:after {
  box-sizing: border-box;
}

.wrapper {
  padding-top: 40px;
  padding-bottom: 40px;
}
.wrapper:focus {
  outline: 0;
}

.clash-card {
  background: white;
  width: 350px;
  display: inline-block;
  border-radius: 19px;
  text-align: center;
  box-shadow: -1px 15px 30px -12px black;
  z-index: 9999;

}

.clash-card__image {
 
  height: 50px;
  padding:10px;
  background:#2dce89;
  border-top-left-radius: 14px;
  border-top-right-radius: 14px;
}

.clash-card__level {
  text-transform: uppercase;
  font-size: 12px;
  font-weight: 700;
  margin-bottom: 3px;
}

.clash-card__level--wizard {
  color: #4FACFF;
}

.clash-card__unit-name {
  font-size: 26px;
  color: black;
  font-weight: 900;
  margin-bottom: 5px;
}

.clash-card__unit-description {
  padding: 20px;
  margin-bottom: 10px;
}

.clash-card__unit-stats--wizard {
  background: #4FACFF;
}
.clash-card__unit-stats--wizard .one-third {
  border-right: 1px solid #309eff;
}

.clash-card__unit-stats {
  color: white;
  font-weight: 700;
  border-bottom-left-radius: 14px;
  border-bottom-right-radius: 14px;
}
.clash-card__unit-stats .one-third {
  width: 33%;
  float: left;
  padding: 20px 15px;
}
.clash-card__unit-stats sup {
  position: absolute;
  bottom: 4px;
  font-size: 45%;
  margin-left: 2px;
}
.clash-card__unit-stats .stat {
  position: relative;
  font-size: 24px;
  margin-bottom: 10px;
}
.clash-card__unit-stats .stat-value {
  text-transform: uppercase;
  font-weight: 400;
  font-size: 12px;
}
.clash-card__unit-stats .no-border {
  border-right: none;
}

.clearfix:after {
  visibility: hidden;
  display: block;
  font-size: 0;
  content: " ";
  clear: both;
  height: 0;
}
</style>

<!-- Sidenav -->
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="../index.html">
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
            <a href="./pages/profile.html" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="./pages/profile.html" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Settings</span>
            </a>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#!" class="dropdown-item">
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
              <a href="../index.html">
                <img src="../assets/img/brand/blue.png">
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
                <a class="nav-link" href="../index.html">
                  <i class="ni ni-shop text-orange"></i> Dashboard
                </a>
              </li>
          <li class="nav-item" id="btn_dropdown" style="cursor: pointer;">
            <a class="nav-link">
              <i class="ni ni-tv-2 text-primary"></i> Itinerary &nbsp <i class="ni ni-bold-down" style="cursor: pointer;" ></i>
            </a>
            	 <ul class="dropdown-dash" style="display: none;">
          				<li class="nav-item" style="list-style: none;">
           				 <a class="nav-link" href="../pages/timeline.html">
              				<i class="ni ni-time-alarm text-primary"></i>Itinerary Day 1
            			</a>
            		</li>

            		<li class="nav-item" style="list-style: none;">
           				 <a class="nav-link" href="../pages/timeline.html">
              				<i class="ni ni-time-alarm text-primary"></i>Itinerary Day 2
            			</a>
            		</li>

            		<li class="nav-item" style="list-style: none;">
           				 <a class="nav-link" href="../pages/timeline.html">
              				<i class="ni ni-time-alarm text-primary"></i>Itinerary Day 3
            			</a>
                </li>
            	 </ul>
          </li>
         
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/getSelectedCompanyPage">
              <i class="ni ni-single-02 text-yellow"></i>Selected Company
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/paynow">
              <i class="ni ni-credit-card text-red"></i> Pay Now
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/company">
              <i class="ni ni-tag text-info"></i> Choose Company
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/register.html">
              <i class="ni ni-mobile-button text-pink"></i> Contact Us
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/register.html">
              <i class="ni ni-settings text-success"></i> Settings
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
        <a class="h4 mb-0 text-white  d-none d-lg-inline-block" href="../index.html">Selected Company</a>
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
              <a href="../pages/profile.html" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="../pages/profile.html" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <!-- <a href="./pages/profile.html" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="./pages/profile.html" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span> -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="/logout" class="dropdown-item">
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
            </div>
    </div>
</div>

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
<div class="container">
    <div class="row allmem">
    @if($companies->count()>0)
     @foreach($companies as $company)
     <div class="col-md-4">
                <div class="wrapper">
                    <div class="clash-card wizard">
                        <a href="/removeCompany/{{$company->companies->id}}"><div class="clash-card__image clash-card__image--wizard">
                            <span style="color:white;">Remove from list</span>
                        </div></a>
                       
                        <div class="clash-card__unit-name">{{$company->companies->Company_name}}</div>
                        <div style="text-align:center;" class="clash-card__unit-description">
                        <ul class="list-group">
                            <li class="list-group-item"><b>Company Location :</b>{{$company->companies->Company_loc}}</li>
                            <li class="list-group-item"><b>Domains : </b>{{$company->companies->Domains}}</li>
                            <li class="list-group-item"><b>Additional Perks : </b>{{$company->companies->Added_perks}}</li>
                        </ul>
                        </div>
          
                        <div class="clash-card__unit-stats clash-card__unit-stats--wizard clearfix">
                            <div class="one-third">
                            <div class="stat">{{$company->companies->Stipend}}</div>
                            <div class="stat-value">Stipend</div>
                        </div>

                        <div class="one-third">
                            <div style="font-size:18px;" class="stat">{{$company->companies->Duration_Max}} weeks</div>
                            <div class="stat-value">Time period</div>
                        </div>
          
                        <div class="one-third no-border">
                        <div style="font-size:18px;" class="stat">{{$company->companies->Interview_Mode}}</div>
                        <div class="stat-value">Interview mode</div>
                        </div>
                        </div>
          
                    </div><!-- end clash-card wizard-->
                </div><!-- end wrapper -->  
            </div>
     @endforeach
    @else
        <div style="margin-top:10px;" class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-inner--text"><strong>Warning! </strong>No company selected</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
    @endif
    </div>
</div>

@endsection