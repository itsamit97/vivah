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
      margin-top: 217px;
      background-image:url('web_assets/images/image4.jpg');
    }
</style>
<!-- Registration Btn -->
<div class="container mt-3">
  <p data-toggle="modal" data-target="#myModal" style="color:#931111; float:right; margin-right:20px; margin-top:80px;">Registration</p>
</div>

<!-- Start Login form -->
<div class="modal" id="myModal" style="background-color:#321919 ;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content loginClass"  class="loginClass">
      <!-- Modal Header -->
      <div class="headderDiv">
        <h4 class="modal-title">One Vivah Login</h4>
      </div>
      <div class="row">
            <div class="col-sm-6">
               <div class="modal-body">
                    <div style="width:256px; border-radius:20px;border-style:groove; border-block-color: red; height:989px;">
                          <div class="logo" style="margin-left: 41px;"> <img src="{{asset('web_assets/images/bc_images/login1.jpg')}}" alt="" style="height:83px; width:94px; margin-left: 18px;" > </div>
                        <div class="text-center mt-4 name text-primary"> 1Vivah</div>
                        <form action="{{route('registration')}}" method="post" class="p-3 mt-3">
                          {{csrf_field()}}
                           <div class="form-group"> 
                            <label class="form-control-label text-muted">Registration For</label>
                               <select type="select" id="registration_for" name="registration_for" placeholder="" class="form-control" required=""> 
                                   <option value="">Registration For</option>
                                    @foreach($registrationForData as $key=>$value )
                                      <option value="{{$value->id}}">{{$value->gender}}</option>
                                    @endforeach  
                                </select>
                            </div>

                           <div class="form-group"> 
                            <label class="form-control-label text-muted">Registration By</label>
                               <select type="select" id="registration_by" name="registration_by" placeholder="" class="form-control" required=""> 
                                 <option value="">Registration By</option>
                                  @foreach($registrationByData as $key=>$value )
                                    <option value="{{$value->id}}">{{$value->registration_by}}</option>
                                  @endforeach  
                                </select>
                            </div>

                            <div class="form-field d-flex align-items-center">  <label class="form-control-label text-muted">First Name</label><input type="text" name="first_name" id="first_name"  class="form-control"placeholder="Groom Bride Name" required=""></div>

                            <div class="form-field d-flex align-items-center"> <label class="form-control-label text-muted">Last Name</label><input type="text" name="last_name" id="last_name"  class="form-control"placeholder="Last Name" required=""  value="{{old('last_name')}}"> 
                            </div>

                             <div class="form-field d-flex align-items-center"> <label class="form-control-label text-muted">Mobile No</label><input type="text" name="mobile_no" id="mobile_no"  class="form-control"placeholder="Mobile No" required=""  value="{{old('mobile_no')}}"> 
                              <p class="alert_msg"></p>
                             </div>

                            <div class="form-field d-flex align-items-center"> <label class="form-control-label text-muted">Email</label> <input type="text" name="email" id="email"  class="form-control"placeholder="Email" required=""  value="{{old('email')}}">
                            </div>
                            <p id="confirmMsg"></p>

                            <div class="form-field d-flex align-items-center"> <label class="form-control-label text-muted">Password</label> <input type="password" name="password" id="password" class="form-control" placeholder="Password" required=""> 
                            </div> 

                            <label>Show Password</label>
                            <input type="checkbox" name="" id="passHideShow" placeholder="Hide Show Password">


                            <div class="form-field d-flex align-items-center"> <label class="form-control-label text-muted">Confirm Password</label> <input type="password" name="conf_password" id="conf_password" class="form-control" placeholder=" Confirm Password"> 
                                <p id="alert_conf_assword"></p>
                            </div>
                            <p id="alert_conf_assword"></p>
                              <!-- <p id="ipAddress"> ip address</p> -->
                            <input type="hidden"  name="user_ip" id="userIpAddress" placeholder="hidden Ip Address">
                            <button type="submit" name="submit" class="btn mt-3" style="background-color: #931111; width:245px; margin-top:10px;">Registration</button>
                        </form>   
                    </div>
                </div>
            </div>
            <!-- rightBox -->
            <div class="col-sm-6">
                <div class="rightBox">
                </div>
                 <center> <a href="" style="margin-right: 47px;">Not a Member yet?</a></center>
                <button type="submit" name="submit" class="btn mt-3" style="background-color: #931111; width:221px; margin-top:20px; margin-left: 20px;"><a href="{{route('login')}}">Alredy have an account?</a></button>
                    <div style="margin-right:200px;">
                      <div class="footer" >
                          <div class="container" >
                        
                            <div class="col-sm-1">
                              <h4>Help & Support</h4>
                              <ul class="footer_links">
                                <li><a href="#">24x7 Live help</a></li>
                                <li><a href="contact.html">Contact us</a></li>
                              </ul>
                            </div>
                            <div class="col-sm-1">
                              <h4>Quick Links</h4>
                              <ul class="footer_links">
                                <li><a href="privacy.html">Privacy Policy</a></li>
                                <li><a href="terms.html">Terms and Conditions</a></li>
                                <li><a href="services.html">Services</a></li>
                              </ul>
                            </div>
                            <div class="col-sm-1">
                              <h4>Social</h4>
                              <ul class="footer_social">
                              <li><a href="#"><i class="fa fa-facebook fa1"> </i></a></li>
                              <li><a href="#"><i class="fa fa-twitter fa1"> </i></a></li>
                              <li><a href="#"><i class="fa fa-google-plus fa1"> </i></a></li>
                              <li><a href="#"><i class="fa fa-youtube fa1"> </i></a></li>
                              </ul>
                            </div>
                            <div class="clearfix"> </div>
                            <div class="copy">
                               <p>Copyright © 2015 Marital . All Rights Reserved  | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
                              </div>
                          </div>
                    </div>
                  </div>
            </div>
      </div>
    </div>
    </div>
  </div>
