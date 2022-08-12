@extends('layout.web_master')

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<style>
		.update_profile{
			/*height:160px;
			width:120px;
			border-radius:50%;  
			position: absolute;
			margin-top: -3%;
			margin-left: 3%;
			/*border-color: red;*/*/

			height:160px;
			width:120px;
			border-radius:50%;  
			position: absolute;
			margin-top: -3%;
			margin-left: 11%;
			/*border-color: red;*/

		}

		.input_cover{
			height:120px;
			width:140px;
			border-radius:50%;  
			position: absolute;
			margin-top: -5%;
			margin-left: 3%;


		}


		.hr{

			height:1px;
			border-width:0;
			color:gray;
			background-color:gray; 
			

		}


		.headder_hr{

			height:1px;
			border-width:0;
			color:gray;
			background-color:gray; 
			margin-left:20%;
			margin-right:20%;
			margin-top: 14px;
		}

		.camera1{
			margin-left:20%;
			padding-top:6%;


		}
	</style>
</head>
<body>	
		<!-- Start  All Changes Profile -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					@if($coverProfile !=null)
						<!-- camera icon && input file && cover Profile -->
						<img  src="{{asset('cover_profile/'.$coverProfile->cover_profile)}}" class="img-responsive img_cover_profile" style="width:78%; height:519px; position: relative; border-radius:10px; margin-left:119px;">
						</img>
					@else
							<img  src="{{asset('web_assets/images/bride_groom/lawn.jpg')}}" class="img-responsive img_cover_profile" style="width:78%; height:500px; position: relative; border-radius:10px; margin-left:119px;">
							</img>
							 
					@endif
							<?php
                                $sentProReq  = [];
                                $getProposedToValue = [];
                                if(Auth::User() !=null){
                                   if(Auth::User()->role == 2 && Auth::User()->groom_profile_id !=NULL){
                                       $groom_profile = DB::table('groom_profile_tbl')->where('groom_profile_id',Auth::User()->groom_profile_id)->select('id')->first();
                                       $groom_profile_id =  $groom_profile->id;

                                          //list of proposed request sent by login user
                                        $proposal_request = DB::table('proposal_request')->select('proposed_to','proposed_to_role')
                                            ->where('proposed_by_groom',$groom_profile_id)
                                          ->where('proposed_by_role',2)
                                          ->where('proposel_status',0)->get();

                                        foreach ($proposal_request as $keyReq => $valueReq) {
                                          $sentProReq[] = $valueReq->proposed_to;
                                        }

	                                }else if(Auth::User()->role == 3 && Auth::User()->bride_profile_id !=NULL){
	                                     $bride_profile = DB::table('bride_profile_tbl')->where('bride_profile_id',Auth::User()->bride_profile_id)->select('id')->first();
	                                     $bride_profile_id = $bride_profile->id;
	                                         
	                                          //list of proposed request sent by login user
	                                        $proposal_request = DB::table('proposal_request')->select('proposed_to','proposed_to_role')
	                                          ->where('proposed_by_bride',$bride_profile_id)
	                                          ->where('proposed_by_role',3)
	                                          ->where('proposel_status',0)->get();
	                                        foreach ($proposal_request as $keyReq => $valueReq) {
	                                          $sentProReq[] = $valueReq->proposed_to;
	                                        }
	                                    }    

	                             }
                            ?>

							<!--  Profile Img -->
							<img  src="{{asset('profiles/'.$brideGroomProfile->profile)}}" class="img-responsive update_profile profile" id="up_profile" ></img>

				
							<label style="margin-left:22%; font-size:15px"><b>{{$brideGroomProfile->first_name}}- {{$brideGroomProfile->last_name}}</b></label><br>

					 		<!-- cancel Request bydefault hide -->
					 		<button  type="btn" class="cancel_request" style="display:none; margin-left:250px;color:blue;"; style="color:blue" onclick="cancelRequest()">Cancel Request</button>

							 <!-- friend Request bydefault hide -->
					  		<button  type="btn" class="proposal_request proposal_request_show" style="display:none; margin-left:250px;color:blue;" >friend Request</button>
						@if(in_array($brideGroomProfile->id,$sentProReq))

							<button type="btn" style="color:blue; margin-left:251px;" onclick="cancelRequest()" class="cancel_request_hide" ><img src="{{asset('web_assets/images/icon (1).jpg')}}"style="height:30px; width:20px;">Cancel Request</button>
				    	 @else
				     	 	<button type="btn" style="color:blue; margin-left:251px;" class="proposal_request friend_request"><img src="{{asset('web_assets/images/icon (1).jpg')}}"style="height:30px; width:20px;" >Friend Request</button>
				    	 @endif

					     	<input type="hidden" name="hidden_id" value="{{$brideGroomProfile->id}}" class="hidden_id">
							 <input type="hidden" name="hidden_role" value="{{$brideGroomProfile->role}}" class="hidden_role">
							<input type="hidden" name="hidden_email" value="{{$brideGroomProfile->email}}" class="hidden_email">
					        		
						<label class="msg"></label>

						<!-- start click imgGallery show upload img pass hidden id Uploades Images -->
						<div style="margin-left:650px; margin-right:233px; margin-top: -3%;">
				        	<td class="form-group">
				        		<p id="message"></p>
				        		<div class="row">
				        			<button type="btn" style="color:blue;" onclick ="imgGallery()"><img src="{{asset('web_assets/images/8042629.jpg')}}"style="height:20px; width:20px;" onclick ="imgGallery()" id="img_gallery">Img Gallery</button>

				        			<button style="color:blue;" onclick="messanger()"><img src="{{asset('web_assets/images/msg1.jpg')}}"style="height:20px; width:20px;" >Messngengr</button>

				        		</div>
				        	</td>
						</div>
				</div>	
			</div>
		</div>			
		<hr class="headder_hr">

		<!-- End All Changes Profile -->


		<!-- INTRO DETAILS -->
		<div class="grid_3" style="padding-top:20px;">
				<div class="container">
						<div class="col-sm-3 row_2" style="height:615px; width:290px; border-radius:5px; border-style:groove; margin-left:2%; background-color:#d11d6866" float-center>
							<div >
								<label style="font-size:15px"><b>Intro For:{{$brideGroomProfile->first_name}}</b></label>
								<br>
								<label class="fa fa-user" aria-hidden="true" style="margin-left:4%">{{$brideGroomProfile->first_name}}-{{$brideGroomProfile->last_name}}</label>
								<br>
								<label class="fa fa-briefcase" style="margin-left:4%">{{$brideGroomProfile->highest_qualification}}</label>
								<br>
								<label class="fa fa-home" aria-hidden="true" style="margin-left:4%">Lives in {{$brideGroomProfile->current_city}}</label>
								<br>
								<label class="fa fa-map-marker" aria-hidden="true"  style="margin-left:4%">From {{$brideGroomProfile->birth_city}}</label>
								<br>
								<!-- <button class="btn btn-sm btn-muted" data-toggle="modal"  data-target="#update_intro_Modal" style="width:100%; margin-bottom:15px;">Edit Details</button>
								<br>
								<button class="btn btn-sm btn-muted" id="editPartnerPreferenceId" style="width:100%; margin-bottom:5px; " data-toggle="modal"  data-target="#update_patner_preferance">Edit Partner Preferance</button>

								<button class="btn btn-sm btn-muted"  style="width:100%; margin-bottom:5px;"><a href="{{route('proposal_all_request')}}">Proposal Requested</a></button> -->
								<hr>
								<div>
									@if(Auth::User()->role ==2)
										<label style="font-size:15px"><b>About Her:-</b></label>
									@else
										<label style="font-size:15px"><b>About Him:-</b></label>
									@endif
										<p>{{$brideGroomProfile->self_introduce}}</p>
								</div>	
							</div >	
						</div>	

						<!-- Details -->
						<div class="col-sm-3 row_1" style="border-style:groove; height:615px; background-color:#d11d6866">
							<li class="current-page" style="margin-left:25%;"><b>Details:</b></li>
							<center>
								<table class="table_working_hours">
									<tbody>
										<tr class="opened_1">
											<td class="day_label">First Name</td>
											<td class="day_value">{{$brideGroomProfile->first_name}}</td>
										</tr>
										<tr class="opened">
											<td class="day_label">Middle Name :</td>
											<td class="day_value">{{$brideGroomProfile->middle_name}}</td>
										</tr>
										<tr class="opened">
											<td class="day_label">Last Name :</td>
											<td class="day_value">{{$brideGroomProfile->last_name}}</td>
										</tr>
										<tr class="opened">
											<td class="day_label">Marital Status :</td>
											<td class="day_value">{{$brideGroomProfile->marital_status}}</td>
										</tr>
										<tr class="opened">
											<td class="day_label">Location :</td>
											<td class="day_value">{{$brideGroomProfile->country}}</td>
										</tr>
										<tr class="closed">
											<td class="day_label"> Current State :</td>
											<td class="day_value closed"><span>{{$brideGroomProfile->state}}</span></td>
										</tr>
										<tr class="closed">
											<td class="day_label">Education :</td>
											<td class="day_value closed"><span>{{$brideGroomProfile->highest_qualification}}</span></td>
										</tr>
									</tbody>
								</table>
									<hr>
									<div>
										<!-- <label><b>Proposal Requested:-</b></label>
										<button class="btn btn-sm btn-muted"  style="width:100%; margin-bottom:5px;"><a href="{{route('proposal_all_request')}}">Proposal Requested</a></button>
										 -->

									</div>
							</center>
						</div>

						<!-- !-- Online Matches 1 btn && friend btn list--> 
						<div class="col-sm-3 row_1" style="border-style:groove; width:540px;">
							<div style="height:50px; width:205px; border-radius:5px; border-style:groove; margin-left:11%; background-color:darkgray; padding-bottom: 30px;" float-center>
								<img src="{{asset('profiles/'.$loginGroomDetails->profile)}}"  style="width:20%; height:40px; position: relative; border-radius:5px; padding-top:2px; margin-left:6%">{{$loginGroomDetails->first_name}}- {{$loginGroomDetails->last_name}}</img>

								<div style="margin-top:10px; margin-bottom:20PX;">
									<a href="#matches1"  id="matches1" data-toggle="tab">Online Matches</a>
									<a href="#accepte" role="tab"  data-toggle="tab">Friends</a>
								</div> 
							</div>
							<br>
							<div class="row">
								<div class="col-sm-3">
									<div  id="matches1" style="overflow-y:scroll;height:500px; width:153PX; margin-left:10px;">
										<table class="table_working_hours">
											<tbody>
												@foreach($brideGroomMatchDetails as $key=>$value)
												<tr>
													<td><img src="{{asset('profiles/'.$value->profile)}}" onclick="setDetails({{$value}})" data-toggle="modal" data-target="#matchesModal"class="img-responsive" alt=""/ style="height:50px; width:50px; border-radius:50%" >{{$value->first_name}} - {{$value->last_name}}</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>

								<!-- friendlist -->
								<div class="col-sm-3 row_1"style="overflow-y:scroll;height:500px; width:245PX";>
									<div role="tabpanel" class="tab-pane fade" id="accepte" style="margin-left:80px;">
										<table class="table_working_hours">
											<tbody>
												@foreach($friendsList as $key=>$value)
												<tr>
													<td><a href="http://localhost:8000/chatify/"><img src="{{asset('profiles/'.$value->profile)}}" data-toggle="modal"  style="height:50px; width:50px; border-radius:50%" >{{$value->first_name}} - {{$value->last_name}}</a></td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>

								<label style="color:#ff005269">Service Provider</label>

								<!-- dumy service Provider Images -->
								<div class="col-sm-2" style="height:80px; width:150px; overflow-y:scroll;height:500px; width:153PX;">
							
									<li class="profile_item-img">
					    				<img src="{{asset('web_assets/images/bride_groom/lawn.jpg')}}" class="img-responsive" alt=""/>
					    			</li>

					    			<li class="profile_item-img">
					    				<img src="{{asset('web_assets/images/bride_groom/lawn.jpg')}}" class="img-responsive" alt=""/>
					    			</li>
					    			<li class="profile_item-img">
					    				<img src="{{asset('web_assets/images/bride_groom/lawn.jpg')}}" class="img-responsive" alt=""/>
					    			</li>
					    			<li class="profile_item-img">
					    				<img src="{{asset('web_assets/images/bride_groom/lawn.jpg')}}" class="img-responsive" alt=""/>
					    			</li>
					    			<li class="profile_item-img">
					    				<img src="{{asset('web_assets/images/bride_groom/lawn.jpg')}}" class="img-responsive" alt=""/>
					    			</li>
					    			<li class="profile_item-img">
					    				<img src="{{asset('web_assets/images/bride_groom/lawn.jpg')}}" class="img-responsive" alt=""/>
					    			</li>
					    			<li class="profile_item-img">
					    				<img src="{{asset('web_assets/images/bride_groom/lawn.jpg')}}" class="img-responsive" alt=""/>
					    			</li>
					    			<li class="profile_item-img">
					    				<img src="{{asset('web_assets/images/bride_groom/lawn.jpg')}}" class="img-responsive" alt=""/>
					    			</li>
								</div>

							</div>
						</div>
				</div>
		</div>	

		<!-- end grid_3 && container -->




