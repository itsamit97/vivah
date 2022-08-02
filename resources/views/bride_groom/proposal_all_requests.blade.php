<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
	<title>Marital an Wedding Category Flat Bootstarp Resposive Website Template | View_profile :: w3layouts</title>
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
	<link href='//fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
	<!----font-Awesome----->
	<link href="{{asset('web_assets/css/font-awesome.css')}}" rel="stylesheet"> 
	<!----font-Awesome----->
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
	<!-- ============================  Navigation Start =========================== -->
	<div class="navbar navbar-inverse-blue navbar">
		<!--<div class="navbar navbar-inverse-blue navbar-fixed-top">-->
			<div class="navbar-inner navbar-inner_1">
				<div class="container">
					<div class="navigation">
						<nav id="colorNav">
							<ul>
								<li class="green">
									<a href="#" class="icon-home"></a>
									<ul>
										<li><a href="login.html">Login</a></li>
										<li><a href="register.html">Register</a></li>
										<li><a href="index.html">Logout</a></li>
									</ul>
								</li>
							</ul>
						</nav>
					</div>
					<!-- <a class="brand" href="index.html"><img src="images/logo.png" alt="logo"></a> -->
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
									<li><a href="{{route('index')}}">Home    </a></li>
									<li><a href="{{route('about')}}">About</a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Viewed<span class="caret"></span></a>
										<ul class="dropdown-menu" role="menu">
											<li><a href="{{route('recently_view')}}">Who Viewed my Profile</a></li>
											<li><a href="{{route('proposal_request_view')}}">Proposal Request</a></li>
										</ul>
									</li>
									
									<li class="last"><a href="{{route('contact')}}">Contacts</a></li>
									<!--   <li class="last"><a href="{{route('recently_view')}}">Recently View</a></li>-->		
								</ul>
							</div><!-- /.navbar-collapse -->
						</nav>
					</div> <!-- end pull-right -->
					<div class="clearfix"> </div>
				</div> <!-- end container -->
			</div> <!-- end navbar-inner -->
		</div> <!-- end navbar-inverse-blue -->
		<!-- ============================  Navigation End ============================ -->
		<!-- ============================ Start View Profile ============================ -->
		<div class="grid_3">
			<div class="container">
				<div class="breadcrumb1">
					<ul>
						<a href="index.html"><i class="fa fa-home home_1"></i></a>
						<span class="divider">&nbsp;|&nbsp;</span>
						<li class="current-page">View Profile</li>
					</ul>

			<!-- @if($errors->any())
				<h4>{{$errors->first()}}</h4>
				@endif -->
				@if($errors->any())
				<center id="self_profile_msg"><h4 class="hvr-shutter-out-horizontal text-center text-danger" id="self_profile_msg">{{$errors->first()}}</h4></center>
				@endif
			</div>
			<div class="profile">

				<div class="col-md-8 profile_left">
					@foreach($brideGroomDatas as $key=>$value)
					

					@if($value->role == 2)
					<h2>Profile Id :{{$value->groom_profile_id}}</h2>
					@else	
					<h2>Profile Id :{{$value->bride_profile_id}}</h2>
					@endif	

					
					<div class="col_3">
						<div class="col-sm-4 row_2">
							<div class="flexslider">
								<ul class="slides">
									<li data-thumb="{{asset('profiles/'.$value->profile)}}">
										<img src="{{asset('profiles/' . $value->profile)}}">
									</li>

									@endforeach							

									@foreach($uploadeImageData as $key=>$value)
									<li data-thumb="{{asset('self_profiles/'.$value->profile_image)}}">
										<!-- <img src="{{asset('web_assets/images/p1.jpg')}}" /> -->
										<img src="{{asset('self_profiles/' . $value->profile_image)}}">
									</li>
									@endforeach

									@foreach($brideGroomDatas as $key=>$value)
									
								</ul>
							</div>
						</div>
						<div class="col-sm-8 row_1">
							<table class="table_working_hours">
								<tbody>
									<tr class="opened_1">
										<td class="day_label">Fiest Name</td>
										<td class="day_value">{{$value->first_name}}</td>
									</tr>
									<tr class="opened">
										<td class="day_label">Middle Name :</td>
										<td class="day_value">{{$value->middle_name}}</td>
									</tr>
									<tr class="opened">
										<td class="day_label">Last Name :</td>
										<td class="day_value">{{$value->last_name}}</td>
									</tr>
									<tr class="opened">
										<td class="day_label">Marital Status :</td>
										<td class="day_value">{{$value->marital_status}}</td>
									</tr>
									<tr class="opened">
										<td class="day_label">Location :</td>
										<td class="day_value">{{$value->country}}</td>
									</tr>
									<tr class="closed">
										<td class="day_label"> Current State :</td>
										<td class="day_value closed"><span>{{$value->state}}</span></td>
									</tr>
									<tr class="closed">
										<td class="day_label">Education :</td>
										<td class="day_value closed"><span>Engineering</span></td>
									</tr>
								<!-- <tr class="closed">
									<td class="day_label">Education :</td>
									<td class="day_value closed"><span><img src="{{asset('profiles/' . $value->profile)}}"></span></td>
								</tr> -->

							</tbody>
						</table>
						<ul class="login_details">
							<li>Already a member? <a href="login.html">Login Now</a></li>
							<li>If not a member? <a href="register.html">Register Now</a></li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
				<!-- ====================update profile  button================================ -->
				<div class="col_4">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
							
							<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Proposal Req</a></li>
							<li role="presentation"><a href="#profile1" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile1">Incomming Req</a></li>
							<li role="presentation"><a href="#accept_req" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile1">Accept Req</a></li>

							<li role="presentation"><a href="#recently_view" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile1">Recently View</a></li>

							
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
								<div class="tab_box">
									<h1>I Am Looking Best Partener</h1>
									<p>kindness, sense of humor, attractiveness, or reliability...</p>
								</div>
								<div class="basic_1">
									<h3>Basics & Lifestyle</h3>
									<div class="col-md-6 basic_1-left">
										<table class="table_working_hours">
											<tbody>
												<tr class="opened_1">
													<td class="day_label">Name :</td>
													<td class="day_value">{{$value->first_name}} - {{$value->last_name}}</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Marital Status :</td>
													<td class="day_value">{{$value->marital_status}}</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Mother Tongue :</td>
													<td class="day_value">{{$value->mother_tounge}}</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Marital Status :</td>
													<td class="day_value">{{$value->marital_status}}</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Height :</td>
													<td class="day_value">{{$value->height}}</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Physical Status :</td>
													<td class="day_value closed"><span>{{$value->physical_status}}</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Profile Created by :</td>
													<td class="day_value closed"><span>{{$value->bride_groom}}</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Drink :</td>
													<td class="day_value closed"><span>{{$value->drink}}</span></td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="col-md-6 basic_1-left">
										<table class="table_working_hours">
											<tbody>
												<tr class="opened_1">
													<td class="day_label">Age :</td>
													<td class="day_value">{{$value->age}}</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Birthday:</td>
													<td class="day_value">{{$value->birthday}}</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Birth State:</td>
													<td class="day_value">{{$value->state}}</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Place of Birth :</td>
													<td class="day_value closed"><span>{{$value->birth_city}}</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Current Place :</td>
													<td class="day_value closed"><span>{{$value->current_city}}</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Complexion :</td>
													<td class="day_value">{{$value->complexion}}</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Weight :</td>
													<td class="day_value">{{$value->weight}}</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Blood Group :</td>
													<td class="day_value">{{$value->blood_group}}</td>
												</tr>
										   <!--  <tr class="closed">
												<td class="day_label">Diet :</td>
												<td class="day_value closed"><span>Non-Veg</span></td>
											</tr> -->
											<tr class="closed">
												<td class="day_label">Smoke :</td>
												<td class="day_value closed"><span>{{$value->smoke}}</span></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="basic_1">
								<h3>Religious / Social & Astro Background</h3>
								<div class="col-md-6 basic_1-left">
									<table class="table_working_hours">
										<tbody>
											<tr class="opened">
												<td class="day_label">Time of Birth :</td>
												<td class="day_value">{{$value->birth_time}}</td>
											</tr>
											<tr class="opened">
												<td class="day_label">Date of Birth :</td>
												<td class="day_value">{{$value->birthday}}</td>
											</tr>
											<tr class="opened">
												<td class="day_label">Manglik :</td>
												<td class="day_value closed"><span>{{$value->manglik}}</span></td>
											</tr>
											
										</tbody>
									</table>
								</div>
								<div class="col-md-6 basic_1-left">
									<table class="table_working_hours">
										<tbody>
											<tr class="opened_1">
												<td class="day_label">Birth State:</td>
												<td class="day_value">{{$value->state}}</td>
											</tr>
											<tr class="opened_1">
												<td class="day_label">Religion :</td>
												<td class="day_value">{{$value->religion}}</td>
											</tr>
											<tr class="opened">
												<td class="day_label">Caste :</td>
												<td class="day_value">{{$value->cast}}</td>
											</tr>
											<tr class="opened">
												<td class="day_label">Sub Caste :</td>
												<td class="day_value">{{$value->sub_cast}}</td>
											</tr>
											<tr class="opened">
												<td class="day_label">Gotra:</td>
												<td class="day_value">{{$value->gotra}}</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="basic_1 basic_2">
								<h3>Education & Career</h3>
								<div class="basic_1-left">
									<table class="table_working_hours">
										<tbody>
											<tr class="opened">
												<td class="day_label"> Highest Education:</td>
												<td class="day_value">{{$value->highest_qualification}}</td>
											</tr>
											<tr class="opened">
												<td class="day_label">Passout Year :</td>
												<td class="day_value">{{$value->passout_year}}</td>
											</tr>
											<tr class="opened">
												<td class="day_label">Studied From :</td>
												<td class="day_value closed"><span>{{$value->studied_from}}</span></td>
											</tr>
											<tr class="opened">
												<td class="day_label">Occupation Detail :</td>
												<td class="day_value closed"><span>{{$value->occupation}}</span></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						@endforeach	  
						<!-- ====end first table========= -->
						<!--proposalReq list of proposed request sent by login usere -->

						<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
							@if(isset($proposal_request))
							@foreach($proposal_request as $key=>$value)
							<div class="jobs-item with-thumb">
								<div class="thumb_top">
									<div class="thumb"><a href="view_profile.html"><img src="{{asset('profiles/'.$value->profile)}}" class="img-responsive" alt=""/></a>
									</div>
									<div class="jobs_right">
										<h6 class="title"><a href="view_profile.html">{{$value->first_name}} - {{$value->id}}</a></h6>
										<ul class="top-btns">
											<li><a href="#" class="fa fa-facebook"></a></li>
											<li><a href="#" class="fa fa-twitter"></a></li>
											<li><a href="#" class="fa fa-google-plus"></a></li>
										</ul>
										<ul class="login_details1">
											<li>Last Login : 5 days ago</li>
										</ul>
										<p class="description">Age:{{$value->age}} <span class="m_1">Reliogion:</span>{{$value->religion}} | <span class="m_1">Cast</span> : {{$value->cast}} | <span class="m_1">Occupation</span> : {{$value->occupation}}<br><a href="{{route('bride_groom_details',['id'=>$value->id,'role'=>$value->role])}}" class="read-more"> full profile</a>
										</p>
										<div class="thumb_bottom">
											<a onClick="cancelRequest({{$value}})" class="photo_view cancel_request{{$value->id}}" >Cancel Request</a>
										</div>
									</div>
									<div class="clearfix"> </div>
								</div>
							</div> 	
							@endforeach 
							@endif 	  
						</div>    
						<!--incommingReq comming bride-->
						<div role="tabpanel" class="tab-pane fade" id="profile1" aria-labelledby="profile-tab">	
							@if(isset($incommingReq))
							@foreach($incommingReq as $key=>$value)
							<div class="jobs-item with-thumb">
								<div class="thumb_top">
									<div class="thumb"><a href="view_profile.html"><img src="{{asset('profiles/'.$value->profile)}}" class="img-responsive" alt=""/></a>
									</div>
									<div class="jobs_right">
										<h6 class="title"><a href="view_profile.html">{{$value->first_name}} - {{$value->id}}</a></h6>
										<ul class="top-btns">
											<li><a href="#" class="fa fa-facebook"></a></li>
											<li><a href="#" class="fa fa-twitter"></a></li>
											<li><a href="#" class="fa fa-google-plus"></a></li>
										</ul>
										<ul class="login_details1">
											<li>Last Login : 5 days ago</li>
										</ul>
										<p class="description">Age:{{$value->age}} <span class="m_1">Reliogion:</span>{{$value->religion}} | <span class="m_1">Cast</span> : {{$value->cast}} | <span class="m_1">Occupation</span> : {{$value->occupation}}<br><a href="{{route('bride_groom_details',['id'=>$value->id,'role'=>$value->role])}}" class="read-more"> full profile</a>
										</p>

										<a onClick="acceptRequest({{$value}})" class="photo_view accept_request{{$value->id}}">Accept Request</a>
										
										<a onClick="rejectRequest({{$value}})" class="photo_view reject_request{{$value->id}}">Reject Request</a>
									</div>
									<div class="clearfix"> </div>
								</div>
							</div> 	
							@endforeach 
							@endif 	  
						</div> 
						<!--Start  AcceptRequest -->
						<div role="tabpanel" class="tab-pane fade" id="accept_req" aria-labelledby="profile-tab">	
							@if(isset($acceptReq))
							@foreach($acceptReq as $key=>$value)
							<div class="jobs-item with-thumb">
								<div class="thumb_top">
									<div class="thumb"><a href="view_profile.html"><img src="{{asset('profiles/'.$value->profile)}}" class="img-responsive" alt=""/></a>
									</div>
									<div class="jobs_right">
										<h6 class="title"><a href="view_profile.html">{{$value->first_name}} - {{$value->id}}</a></h6>
										<ul class="top-btns">
											<li><a href="#" class="fa fa-facebook"></a></li>
											<li><a href="#" class="fa fa-twitter"></a></li>
											<li><a href="#" class="fa fa-google-plus"></a></li>
										</ul>
										<ul class="login_details1">
											<li>Last Login : 5 days ago</li>
										</ul>
										<p class="description">Age:{{$value->age}} <span class="m_1">Reliogion:</span>{{$value->religion}} | <span class="m_1">Cast</span> : {{$value->cast}} | <span class="m_1">Occupation</span> : {{$value->occupation}}<br><a href="{{route('bride_groom_details',['id'=>$value->id,'role'=>$value->role])}}" class="read-more"> full profile</a>
										</p>

                            	<!-- <a onClick="acceptRequest({{$value}})" class="photo_view accept_request{{$value->id}}">Accept Request</a>
                         
                            		<a onClick="rejectRequest({{$value}})" class="photo_view reject_request{{$value->id}}">Reject Request</a> -->
                            	</div>
                            	<div class="clearfix"> </div>
                            </div>
                        </div> 	
                        @endforeach 
                        @endif 	  
                    </div> 

                    <!-- End Accept Request -->

                    <!--Start  Recently View Profile -->
                    <div role="tabpanel" class="tab-pane fade" id="recently_view" aria-labelledby="profile-tab">	
                    	@if(isset($proposal_request))
                    	@foreach($recentlyViewProfile as $key=>$value)
                    	<div class="jobs-item with-thumb">
                    		<div class="thumb_top">
                    			<div class="thumb"><a href="view_profile.html"><img src="{{asset('profiles/'.$value->profile)}}" class="img-responsive" alt=""/></a>
                    			</div>
                    			<div class="jobs_right">
                    				<h6 class="title"><a href="view_profile.html">{{$value->first_name}} - {{$value->id}}</a></h6>
                    				<ul class="top-btns">
                    					<li><a href="#" class="fa fa-facebook"></a></li>
                    					<li><a href="#" class="fa fa-twitter"></a></li>
                    					<li><a href="#" class="fa fa-google-plus"></a></li>
                    				</ul>
                    				<ul class="login_details1">
                    					<li>Last Login : 5 days ago</li>
                    				</ul>
                    				<p class="description">Age:{{$value->age}} <span class="m_1">Reliogion:</span>{{$value->religion}} | <span class="m_1">Cast</span> : {{$value->cast}} | <span class="m_1">Occupation</span> : {{$value->occupation}}<br><a href="{{route('bride_groom_details',['id'=>$value->id,'role'=>$value->role])}}" class="read-more"> full profile</a>
                    				</p>

                            	<!-- <a onClick="acceptRequest({{$value}})" class="photo_view accept_request{{$value->id}}">Accept Request</a>
                         
                            		<a onClick="rejectRequest({{$value}})" class="photo_view reject_request{{$value->id}}">Reject Request</a> -->
                            	</div>
                            	<div class="clearfix"> </div>
                            </div>
                        </div> 	
                        @endforeach 
                        @endif 	  
                    </div> 

                    <!-- End Recently View Profile -->


                    <!-- =========start Proposal Req===================================== -->
						<!--   <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
							    <div class="basic_3">
							    	<h4>Family Details</h4>
							      <div class="basic_1 basic_2">
								    	<h3>Basics</h3>
								    	<div class="col-md-6 basic_1-left">
								    	  <table class="table_working_hours">
								        	<tbody>
								        		<tr class="opened">
													<td class="day_label">Father's Occupation :</td>
													<td class="day_value">Not Specified</td>
												</tr>
								        		<tr class="opened">
													<td class="day_label">Mother's Occupation :</td>
													<td class="day_value">Not Specified</td>
												</tr>
											    <tr class="opened">
													<td class="day_label">No. of Brothers :</td>
													<td class="day_value closed"><span>Not Specified</span></td>
												</tr>
											    <tr class="opened">
													<td class="day_label">No. of Sisters :</td>
													<td class="day_value closed"><span>Not Specified</span></td>
												</tr>
											 </tbody>
								          </table>
								       </div>
							       </div>
							    </div>
							</div> -->
							<!-- ==========================end Proposal Req================= -->

							<!-- ==========================start Incommming Req====================== -->

							<div role="tabpanel" class="tab-pane fade" id="profile1" aria-labelledby="profile-tab1">
								<div class="basic_1 basic_2">
									<div class="basic_1-left">
										<table class="table_working_hours">
											<tbody>
												<tr class="opened">
													<td class="day_label">Age   :</td>
													<td class="day_value">28 to 35</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Marital Status :</td>
													<td class="day_value">Single</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Body Type :</td>
													<td class="day_value closed"><span>Doesn't matter</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Complexion :</td>
													<td class="day_value closed"><span>Doesn't matter</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Height 5ft 9 in / 175cm :</td>
													<td class="day_value closed"><span>Doesn't matter</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Diet :</td>
													<td class="day_value closed"><span>Doesn't matter</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Kujadosham / Manglik :</td>
													<td class="day_value closed"><span>No</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Religion :</td>
													<td class="day_value closed"><span>Doesn't matter</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Caste :</td>
													<td class="day_value closed"><span>Doesn't matter</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Mother Tongue :</td>
													<td class="day_value closed"><span>Doesn't matter</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Education :</td>
													<td class="day_value closed"><span>Doesn't matter</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Occupation :</td>
													<td class="day_value closed"><span>Doesn't matter</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Country of Residence :</td>
													<td class="day_value closed"><span>Doesn't matter</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">State :</td>
													<td class="day_value closed"><span>Doesn't matter</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Residency Status :</td>
													<td class="day_value closed"><span>Doesn't matter</span></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="col-md-4 profile_right">

				<!-- start  Uploades Images -->
				<div>
					<form   id="upload_img_form" enctype="multipart/form-data">
			        	{{csrf_field()}}
			        	<td class="form-group">
			        		<p id="message"></p>
			        		<label onclick ="imgGallery()">Upload Img +</label>
			        		<div style="background-color:#C32143;">
			        			<input type="file" name="profile_image"  id="profile_image">
			        			
			        		</div>
			        	</td>
		       		 </form>	
				</div>
				<!-- End Uploades Images  -->
			        <div class="view_profile view_profile1">
			        	<h3>All providers For You</h3>
			        	<ul class="profile_item">
			        		<a href="#">
			        			<li class="profile_item-img">
			        				<img src="{{asset('web_assets/images/bride_groom/lawn.jpg')}}" class="img-responsive" alt=""/>
			        			</li>
			        			<li class="profile_item-desc">
			        				<h4>2458741</h4>
			        				<p>29 Yrs, 5Ft 5in Christian</p>
			        				<h5>View Full Details</h5>
			        			</li>
			        			<div class="clearfix"> </div>
			        		</a>
			        	</ul>
			        	<ul class="profile_item">
			        		<a href="#">
			        			<li class="profile_item-img">
			        				<img src="{{asset('web_assets/images/bride_groom/lawn.jpg')}}" class="img-responsive" alt=""/>
			        			</li>
			        			<li class="profile_item-desc">
			        				<h4>2458741</h4>
			        				<p>29 Yrs, 5Ft 5in Christian</p>
			        				<h5>View Full Details</h5>
			        			</li>
			        			<div class="clearfix"> </div>
			        		</a>
			        	</ul>
			        	<ul class="profile_item">
			        		<a href="#">
			        			<li class="profile_item-img">
			        				<img src="{{asset('web_assets/images/bride_groom/cat1.jpg')}}" class="img-responsive" alt=""/>
			        			</li>
			        			<li class="profile_item-desc">
			        				<h4>2458741</h4>
			        				<p>29 Yrs, 5Ft 5in Christian</p>
			        				<h5>View Full Details</h5>
			        			</li>
			        			<div class="clearfix"> </div>
			        		</a>
			        	</ul>
			        	<ul class="profile_item">
			        		<a href="#">
			        			<li class="profile_item-img">
			        				<img src="{{asset('web_assets/images/bride_groom/event.jpg')}}" class="img-responsive" alt=""/>
			        			</li>
			        			<li class="profile_item-desc">
			        				<h4>2458741</h4>
			        				<p>29 Yrs, 5Ft 5in Christian</p>
			        				<h5>View Full Details</h5>
			        			</li>
			        			<div class="clearfix"> </div>
			        		</a>
			        	</ul>
			        	<ul class="profile_item">
			        		<a href="#">
			        			<li class="profile_item-img">
			        				<img src="{{asset('web_assets/images//bride_groom/dj.jpg')}}" class="img-responsive" alt=""/>
			        			</li>
			        			<li class="profile_item-desc">
			        				<h4>2458741</h4>
			        				<p>29 Yrs, 5Ft 5in Christian</p>
			        				<h5>View Full Details</h5>
			        			</li>
			        			<div class="clearfix"> </div>
			        		</a>
			        	</ul>
			        	<ul class="profile_item">
			        		<a href="#">
			        			<li class="profile_item-img">
			        				<img src="{{asset('web_assets/images//bride_groom/cat2.jpg')}}" class="img-responsive" alt=""/>
			        			</li>
			        			<li class="profile_item-desc">
			        				<h4>2458741</h4>
			        				<p>29 Yrs, 5Ft 5in Christian</p>
			        				<h5>View Full Details</h5>
			        			</li>
			        			<div class="clearfix"> </div>
			        		</a>
			        	</ul>
			        	<ul class="profile_item">
			        		<a href="#">
			        			<li class="profile_item-img">
			        				<img src="{{asset('web_assets/images//bride_groom/make1.jpg')}}" class="img-responsive" alt=""/>
			        			</li>
			        			<li class="profile_item-desc">
			        				<h4>2458741</h4>
			        				<p>29 Yrs, 5Ft 5in Christian</p>
			        				<h5>View Full Details</h5>
			        			</li>
			        			<div class="clearfix"> </div>
			        		</a>
			        	</ul>
			        	<ul class="profile_item">
			        		<a href="#">
			        			<li class="profile_item-img">
			        				<img src="{{asset('web_assets/images//bride_groom/make2.jpg')}}" class="img-responsive" alt=""/>
			        			</li>
			        			<li class="profile_item-desc">
			        				<h4>2458741</h4>
			        				<p>29 Yrs, 5Ft 5in Christian</p>
			        				<h5>View Full Details</h5>
			        			</li>
			        			<div class="clearfix"> </div>
			        		</a>
			        	</ul>
			        </div>
		    </div>
		    <div class="clearfix"> </div>
		</div>
	</div>