</div>
<!-- End Login form -->

<!-- Alert SuucesMsg -->
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
                 Contact by phone or mail Without fees (pendding)
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

<div class="grid_2">
  <!-- <h2>Why Choose 1 Vivah</h2> -->
    <center>
      <label class="hvr-shutter-out-horizontal">About One Vivah</label>
    </center>
    <center>

      <label class="hvr-shutter-out-horizontal"><b>one Vivah</b><br><lable style="font-size:15px;">1 vivah is different from other matchmaking sites because of some unique benefits that every parent will find highly useful
          1 vivah.com is one of India’s leading matrimonial websites that has helped lakhs of members find their perfect life partner.

          We believe choosing a life partner is a big and important decision, and hence work towards giving a simple and secure matchmaking experience for you and your family. Each profile registered with us goes through a manual screening process before going live on site; we provide superior privacy controls for Free; and also verify contact information of members.

        You can register for Free and search according to your specific criteria on age, height, community, profession, income, location and much more- on your computer, tablet or mobile. Regular custom mails and notifications make the process easier and take you closer to your 1 Vivah!</lable>
        <div class="row">
          <div class="religion col-sm-3">
            <div>Country :</div>
            <a href="#" target="_blank" class="religion_1" title="Hindu Matrimonial" style="padding-left:0px !important;">India</a>
            <span>|</span><a href="#" target="_blank" class="religion_1" title="Muslim Matrimonial">Australia</a>
            <span>|</span><a href="#" target="_blank" class="religion_1" title="Christian Matrimonial">Russia</a>
            <span>|</span><a href="#" target="_blank" class="religion_1" title="Sikh Matrimonial">India</a>
            <span>|</span><a href="#" target="_blank" class="religion_1" title="Inter Religion Matrimonial">Kuwait</a>
            <span>|</span><a href="#" target="_blank" class="religion_1" title="Inter Religion Matrimonial">Uk</a>
            <span>|</span><a href="#" target="_blank" class="religion_1" title="Inter Religion Matrimonial">View All</a>
          </div>

          <div class="religion col-sm-3">
            <div >Religion :</div>
            <a href="#" target="_blank" class="religion_1" title="Hindu Matrimonial" style="padding-left:0px !important;">Hindus</a>
            <span>|</span><a href="#" target="_blank" class="religion_1" title="Muslim Matrimonial">Muslims</a>
            <span>|</span><a href="#" target="_blank" class="religion_1" title="Christian Matrimonial">Christians</a>
            <span>|</span><a href="#" target="_blank" class="religion_1" title="Sikh Matrimonial">Sikhs</a>
            <span>|</span><a href="#" target="_blank" class="religion_1" title="Inter Religion Matrimonial">Buddhists</a>
            <span>|</span><a href="#" target="_blank" class="religion_1" title="Inter Religion Matrimonial">Others</a>
          </div>
          <div class="religion col-sm-3">
            <div >Cast:</div>
            <a href="#" target="_blank"  title="Hindu Matrimonial" style="padding-left:0px !important;">India</a>
            <span>|</span><a href="#" target="_blank"  title="Muslim Matrimonial">Australia</a>
            <span>|</span><a href="#" target="_blank"  title="Christian Matrimonial">Russia</a>
            <span>|</span><a href="#" target="_blank"  title="Sikh Matrimonial">India</a>
            <span>|</span><a href="#" target="_blank" title="Inter Religion Matrimonial">Kuwait</a>
            <span>|</span><a href="#" target="_blank" class="religion_1" title="Inter Religion Matrimonial">Uk</a>
            <span>|</span><a href="#" target="_blank" class="religion_1" title="Inter Religion Matrimonial">View All</a>
          </div>
        </div>
      </label>
  </center>