<!-- ====================================================================workin -->

	    <!-- Start Update Patner Preferance Model -->
	    <!--   @if($partnerPreference != null)
	      	<div class="modal" id="update_patner_preferance" role="dialog">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-body">
							<h5 style="text-align:center;">Patner Preferance</h5>
		        				<form action="{{route('update_partner_preferance')}}" method="post" enctype="multipart/form-data">
		        					{{csrf_field()}}
							        	<div class="form-group"> 
			        						<input type="text" class="form-control" id="up_age" value="{{$partnerPreference->age}}"  name="age" placeholder="Enter age">
			        					</div>
										<div class="form-group"> 
											<select type="select" class="form-control" id="" name="marital_status"  required="">
												<option>Select Status</option>
												 @foreach($maritalStatusTableData as $key=>$value)
				                                  <option  value="{{$value->id}}"  @if($partnerPreference->marital_status_id == $value->id) ? selected : '' @endif >{{$value->marital_status}} </option>
				                                @endforeach 
											</select>
										</div>
			        					<div class="form-group"> 
			        						<input type="text" class="form-control" id="up_cast" value="{{$partnerPreference->cast}}" name="cast" placeholder="Enter Cast" >
			        					</div>
			        				 	
			        					<div class="form-group"> 
											<select type="select" class="form-control" id="" name="religion"  required="">
												<option>Select Status</option>
												 @foreach($religionTableData as $key=>$value)
				                                  <option  value="{{$value->id}}"  @if($partnerPreference->religion_id == $value->id) ? selected : '' @endif >{{$value->religion}} </option>
				                                @endforeach 
											</select>
										</div>
			        					<div class="form-group"> 
			        						<input type="text" class="form-control" id="education " value="{{$partnerPreference->education}}" name="education" placeholder="Enter Education">
			        					</div>

			        					<div class="form-group"> 
			        						<input type="text" class="form-control" id="occupation " value="{{$partnerPreference->occupation}}"  name="occupation" placeholder="Enter Occupation">
			        					</div>
			        					<input type="hidden" name="patner_preferance_id" id="patner_preferance_id" value="{{$partnerPreference->id}}" >
														
			        					<div class="modal-footer">
		        							<button type="submit" class="btn btn-primary">Update</button>
		        							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		        						</div>
		        				</form>	
				    	</div>
	        		</div>
	     		</div>
	    	</div>  
	     @endif -->

	 	<!-- Self Information Details && Tabs -->
	<div class="row">
		<div class="col-sm-5" style="margin-left:87px;">
			<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
					<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">About Myself</a></li>
					<li role="presentation"><a href="#family_details" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Family Details</a></li>
					<li role="presentation"><a href="#partner_preference" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile1">Partner Preference</a></li>
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
											<td class="day_value">{{$brideGroomProfile->first_name}} - {{$brideGroomProfile->last_name}}</td>
										</tr>
										<tr class="opened">
											<td class="day_label">Marital Status :</td>
											<td class="day_value">{{$brideGroomProfile->marital_status}}</td>
										</tr>
										<tr class="opened">
											<td class="day_label">Mother Tongue :</td>
											<td class="day_value">{{$brideGroomProfile->mother_tounge}}</td>
										</tr>
										<tr class="opened">
											<td class="day_label">Marital Status :</td>
											<td class="day_value">{{$brideGroomProfile->marital_status}}</td>
										</tr>
										<tr class="opened">
											<td class="day_label">Height :</td>
											<td class="day_value">{{$brideGroomProfile->height}}</td>
										</tr>
										<tr class="opened">
											<td class="day_label">Physical Status :</td>
											<td class="day_value closed"><span>{{$brideGroomProfile->physical_status}}</span></td>
										</tr>
										<tr class="opened">
											<td class="day_label">Profile Created by :</td>
											<td class="day_value closed"><span>{{$brideGroomProfile->bride_groom}}</span></td>
										</tr>
										<tr class="opened">
											<td class="day_label">Drink :</td>
											<td class="day_value closed"><span>{{$brideGroomProfile->drink}}</span></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-md-6 basic_1-left">
								<table class="table_working_hours">
									<tbody>
										<tr class="opened_1">
											<td class="day_label">Age :</td>
											<td class="day_value">{{$brideGroomProfile->age}}</td>
										</tr>
										<tr class="opened">
											<td class="day_label">Birthday:</td>
											<td class="day_value">{{$brideGroomProfile->birthday}}</td>
										</tr>
										<tr class="opened">
											<td class="day_label">Birth State:</td>
											<td class="day_value">{{$brideGroomProfile->state}}</td>
										</tr>
										<tr class="opened">
											<td class="day_label">Place of Birth :</td>
											<td class="day_value closed"><span>{{$brideGroomProfile->birth_city}}</span></td>
										</tr>
										<tr class="opened">
											<td class="day_label">Current Place :</td>
											<td class="day_value closed"><span>{{$brideGroomProfile->current_city}}</span></td>
										</tr>
										<tr class="opened">
											<td class="day_label">Complexion :</td>
											<td class="day_value">{{$brideGroomProfile->complexion}}</td>
										</tr>
										<tr class="opened">
											<td class="day_label">Weight :</td>
											<td class="day_value">{{$brideGroomProfile->weight}}</td>
										</tr>
										<tr class="opened">
											<td class="day_label">Blood Group :</td>
											<td class="day_value">{{$brideGroomProfile->blood_group}}</td>
										</tr>
									<tr class="closed">
										<td class="day_label">Smoke :</td>
										<td class="day_value closed"><span>{{$brideGroomProfile->smoke}}</span></td>
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
										<td class="day_value">{{$brideGroomProfile->birth_time}}</td>
									</tr>
									<tr class="opened">
										<td class="day_label">Date of Birth :</td>
										<td class="day_value">{{$brideGroomProfile->birthday}}</td>
									</tr>
									<tr class="opened">
										<td class="day_label">Manglik :</td>
										<td class="day_value closed"><span>{{$brideGroomProfile->manglik}}</span></td>
									</tr>
									
								</tbody>
							</table>
						</div>
						<div class="col-md-6 basic_1-left">
							<table class="table_working_hours">
								<tbody>
									<tr class="opened_1">
										<td class="day_label">Birth State:</td>
										<td class="day_value">{{$brideGroomProfile->state}}</td>
									</tr>
									<tr class="opened_1">
										<td class="day_label">Religion :</td>
										<td class="day_value">{{$brideGroomProfile->religion}}</td>
									</tr>
									<tr class="opened">
										<td class="day_label">Caste :</td>
										<td class="day_value">{{$brideGroomProfile->cast}}</td>
									</tr>
									<tr class="opened">
										<td class="day_label">Sub Caste :</td>
										<td class="day_value">{{$brideGroomProfile->sub_cast}}</td>
									</tr>
									<tr class="opened">
										<td class="day_label">Gotra:</td>
										<td class="day_value">{{$brideGroomProfile->gotra}}</td>
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
										<td class="day_value">{{$brideGroomProfile->highest_qualification}}</td>
									</tr>
									<tr class="opened">
										<td class="day_label">Passout Year :</td>
										<td class="day_value">{{$brideGroomProfile->passout_year}}</td>
									</tr>
									<tr class="opened">
										<td class="day_label">Studied From :</td>
										<td class="day_value closed"><span>{{$brideGroomProfile->studied_from}}</span></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="clearfix"> </div>
					</div>
					<br>

					<div class="basic_1 basic_2">
						<h3>Occupation</h3>
						<div class="basic_1-left">
							<table class="table_working_hours">
								<tbody>
									<tr class="opened">
										<td class="day_label">Occupation :</td>
										<td class="day_value closed"><span>{{$brideGroomProfile->occupation}}</span></td>
									</tr>

									<tr class="opened">
										<td class="day_label">Employed In:</td>
										<td class="day_value closed"><span>{{$brideGroomProfile->employed_in}}</span></td>
									</tr>

									<tr class="opened">
										<td class="day_label">Organization Name :</td>
										<td class="day_value closed"><span>{{$brideGroomProfile->organization_name}}</span></td>
									</tr>

									<tr class="opened">
										<td class="day_label">Annual Income :</td>
										<td class="day_value closed"><span>{{$brideGroomProfile->annual_income}}</span></td>
									</tr>

								</tbody>
							</table>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				
				<!-- Start Familydetails -->
				@if($familyDetails !=null)
					<div role="tabpanel" class="tab-pane fade" id="family_details" aria-labelledby="profile-tab">
						<div class="basic_3">
							<h4>Family Details</h4>
							<div class="basic_1 basic_2">
								<div class="col-md-6 basic_1-left">
									<table class="table_working_hours">
										<tbody>
											<tr class="opened">
												<td class="day_label">Father's Occupation</td>
												<td class="day_value">{{$familyDetails->father_occupation}}</td>
											</tr>
											<tr class="opened">
												<td class="day_label">Mother's Occupation :</td>
												<td class="day_value">{{$familyDetails->mother_occupation}}</td>
											</tr>
											<tr class="opened">
												<td class="day_label">Family Member:</td>
												<td class="day_value closed"><span>{{$familyDetails->family_member}}</span></td>
											</tr>
											<tr class="opened">
												<td class="day_label">Family income :</td>
												<td class="day_value closed"><span>{{$familyDetails->family_income}}</span></td>
											</tr>
											<tr class="opened">
												<td class="day_label">state :</td>
												<td class="day_value closed"><span>{{$familyDetails->state}}</span></td>
											</tr>
											<tr class="opened">
												<td class="day_label">City :</td>
												<td class="day_value closed"><span>{{$familyDetails->city}}</span></td>
											</tr>
											<tr class="opened">
												<td class="day_label">Cast :</td>
												<td class="day_value closed"><span>Buddha</span></td>
											</tr>
											<tr class="opened">
												<td class="day_label">Religion  :</td>
												<td class="day_value closed"><span>Religion </span></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				@endif
				<!-- End Familydetails -->

				<!-- Start PatnerPreference view -->
				@if($partnerPreference !=null)
					<div role="tabpanel" class="tab-pane fade" id="partner_preference" aria-labelledby="profile-tab1">
						<div class="basic_1 basic_2">
								<h3>Partner Preference</h3>
							<div class="basic_1-left">
								<table class="table_working_hours">
									<tbody>
										<tr class="opened">
											<td class="day_label">Age</td>
											<td class="day_value">{{$partnerPreference->age}}</td>
											<!-- <input type="hidden" id="patnerPreferenceAge" value="{{$partnerPreference->age}}"> -->
										</tr>
										<tr class="opened">
											<td class="day_label">Marital Status :</td>
											<td class="day_value">{{$partnerPreference->marital_status}}</td>
										</tr>
										<tr class="opened">
											<td class="day_label">Complexion:</td>
											<td class="day_value closed"><span>{{$partnerPreference->complexion}}</span></td>
										</tr>
										<tr class="opened">
											<td class="day_label">Height:</td>
											<td class="day_value closed"><span>{{$partnerPreference->height}}</span></td>
										</tr>
								
										<tr class="opened">
											<td class="day_label">state :</td>
											<td class="day_value closed"><span>{{$partnerPreference->state}}</span></td>
										</tr>
									
										<tr class="opened">
											<td class="day_label">Education :</td>
											<td class="day_value closed"><span>Doesn't matter</span></td>
										</tr>
										<tr class="opened">
											<td class="day_label">Cast:</td>
											<td class="day_value closed"><span>{{$partnerPreference->cast}}</span></td>
										</tr>
										<tr class="opened">
											<td class="day_label">religion :</td>
											<td class="day_value closed"><span>{{$partnerPreference->religion}}</span></td>
										</tr>
										<tr class="opened">
											<td class="day_label">Education :</td>
											<td class="day_value closed"><span>{{$partnerPreference->education}}</span></td>
										</tr>
										
										<tr class="opened">
											<td class="day_label">Occupation :</td>
											<td class="day_value closed"><span>{{$partnerPreference->occupation}}</span></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				@else
					<h4>PatnerPreference Not  Show</h4>
				@endif
				<!-- End PatnerPreference -->
			</div>
			</div>
		</div>
	</div>
	
	<!-- End Self Information Details && Tabs -->
		<!-- open matchesModal && show details set input details -->
		<div class="modal" id="matchesModal" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header" style="background-color:#999">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<center><label><a  class="bride_groom_details_id"><img class="img_profile" onclick="brideGroomDetails()"  alt="" style="height:80px; width:80px; border-radius:50%; color:black"></a></label></center>
						<center><label id="set_first_name">Amit Ramteke</label></center>
						<p id="msg"></p>
					</div>
					<div class="modal-body">
						<div style="height:200px; width:80%px; border-radius:5px; border-style:groove;  background-color:#5a292940; padding-bottom: 30px;">
	        				<form action="" method="post" enctype="multipart/form-data">
	        					{{csrf_field()}}
	        					<div class="form-group"> 

	        						<label type="text" id="set_age">18</label>
	        						<br>

	        						<label type="text" id="set_birthday">30, 5' 10</label>
	        						<br>

	        						<label type="text" id="set_cast">mahar</label>
	        						<br>

	        						<label  type="text" id="set_religion"></label>
									<br>

									<label type="text" id="set_highest_qualification">M.E/M.</label>
									<br>

									<label  type="text" id="occupation"></label>
									<label type="text" id="sallery">Rs. 25 - 35 Lakh, W</label>
									 <input type="hidden" name="hidden_id" class="hidden_id">
									 <input type="hidden" name="hidden_role" class="hidden_role">
	        					</div>
	        				</form>	
		        		</div>
			        </div>
	        		<div class="modal-footer">
	        			<center><button type="button" class="proposal_request" class="btn btn-default">Proposal Request</button></center>

	        		</div>
			    </div>
        	</div>
      	</div>
      <!-- end match model -->




	<script type="text/javascript">
		 // Set brideGroomMatchDetails info
		function setDetails(value) {
			// console.log('ddd',value);
			$("#set_first_name").text(value.first_name);
			$("#set_age").text(value.age);
			$("#set_cast").text(value.cast);
			$("#set_religion").html(value.religion);
			$("#set_birthday").text(value.birthday);
			$("#set_highest_qualification").text(value.highest_qualification);
			$("#set_accupation").text(value.occupation);
			$(".hidden_id").val(value.id);
			$(".hidden_role").val(value.role);
			var first_name = value.first_name;
			 var profile = "/profiles/"+value.profile;
			 $('.img_profile').attr('src', profile);
		}

		 // send proposal_request bride Groom
		$(document).ready(function(){
			$(".proposal_request").click(function(){
				var pathUrlArray = window.location.pathname.split( '/' );
				var newUrl =  "/"+pathUrlArray[1]+"/proposal_request";
				var id = $(".hidden_id").val();
				// console.log(id);
				var role = $(".hidden_role").val();
				var email = $(".hidden_email").val();
				var token = "{{csrf_token()}}";
			    $.ajax({
			        url:newUrl,
			        method:"post",
			        data:{'_token':token,'role':role,'id':id,'email':email},
			        success:function(res){
			          var resData = JSON.parse(res);
			          var id = resData.id;
			          if(resData !=null && resData.status == 200){
			            // $(".msg").text(resData.msg);
			            // $(".cancel_request"+id).show();
			            alert(resData.msg);
			          }
			          if(resData !=null && resData.status == 2){
			            // $(".msg").text(resData.msg);
			            $(".cancel_request").show();
			            $(".friend_request").hide();
			          }else if(resData !=null){
			            $("#login_msg").text(resData.login_msg);
			          }
			        }
			    });

			});
		});

			function cancelRequest(){
				var pathUrlArray = window.location.pathname.split( '/' );
				var cancelNewUrl =  "/"+pathUrlArray[1]+"/cancel_request";
			    var id = $(".hidden_id").val();
				// console.log(id);
				var role = $(".hidden_role").val();
			    var token = "{{csrf_token()}}";
			    $.ajax({
			        url: cancelNewUrl,
			        method:"post",
			        data:{'_token':token,'id':id,'role':role},
			        success:function(res){
			          // console.log('check value',res);
			          var resData = JSON.parse(res);
			            $(".proposal_request_show").show();
			            $(".cancel_request").hide();
			          var id = resData.id;

			          // if(resData !=null){
			          //   $(".msg").text(resData.msg);
			          //   $(".cancel_request"+id).hide();
			          // }
			        }
			    });
			}


	 	 // when click profile redirect brideGroomDetails
	  	function brideGroomDetails() {
			var id = $(".hidden_id").val();
			var role = $(".hidden_role").val();

			var pathUrlArray = window.location.pathname.split( '/' );
			var newUrl =  "/"+pathUrlArray[1]+"/bride_groom_details/"+id+"/"+role;
			$(".bride_groom_details_id").attr("href", newUrl);
	 	}

		//cover_profile
		$(document).ready(function() {
		    $('#img_cover').change(function(){
		        var file_data = $('#img_cover').prop('files')[0];   
		        var form_data = new FormData();   
		        var token = "{{csrf_token()}}";  
		        form_data.append('_token', token);
		        form_data.append('file', file_data);

		        $.ajax({
		            url: "upload_cover_profile",
		            type: "POST",
		            data: form_data,
		            contentType: false,
		            cache: false,
		            processData:false,
		            success: function(res){

					var resData = JSON.parse(res);
					$(".msg").text(resData.msg);
		          	var cover_profile     = "/cover_profile/"+resData.profile.cover_profile;
					$('.img_cover_profile').attr('src', cover_profile);

		            }
		        });
		    });

		    // Start Self update_profile
		    $('#update_profile').change(function(){
		        var file_data = $('#update_profile').prop('files')[0];   
		        var form_data = new FormData();   
		        var token = "{{csrf_token()}}";  
		        form_data.append('_token', token);
		        form_data.append('file', file_data);
		        $.ajax({
		            url: "update_profile",
		            type: "POST",
		            data: form_data,
		            contentType: false,
		            cache: false,
		            processData:false,
		            success: function(res){
		            	// console.log(res);
					var resData = JSON.parse(res);
					$(".msg").text(resData.msg);
		          	var profile     = "/profiles/"+resData.profile;
					$('.profile').attr('src', profile);

		            }
		        });
		    });
		     // End update_profile

		    // redirect family Details click editPartnerPreferenceId model
		    $('#editPartnerPreferenceId').click(function(){ 
				var patnerPreferenceAge = $('#up_age').val()
				if(patnerPreferenceAge == undefined || patnerPreferenceAge == null || patnerPreferenceAge == ''){
					window.location = "family_details";
				}
			});

			// Uploaded image gallery
				 // $('#profile_image').change(function(){
			  //       var file_data = $('#profile_image').prop('files')[0];   
			  //       var form_data = new FormData();   
			  //       var token = "{{csrf_token()}}";  
			  //       form_data.append('_token', token);
			  //       form_data.append('file', file_data);
			  //           	// console.log(form_data);
			  //       $.ajax({
			  //           url: "upload_image",
			  //           type: "POST",
			  //           data: form_data,
			  //           contentType: false,
			  //           cache: false,
			  //           processData:false,
			  //           success: function(res){
					// 		var resData = JSON.parse(res);
					// 		if(resData.status == 1){
					// 			window.location = "destroy_image_gallery";
					// 		}else{
					// 			// $(".msg").text(resData.msg).css('color',"red");
					// 			alert(resData.msg);
					// 		}
			  //           }
			  //       });
			  //   });
		});

		// show imgGallery
		function imgGallery(){
			// console.log('dsdsdsadd');
			var id = $("#hidden_bride_groom_id").val();
			var role = $("#hidden_role").val();
			 window.location = "/1vivah/image_gallery/"+id+"/"+role;
		}

		function messanger() {
			// console.log('chack');
			window.location = "/chatify";
		}
   </script>

</body>
</html>