</div>


<div class="map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3150859.767904157!2d-96.62081048651531!3d39.536794757966845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1408111832978"> </iframe>
</div>
<div class="footer">
	<div class="container">
		<div class="col-md-4 col_2">
			<h4>About Us</h4>
			<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris."</p>
		</div>
		<div class="col-md-2 col_2">
			<h4>Help & Support</h4>
			<ul class="footer_links">
				<li><a href="#">24x7 Live help</a></li>
				<li><a href="contact.html">Contact us</a></li>
				<li><a href="#">Feedback</a></li>
				<li><a href="faq.html">FAQs</a></li>
			</ul>
		</div>
		<div class="col-md-2 col_2">
			<h4>Quick Links</h4>
			<ul class="footer_links">
				<li><a href="privacy.html">Privacy Policy</a></li>
				<li><a href="terms.html">Terms and Conditions</a></li>
				<li><a href="services.html">Services</a></li>
			</ul>
		</div>
		<div class="col-md-2 col_2">
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
<!-- FlexSlider -->
<script defer src="{{asset('web_assets/js/jquery.flexslider.js')}}"></script>
<link rel="stylesheet" href="{{asset('web_assets/css/flexslider.css')}}" type="text/css" media="screen" />
<script>
// Can also be used with $(document).ready()
$(window).load(function() {
	$('.flexslider').flexslider({
		animation: "slide",
		controlNav: "thumbnails"
	});
	$('#self_profile_msg').hide(3000);
});