</div>  
<!-- end 1 vivah -->


<script type="text/javascript">
  $(document).ready(function(){
      $("#add_bride_groom_table_id").change(function(){
       var add_bride_groom_table_id  = $("#add_bride_groom_table_id").val();
        $.ajax({
                url:"get_gender_name/"+add_bride_groom_table_id,
                 method:"get",
                success:function(res){
                  var resData =  JSON.parse(res);
                     var gender = resData.data.gender;
                    if(gender == 'male'){
                        // console.log(male);
                      $('#male').prop('checked', true);
                    }else if(gender == 'female'){
                      $('#female').prop('checked',true);
                    }
                }
             });
      });

      // Password  Validation
      $("#conf_password").keyup(function(){
        var password = $("#password").val();
        var confPassword = $("#conf_password").val();
          if(password===confPassword){
            $("#alert_conf_assword").html('matchess password').css("color","green");
          }else{
            $("#alert_conf_assword").html('Please check spelling').css("color","red");
             console.log('notchack');
          }
      });

      // Mobile No Validation
      $("#mobile_no").keyup(function(){
        var mobNum = $("#mobile_no").val();
          if(mobNum.length==10){
            $(".alert_msg").html('Validate mobile number').css("color","green");

                var token = "{{csrf_token()}}";
                $.ajax({
                    url:"confirm_mobile_no",
                    method:"post",
                    data:{'_token':token,'mobNum':mobNum},

                    success:function(res){
                      // var resData = json.parse(res);
                      var resData = JSON.parse(res);
                      var confirmMsg = (resData.msg);
                      var status = (resData.status);
                      if(status==1){
                        $(".alert_msg").html('Mobile No Already Taken ').css("color","red");
                      }else{
                        $(".alert_msg").html('success').css("color","green");
                      }
                    }
                });


          }else{
            $(".alert_msg").html('Please put 10  digit mobile number').css("color","red");
          }
      });
   
      //Confirm email Alredy Exists
      $("#email").keyup(function(){
        var confEmail = $("#email").val();
        var token = "{{csrf_token()}}";
        $.ajax({
            url:"confirm_email",
            method:"post",
            data:{'_token':token,'confEmail':confEmail},

            success:function(res){
              // var resData = json.parse(res);
              var resData = JSON.parse(res);
              var status = (resData.status);
              var confirmMsg = (resData.msg);
              var status = (resData.status);
              if(status==1){
                $("#confirmMsg").html('Email Already Taken ').css("color","red");
              }else{
                $("#confirmMsg").html('success').css("color","green");
              }
            }
        });
      });

      // Important create User ip Address dynamic 
      $.getJSON("http://api.ipify.org/?format=json",function(data){
        $("#userIpAddress").val(data.ip);

       });


      // Hide Show Password
       $('#passHideShow').on('click', function(){
          var passInput=$("#password");
          if(passInput.attr('type')==='password')
            {
              passInput.attr('type','text');
          }else{
             passInput.attr('type','password');
          }
      })



  });

</script>


@stop
