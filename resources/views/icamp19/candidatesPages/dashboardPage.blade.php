@extends('icamp19.layout.mainLayout')
@section('content')
<!-- Sidenav -->
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="/dashboard">
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
            <a href="/dashboard" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            </a>
            <div class="dropdown-divider"></div>
            <a href="/logout" class="dropdown-item">
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
                <a class="nav-link" href="/dashboard">
                  <i class="ni ni-shop text-orange"></i> Dashboard
                </a>
              </li>
          <li class="nav-item" id="btn_dropdown" style="cursor: pointer;">
            <a class="nav-link">
              <i class="ni ni-tv-2 text-primary"></i> Itinerary &nbsp <i class="ni ni-bold-down" style="cursor: pointer;" ></i>
            </a>
            	 <ul class="dropdown-dash" style="display: none;">
          				<li class="nav-item" style="list-style: none;">
           				 <a class="nav-link" href="#">
              				<i class="ni ni-time-alarm text-primary"></i>Itinerary Day 1
            			</a>
            		</li>

            		<li class="nav-item" style="list-style: none;">
           				 <a class="nav-link" href="#">
              				<i class="ni ni-time-alarm text-primary"></i>Itinerary Day 2
            			</a>
            		</li>

            		<li class="nav-item" style="list-style: none;">
           				 <a class="nav-link" href="#">
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
            <a class="nav-link" href="/payment">
              <i class="ni ni-credit-card text-red"></i> Pay Now
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/company">
              <i class="ni ni-tag text-info"></i> Choose Company
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.ecell.org.in">
              <i class="ni ni-mobile-button text-pink"></i> Contact Us
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="../index.html">Profile</a>
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
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-12 col-lg-12" >
            @if(Auth::user()->profile_status==0)
              <span style="color: #fff;">Completed: 0%</span>
            	<div class="progress">
                  <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:0%;"></div>          
              </div>
            @endif
            @if(Auth::user()->profile_status==1)
              <span style="color: #fff;">Completed: 33.3%</span>
            	<div class="progress">
                  <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:33.3%;"></div>          
              </div>
            @endif
            @if(Auth::user()->profile_status==2)
              <span style="color: #fff;">Completed: 66.6%</span>
            	<div class="progress">
                  <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:66.6%;"></div>          
              </div>
            @endif
            @if(Auth::user()->profile_status==3)
              <span style="color: #fff;">Completed: 100%</span>
            	<div class="progress">
                  <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:100%;"></div>          
              </div>
            @endif
          <div class="row" style="margin-bottom: 30px;">
  				<div class="col-sm-4" style="text-align: center; color:#fff">Profile Completion</div>
  				<div class="col-sm-4" style="text-align: center; color:#fff">Payment</div>
 				 <div class="col-sm-4" style="text-align: center; color:#fff">Choose Company</div>
				</div>
            </div>


            <div class="col-xl-4 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Task : 1/3</h5>
                      <span class="h2 font-weight-bold mb-0">Profile Status</span>
                    </div>
                   
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    @if(Auth::user()->profile_status < 1)
                      <span class="text-nowrap"><button type="button" class="btn btn-danger"><i class="ni ni-fat-remove"></i>Profile Completed</button></span>
                    @else
                    <span class="text-nowrap"><button type="button" class="btn btn-success"><i class="ni ni-check-bold"></i>Profile Completed</button></span>
                    @endif
                  </p>
                </div>
              </div>
            </div>


             <div class="col-xl-4 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Task : 2/3</h5>
                      <span class="h2 font-weight-bold mb-0">Payment Status</span>
                    </div>
                   
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                  @if(Auth::user()->profile_status < 2)
                    <span class="text-nowrap"><button type="button" class="btn btn-danger"><i class="ni ni-fat-remove"></i>Complete Payment</button></span>
                  @else
                  <span class="text-nowrap"><button type="button" class="btn btn-success"><i class="ni ni-check-bold"></i>Complete Payment</button></span>
                  @endif
                  </p>
                </div>
              </div>
            </div>


             <div class="col-xl-4 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Task : 3/3</h5>
                      <span class="h2 font-weight-bold mb-0">Events not Chosen</span>
                    </div>
                   
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                  @if(Auth::user()->profile_status < 3 ) 
                    <span class="text-nowrap"><button type="button" class="btn btn-danger"><i class="ni ni-fat-remove"></i>Choose Company</button></span>
                  @else
                  <span class="text-nowrap"><button type="button" class="btn btn-success"><i class="ni ni-check-bold"></i>Choose Company</button></span>
                  @endif
                  </p>
                </div>
              </div>
            </div>
            
           
          </div>
        </div>
      </div>
    </div>
    
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
                
              </div>
            </div>
            <div class="card-body">
            @if(session('success')) 
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                        <span class="alert-inner--text"><strong>Congratulation! </strong> {{ session('success')}}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            @endif 
            {!! Form::open( ['action' => 'candidateController@updateProfile', 'method' => 'POST','enctype' => 'multipart/form-data','id' => 'myForm'] ) !!}
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Full name *</label>
                        <input type="text" id="name" class="form-control form-control-alternative" value="{{ Auth::user()->name }} " placeholder="your name" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Primary Email *</label>
                        <input type="email" id="main_email" class="form-control form-control-alternative" value="{{ Auth::user()->email }}" placeholder="abc@example.com" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Mobile number *</label>
                        <input value="{{ Auth::user()->phone_number!=null?Auth::user()->phone_number:''}}" type="text" name="number" class="form-control form-control-alternative" placeholder="your number" required>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">WhatsApp number *</label>
                        <input value="{{ Auth::user()->wphone_number!=null?Auth::user()->wphone_number:''}}" type="text" name="wnumber" class="form-control form-control-alternative" placeholder="WhatsApp no." required>
                      </div>
                    </div>

                    <div class="form-group col-lg-4">
                      <label class="form-control-label">Gender *</label>
                    <div id="radios-component" class="tab-pane tab-example-result fade show active" role="tabpanel" aria-labelledby="radios-component-tab">
                      <div class="row" style="width: 85%;">
                        <div class="col-md-4">
                       <div class="custom-control custom-radio mb-3">
                         <input name="custom-radio" class="custom-control-input" id="radiobutton1" value="male" type="radio" checked="" />
                         <label class="custom-control-label" for="radiobutton1">Male</label>
                       </div></div><div class="col-md-4">
                       <div class="custom-control custom-radio mb-3">
                         <input name="custom-radio" class="custom-control-input" id="radiobutton2" value="female"type="radio" unchecked="" />
                         <label class="custom-control-label" for="radiobutton2">Female</label>
                       </div></div>
                       <div class="col-md-4">
                       <div class="custom-control custom-radio mb-3">
                         <input name="custom-radio" class="custom-control-input" id="radiobutton3" value="other" type="radio"/>
                         <label class="custom-control-label" for="radiobutton3">Others</label>
                       </div></div>
                     </div>
                    </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                
                <h6 class="heading-small text-muted mb-4">College information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">University *</label>

                        <select name="clg" class="form-control form-control-alternative" id="uni" value="uni" name="uni" onchange="abc1(this.id,'email-tag','other-uni')" required >
                           <option value="">--Select your University--</option>
                          
                           <option value="KIIT_university">KIIT University</option>
                           <!-- <option value="others">Others</option> -->
                        </select>
                      </div>
                    </div>                   
                  </div>
                 
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Roll number *</label>
                        <input value="{{ Auth::user()->roll_num!=null?Auth::user()->roll_num:''}}" type="text" name="roll_num" id="roll" class="form-control form-control-alternative" placeholder="Roll" required>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Year *</label>
                        <select  name="year" id="year" class="form-control form-control-alternative" placeholder="Year" name="year" required>
                          <option default hidden value="">--Select year--</option>
                          <option value="1">1st</option>
                          <option value="2">2nd</option>
                          <option value="3">3rd</option>
                          <option value="4">4th</option>
                          <option value="0">Others</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                          <label class="form-control-label" for="file">Upload resume * </label>
                          <br>
                          <input style="" type="file" name="file" id="file" required="true">
                          <span id="filename">
                             @if(Auth::user()->resume!=null)
                             <i style="color:green;" class="ni ni-check-bold"></i><a href="/showResume">{{  Auth::user()->resume }}</a>
                             @endif
                          </span>
                        </div>
                    </div>

                     <div class="col-md-6">
                        <div class="text-center">
                        @if(Auth::user()->profile_status>=1)
                            <button type="submit" class="btn btn-primary mt-4" name="submit" id="submit">Update account</button>
                        @else
                        <button type="submit" class="btn btn-primary mt-4" name="submit" id="submit">Create account</button>
                        @endif
                        </div>
                    </div>
                  </div>
                </div>
                
              
                {!! Form::hidden('_method','POST') !!}
                {!! Form::close() !!}
              
            </div>
          </div>
        <!--</div>-->
      </div>
@endsection
@section('script')
<script type="text/javascript">

    $("#files").change(function() {
      filename = this.files[0].name
      console.log(filename);
      $("#filename").html(filename);
    });
    function abc1(opt,id2,id3)
    {
      var a1=document.getElementById(opt).value;
      var id2=document.getElementById(id2);
      var id3=document.getElementById(id3);
      
      id2.style.visibility='visible';
      if(a1=="KIIT_university")
      {
         id2.innerHTML="KIIT Mail-id";
         id3.style.visibility='hidden';
      }
      else if(a1=="others")
      {
        id2.innerHTML="Alternate email-id";
        id3.style.visibility='visible';
      }
      else if(a1=="0")
      {
        id2.innerHTML="Mail-id";
        id3.style.visibility='hidden';
      }
      
    }
</script>
  <script type="text/javascript">
  	$(document).ready(function(){

  		var i=0;
  		$('#btn_dropdown').click(function(){
  			if(i==0){
  			$('.dropdown-dash').show();
  			i++;	
  			}
  			else{
  			$('.dropdown-dash').hide();
  			i=0;
  			}
  			
  	});

  	});

</script>

@endsection