function Update_self_profile(value){
	// console.log(value.id);
	$("#up_hidden_id").val(value.id);
	$("#up_role").val(value.role);

	// val first_name =  ("value.first_name");
	 $("#up_first_name").val(value.first_name);  //setvaluein input
	 $("#up_middle_name").val(value.middle_name); 
	 $("#up_last_name").val(value.last_name); 
	 $("#up_profile").val(value.profile); 
	 // var getValueId = value.id  //getvaluein input
	}


// ajax uploaded_image && all data 
$(document).ready(function(){

	// Uploaded image gallery
	 $('#profile_image').change(function(){
        var file_data = $('#profile_image').prop('files')[0];   
        var form_data = new FormData();   
        var token = "{{csrf_token()}}";  
        form_data.append('_token', token);
        form_data.append('file', file_data);
            	// console.log(form_data);
        $.ajax({
            url: "upload_image",
            type: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData:false,
            success: function(res){
				var resData = JSON.parse(res);
				if(resData.status == 1){
					window.location = "destroy_image_gallery";
				}else{
					// $(".msg").text(resData.msg).css('color',"red");
					alert(resData.msg);
				}
            }
        });
    });

});


// ----------------------cancle request---------------------------

function cancelRequest(value){
    var id = value.id;
    var role = value.role;
    var token = "{{csrf_token()}}";
    $.ajax({
    	url:"cancel_request",
    	method:"post",
    	data:{'_token':token,'role':role,'id':id},
    	success:function(res){
          var resData = JSON.parse(res);
          var id = resData.id;
			if(resData !=null){
				$(".msg").text(resData.msg);
				// $(".cancel_request"+id).hide();
				location.reload();
			}
   		}
	});
}


