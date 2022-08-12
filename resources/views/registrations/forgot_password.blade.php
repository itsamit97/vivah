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
      border-radius: 25px;
      border-style: groove;
      border-block-color: red;
      height: 260px;
      margin-top: 67px;
      background-image:url('web_assets/images/image4.jpg');
    }
</style>


<div class="container mt-3">
  <!-- <p data-toggle="modal" data-target="#forgotPassword" style="color:#931111; float:right; margin-right:20px; margin-top:80px;">Forgot Password</p> -->
</div>

<!-- Start Login form -->
<div  style="background-color:#321919;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content loginClass"  class="loginClass">
      <!-- Modal Header -->
      <div class="headderDiv">
        <h4 class="modal-title">Forgot Password</h4>
      </div>
          <div class="row">
              <div class="col-sm-6">
                 <div class="modal-body">
                      <div style="width:230px; border-radius:20px;border-style:groove; border-block-color: red; height: 335px;">
                          <div class="logo" style="margin-left: 41px;"> <img src="{{asset('web_assets/images/bc_images/login1.jpg')}}" alt="" style="height:83px; width:94px; margin-left: 18px;" > 
                          </div>
                          <div class="text-center mt-4 name text-primary"> 1Vivah</div>
                          <form action="{{route('forgot_password')}}" method="post" class="p-3 mt-3">
                            {{csrf_field()}}
                              <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span><input type="text" name="email" class="form-control email"placeholder="Enter Email Id"> </div>
                              <p class="emailAlertMsg"></p>
                              <button type="submit" name="submit" class="btn mt-3" style="background-color: #931111; width:221px; margin-top:20px;">Submit</button>
                          </form>   
                      </div>
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="rightBox">
                  </div>
                  <button type="submit" name="submit" class="btn mt-3" style="background-color: #931111; width:221px; margin-top:20px; margin-left: 20px;"><a href="{{route('login')}}">Already Have A Account?</a></button>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Login form -->
<br>

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

<script type="text/javascript">
  
  $(document).ready(function(){
    // email_mobile_no == emailMobileNo
    $(".email_mobile_no").keyup(function(){
      var OriginalEmailMobileNo =  $(".email_mobile_no").val();
      var emailMobileNo = $(".emailMobileNo").val();
      if(OriginalEmailMobileNo == emailMobileNo){
        console.log('match success');
        $(".emailAlertMsg").html('Success').css("color","green");
      
      }else{
        console.log('match not success');
         // $("#password").val();
         if($.isNumeric(OriginalEmailMobileNo)){
            $(".emailAlertMsg").html('Check  Mobile Password').css("color","red");
              $("#password").val('');

         }else{
           $(".emailAlertMsg").html('Check Email  Password').css("color","red");
             $("#password").val('');
         }
          
      }

    });
});

</script>

@stop
