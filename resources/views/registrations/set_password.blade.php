@extends('layout.web_master')
@section('content')
<style type="text/css">
    .loginClass{
      margin-left: 154px;
      width: 683px;
      margin-top: 117px;
    }
    .headderDiv{
      background-color: #931111;
      padding-bottom: 30px;
    }

    .bottomFooter{
      background-color: #931111;
      padding-bottom: 30px;
      width: auto;
      margin-left: 15px;
      margin-right: 14px;
      margin-bottom: 1px;
    }

    .rightBox{
      width: 264px;
      border-radius: 20px;
      border-style: groove;
      border-block-color: red;
      height: 260px;
      margin-top: 96px;
      background-image:url('web_assets/images/image4.jpg');
    }
 
</style>

<div class="container mt-3">
  <p data-toggle="modal" data-target="#myModal" style="color:#931111; float:right; margin-right:20px; margin-top:80px;">Set Password</p>
</div>

<!-- Start Set Password  form -->
<div class="modal" id="myModal" style="background-color:#321919 ;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content loginClass"  class="loginClass">
      <!-- Modal Header -->
      <div class="headderDiv">
        <h4 class="modal-title">Set Password</h4>
      </div>
      <div class="row">
            <div class="col-sm-6">
               <div class="modal-body">
                    <div style="width:256px; border-radius:20px;border-style:groove; border-block-color: red; height:514px;">
                          <div class="logo" style="margin-left: 41px;"> <img src="{{asset('web_assets/images/bc_images/login1.jpg')}}" alt="" style="height:83px; width:94px; margin-left: 18px;" > </div>
                        <div class="text-center mt-4 name text-primary"> 1Vivah</div>
                        <form action="{{route('set_password')}}" method="post" class="p-3 mt-3">
                          {{csrf_field()}}
                            <div class="form-field d-flex align-items-center"> <label class="form-control-label text-muted">Email</label> <input type="text" name="email" id="email"  class="form-control"placeholder="Email" value="{{old('email')}}" required="">
                            </div>
                            <p id="confirmMsg"></p>

                            <div class="form-field d-flex align-items-center"> <label class="form-control-label text-muted">Password</label> <input type="text" name="password" id="password" class="form-control" placeholder="Password" required="" value="{{old('password')}}"> 
                            </div> 

                            <div class="form-field d-flex align-items-center"> <label class="form-control-label text-muted">Confirm Password</label> <input type="text" name="conf_password" id="conf_password" class="form-control" placeholder=" Confirm Password"> 
                              <p id="alert_conf_assword"></p>
                            </div>

                              <!-- <input type="radio" name="gender" value="male"  value="male" id="male"> Male
                              <input type="radio" name="gender" value="female" value="female" id="female"> Female -->

                              <button type="submit" name="submit" class="btn mt-3" style="background-color: #931111; width:245px; margin-top:10px;">Set Password</button>
                        </form>   
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
              <div class="rightBox">
                </div>
              <button type="submit" name="submit" class="btn mt-3" style="background-color: #931111; width:221px; margin-top:20px; margin-left: 20px;"><a href="{{route('login')}}">Alredy have an account?</a></button>
            </div>
      </div>
    </div>
  </div>
</div>
<!-- End Login form -->
<div style="margin-top:300px;">
    @if (count($errors) > 0)
     <div class = "alert alert-danger">
        <ul>
           @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
           @endforeach
        </ul>
     </div>
  @endif

</div>


<!-- stept to find your match -->
<div class="container" style="margin-top:100px;">
        <h1 class="title" style="color: #931111">Steps to Find Your Match</h1>
        <div class="titleDescription2">
        फक्त चार सोपी पावलं तुम्हाला तुमच्या अपेक्षेप्रमाणे स्थळे शोधण्यासाठी मदत करू शकतील.
        </div>
      <div class="row ourServices">
            <div class="col-lg-3 col-md-3 innerBox">
              <div class="services"><i class="fa fa-edit"></i></div>
              <h2>Register</h2>
              <div class="description">please Create Registration In One Vivah.Com && free Cost</div>
            </div>
            <div class="col-lg-3 col-md-3 innerBox">
              <div class="services"><i class="fa fa-search"></i></i></div>
              <h2>Search</h2> 
              <div class="description">You Can Find Bride && Groom Easily</div>
              </div>
              <div class="col-lg-3 col-md-3 innerBox">
                  <div class="services"><i class="fa fa-check-square-o"></i></div>
                  <h2>Select</h2>
                  <div class="description">You Can Select Right Patner Easily</div>
              </div>
            <div class="col-lg-3 col-md-3 innerBox">
              <div class="services"><i class="fa fa-wechat"></i></div>
              <h2>Contact</h2>
              <div class="description">
              Contact by phone or mail Without fees (pendding)</div>
              </div>
        </div>
     </div>
