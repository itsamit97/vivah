
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>1 Vivah.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Marital Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="{{asset('web_assets/css/bootstrap-3.1.1.min.css')}}" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('web_assets/js/jquery.min.js')}}"></script>
<script src="{{asset('web_assets/js/bootstrap.min.js')}}"></script>
<!-- Custom Theme files -->
<link href="{{asset('web_assets/css/style.css')}}" rel='stylesheet' type='text/css' />

<link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
<!----font-Awesome----->
<link href="{{asset('web_assets/css/font-awesome.css')}}" rel="stylesheet"> 
<!----font-Awesome----->

	<!-- start second_web for disign website cdn -->
	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('web_assets/second_web/css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('web_assets/second_web/css/icomoon.css')}}">
	<!-- Bootstrap  -->
	<!-- <link rel="stylesheet" href="{{asset('web_assets/second_web/css/bootstrap.css')}}"> -->

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('web_assets/second_web/css/magnific-popup.css')}}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{asset('web_assets/second_web/css/style.css')}}">
	<!-- end second_web for disign website cdn -->

	<!-- slider cdn -->
	<link href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css" rel="stylesheet"/>
	<link href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css" rel="stylesheet"/>
	<!-- jequery cdn -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
	<script src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

	<!-- end slider -->

	<!-- datepicker -->
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
	<!-- end datepicker -->

	 <!-- new year picker -->
	<!-- <link href="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet"> -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">

	<!-- end year picker -->

	<!-- start time picker cdn  -->
	<link href="{{asset('time_picker_asset/mdtimepicker.css')}}" rel="stylesheet">
	<!-- end time picker cdn -->

	<script>
	$(document).ready(function(){
	    $(".dropdown").hover(            
	        function() {
	            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
	            $(this).toggleClass('open');        
	        },
	        function() {
	            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
	            $(this).toggleClass('open');       
	        }
	    );
	});
	</script>
</head>
<body>
<!-- =====================  Navigation Start ================= -->
 <div class="navbar navbar-inverse-blue navbar">
    <!--<div class="navbar navbar-inverse-blue navbar-fixed-top">-->
      <div class="navbar-inner" class="banner" id="myHeader">
        <div class="container">
           <div class="navigation">
             <nav id="colorNav">
							   <ul>
										<li class="green">
											<!-- <a href="#" class="icon-home"></a> -->
											<ul>
												<li><a href="{{route('login')}}">Login</a></li>
											    <li><a href="{{route('registration')}}">Register</a></li>
											    <!-- <li><a href="{{route('logut')}}">Logout</a></li> -->
											    <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
													<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
													Logout
												</a></li>
											</ul>
										</li>
							   </ul>
             </nav>
           </div>
           <a class="brand" href="index.html"><img src="{{asset('web_assets/images/bc_images/1vivahlogoa.jpg')}}" alt="logo"></a>
          <div class="pull-right">
          	<nav class="navbar nav_bottom" role="navigation">
				            <!-- Brand and toggle get grouped for better mobile display -->
						   <div class="navbar-header nav_2">
						      <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">Menu
						        <span class="sr-only">Toggle navigation</span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						      </button>
						      <a class="navbar-brand" href="#"></a>
						   </div> 
						   <!-- Collect the nav links, forms, and other content for toggling -->
						    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						        <ul class="nav navbar-nav nav_1">
						            <li><a href="{{route('index')}}">Home</a></li>
						            <li><a href="{{route('about')}}">About</a></li>
						            <li oncli id="my_profile()"><a href="{{route('self_profile')}}" id="my_profile">My Profile</a></li>
						            <li class="last"><a href="{{route('contact')}}">Contacts</a></li>
						        </ul>	
						     </div><!-- /.navbar-collapse -->
		   	   </nav>
		     </div> <!-- end pull-right -->
          <div class="clearfix"> </div>
        </div> <!-- end container -->
      </div> <!-- end navbar-inner -->
    </div> <!-- end navbar-inverse-blue -->
<!-- ============================  Navigation End ============================ -->
 <!--A Design by W3layouts Logout Model -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{route('logut')}}">Logout</a>
                </div>
            </div>
        </div>
    </div>