function rejectRequest(value){
	var id = value.id;
	var proposed_by = value.id;
	var proposed_by_role = value.role;
	var token = "{{csrf_token()}}";
	$.ajax({
		url:"reject_request",
		method:"post",
		data:{'_token':token,'proposed_by_role':proposed_by_role,'proposed_by':proposed_by},
		success:function(res){
			var resData = JSON.parse(res);
			if(resData !=null){
				$(".msg").text(resData.msg);
				$(".reject_request"+id).hide();
				$(".accept_request"+id).hide();
				location.reload();
			}
		}
	});
}

function acceptRequest(value){
	var id = value.id;
	var proposed_by = value.id;
	var proposed_by_role = value.role;
	var token = "{{csrf_token()}}";
	$.ajax({
		url:"accept_request",
		method:"post",
		data:{'_token':token,'proposed_by_role':proposed_by_role,'proposed_by':proposed_by},
		success:function(res){
			var resData = JSON.parse(res);
			if(resData != null){
				$(".msg").text(resData.msg);
				$(".accept_request"+id).hide();
				$(".reject_request"+id).hide();
             	// $("#proposal_request").hide();
           		 // $("#request_accepted").show();
           		 location.reload();
       		}
    	}
	});
}
// show imgGallery
function imgGallery(){
	window.location = "destroy_image_gallery";
}

</script>   
</body>
</html>	