</div>
<!-- end tept to find your match-->

<!-- Start Success Profiles weddings -->
<div class="grid_1">
  <div class="container">
    <!-- <h1>Success Profiles</h1> -->
    <div class="heart-divider">
      <span class="grey-line"></span>
      <i class="fa fa-heart pink-heart"></i>
      <i class="fa fa-heart grey-heart"></i>
      <span class="grey-line"></span>
    </div>
    <center>
      <label class="hvr-shutter-out-horizontal">Success Wedding</label>
    </center>
    <div class="heart-divider">
      <span class="grey-line"></span>
      <i class="fa fa-heart pink-heart"></i>
      <i class="fa fa-heart grey-heart"></i>
      <span class="grey-line"></span>
    </div>
    <ul id="flexiselDemo3">

      <li>
        <div class="col_1"><a href="view_profile.html">
          <img src="{{asset('web_assets/images/2.jpg')}}" alt="" class="hover-animation image-zoom-in img-responsive"/>
          <div class="layer m_1 hidden-link hover-animation delay1 fade-in">
            <div class="center-middle">About Her</div>
          </div>
          <h3><span class="m_3">Profile ID : MI-387412</span><br>28, Christian, Australia<br>Corporate</h3></a>
        </div>
      </li>
      <li>
        <div class="col_1"><a href="view_profile.html">
          <img src="{{asset('web_assets/images/3.jpg')}}" alt="" class="hover-animation image-zoom-in img-responsive"/>
          <div class="layer m_1 hidden-link hover-animation delay1 fade-in">
            <div class="center-middle">About Him</div>
          </div>
          <h3><span class="m_3">Profile ID : MI-387412</span><br>28, Christian, Australia<br>Corporate</h3></a>
        </div>
      </li>
      <li>
        <div class="col_1"><a href="view_profile.html">
          <img src="{{asset('web_assets/images/4.jpg')}}" alt="" class="hover-animation image-zoom-in img-responsive"/>
          <div class="layer m_1 hidden-link hover-animation delay1 fade-in">
            <div class="center-middle">About Her</div>
          </div>
          <h3><span class="m_3">Profile ID : MI-387412</span><br>28, Christian, Australia<br>Corporate</h3></a>
        </div>
      </li>
      <li>
        <div class="col_1"><a href="view_profile.html">
          <img src="{{asset('web_assets/images/5.jpg')}}" alt="" class="hover-animation image-zoom-in img-responsive"/>
          <div class="layer m_1 hidden-link hover-animation delay1 fade-in">
            <div class="center-middle">About Him</div>
          </div>
          <h3><span class="m_3">Profile ID : MI-387412</span><br>28, Christian, Australia<br>Corporate</h3></a>
        </div>
      </li>
      <li>
        <div class="col_1"><a href="view_profile.html">
          <img src="{{asset('web_assets/images/6.jpg')}}" alt="" class="hover-animation image-zoom-in img-responsive"/>
          <div class="layer m_1 hidden-link hover-animation delay1 fade-in">
            <div class="center-middle">About Her</div>
          </div>
          <h3><span class="m_3">Profile ID : MI-387412</span><br>28, Christian, Australia<br>Corporate</h3></a>
        </div>
      </li>
    </ul>
    <script type="text/javascript">
      $(window).load(function() {
        $("#flexiselDemo3").flexisel({
          visibleItems: 6,
          animationSpeed: 1000,
          autoPlay:false,
          autoPlaySpeed: 3000,        
          pauseOnHover: true,
          enableResponsiveBreakpoints: true,
          responsiveBreakpoints: { 
            portrait: { 
              changePoint:480,
              visibleItems: 1
            }, 
            landscape: { 
              changePoint:640,
              visibleItems: 2
            },
            tablet: { 
              changePoint:768,
              visibleItems: 3
            }
          }
        });
      });
    </script>
    <script type="text/javascript" src="{{asset('web_assets/js/jquery.flexisel.js')}}"></script>
  </div>
</div>
<!-- End Success Profiles -->

<!-- why choose 1vivah -->
<div class="heart-divider">
  <span class="grey-line"></span>
  <i class="fa fa-heart pink-heart"></i>
  <i class="fa fa-heart grey-heart"></i>
  <span class="grey-line"></span>
</div>

<script type="text/javascript">
    $(document).ready(function(){
      // Password  Validation
      $("#conf_password").keyup(function(){
        var password = $("#password").val();
        var confPassword = $("#conf_password").val();
          if(password===confPassword){
            $("#alert_conf_assword").html('matchess password').css("color","green");
          }else{
            $("#alert_conf_assword").html('Please check spelling').css("color","red");
          }

      });

    });

</script>


@stop
