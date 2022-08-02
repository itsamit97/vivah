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
<body ><!-- headder img --> 
		<div class="container">
			<div class="row">
				<div class="col-md-12"><!-- height: 390px; coverimg  -->
					@if($coverProfile !=null)
					<img  src="{{asset('cover_profile/'.$coverProfile->cover_profile)}}" class="img-responsive img_cover_profile" style="width:78%; height:519px; position: relative; border-radius:10px; margin-left:119px;">
					</img>

					<!-- camera icon && input file -->
					<div style="margin-left:850px;"  class="img-responsive input_cover">
						<label for="img_cover" class="fa fa-camera" style="width:150px; height:30px; border-radius:5px; border-style:groove;">Edit Cover Photo</label>
						<input type="file" name="cover_profile" id="img_cover" style="display: none; visibility:none;">
					</div>
					@else
						<img  class="img-responsive img_cover_profile" style="width:100%; height:500px; position: relative; border-radius:10px;">
						</img>
						<!-- camera icon && input file -->
						<div style="margin-left:950px;"  class="img-responsive input_cover">
							<label for="img_cover" class="fa fa-camera" style="width:150px; height:30px; border-radius:5px; border-style:groove;">Edit Cover Photo</label>
							<input type="file" name="cover_profile" id="img_cover" style="display: none; visibility:none;">
						</div>
					@endif

					<!-- update profile img-->
					<img  src="{{asset('profiles/'.$brideGroomProfile->profile)}}" class="img-responsive update_profile profile" id="up_profile" ></img>

					<div  class="img-responsive update_profile camera1">
						<label for="update_profile" class="fa fa-camera "></label>
						<input type="file" name="cover_profile" id="update_profile" style="display: none; visibility:none;">
					</div>
					<label style="margin-left:22%; font-size:15px"><b>{{$brideGroomProfile->first_name}}- {{$brideGroomProfile->last_name}}</b></label><br>
					<label style=" margin-left:22%; font-size:15px; color:s#707070">569 Friends</label>
					<label class="msg"></label>
				</div>

				<!-- Edit Cover Photo-->
				<div style="margin-left:850px;"  class="img-responsive input_cover">
					<label for="img_cover" class="fa fa-camera" style="width:150px; height:30px; border-radius:5px; border-style:groove;">Edit Cover Photo</label>
					<input type="file" name="cover_profile" id="img_cover" style="display: none; visibility:none;">
				</div>
				<!-- uploades images -->
				<div style="margin-left:650px; margin-right:233px; margin-top: -3%;">
					<form   id="upload_img_form" enctype="multipart/form-data">
			        	{{csrf_field()}}
			        	<td class="form-group">
			        		<p id="message"></p>
			        		<label>Upload Img +</label>
			        		<div style="background-color:#C32143;">
			        			<input type="file" name="profile_image"  id="profile_image">
			        			<input type="hidden" name="Profile_tbl_id"  id="Profile_tbl_id" value="{{$brideGroomProfile->id}}">
			        			<input type="hidden" name="role"  id="role" value="{{$brideGroomProfile->role}}">
			        			<input type="hidden" name="first_name" id="first_name"  value="{{$brideGroomProfile->first_name}}">
			        			<input type="hidden" name="last_name"  id="last_name"  value="{{$brideGroomProfile->last_name}}">
			        		</div>
			        	</td>
		       		 </form>	
				</div>
			</div>
		</div>
		<hr class="headder_hr">
		<!-- intro row -->
		<div class="row">
			<div class="col-sm-3" style="height:300px; width:290px; border-radius:5px; border-style:groove; margin-left:2%; background-color:#d11d6866" float-center>
				<label style="font-size:15px"><b>Intro:</b></label>
				<br>
				<label class="fa fa-user" aria-hidden="true" style="margin-left:4%">Amit Manggal Ramteke</label>
				<label class="fa fa-briefcase" style="margin-left:4%">Studied at Janta junior college Nagbhir</label>
				<label class="fa fa-home" aria-hidden="true" style="margin-left:4%">Lives in Nagpur</label>
				<br>
				<label class="fa fa-map-marker" aria-hidden="true"  style="margin-left:4%">From Nagbhir</label>
				<br>
				<button class="btn btn-sm btn-muted" data-toggle="modal"  data-target="#update_intro_Modal" style="width:100%; margin-bottom:15px;">Edit Details</button>
				<br>
				<button class="btn btn-sm btn-muted" id="editPartnerPreferenceId" style="width:100%; margin-bottom:5px; " data-toggle="modal"  data-target="#update_patner_preferance">Edit Partner Preferance</button>
			</div>	

			<!-- Details -->
			<div class="col-sm-3 row_1" style="border-style:groove; height:302px; background-color:#d11d6866">
				<li class="current-page" style="margin-left:25%;"><b>Details:</b></li>
				<center>
					<table class="table_working_hours">
						<tbody>
							<tr class="opened_1">
								<td class="day_label">Fiest Name</td>
								<td class="day_value">first_name</td>
							</tr>
							<tr class="opened">
								<td class="day_label">Middle Name :</td>
								<td class="day_value">middle_name</td>
							</tr>
							<tr class="opened">
								<td class="day_label">Last Name :</td>
								<td class="day_value">last_name</td>
							</tr>
							<tr class="opened">
								<td class="day_label">Marital Status :</td>
								<td class="day_value">marital_status</td>
							</tr>
							<tr class="opened">
								<td class="day_label">Location :</td>
								<td class="day_value">country</td>
							</tr>
							<tr class="closed">
								<td class="day_label"> Current State :</td>
								<td class="day_value closed"><span>state</span></td>
							</tr>
							<tr class="closed">
								<td class="day_label">Education :</td>
								<td class="day_value closed"><span>Engineering</span></td>
							</tr>
						</tbody>
					</table>
				</center>
			</div>

			<!-- !-- Online Matches btn && friend btn list--> 
			<div class="col-sm-3">
				<div style="height:50px; width:200px; border-radius:5px; border-style:groove; margin-left:2%; background-color:darkgray; padding-bottom: 30px;" float-center>
					<img src="{{asset('profiles/'.$brideGroomProfile->profile)}}"  style="width:20%; height:40px; position: relative; border-radius:5px; padding-top:2px; margin-left:2%">{{$brideGroomProfile->first_name}}- {{$brideGroomProfile->last_name}}</img>
					<div style="margin-top:10px;">
						<a href="#matches"  id="matches1" data-toggle="tab">Online Matches</a>
						<a href="#accepte" role="tab"  data-toggle="tab">Friends</a>
					</div> 

					<!--Matchess Bbride && groom list -->
					<div class="row">
						<div class="col-sm-6">
							<div  id="matchess" style="overflow-y:scroll;height:500px" >
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
						<div class="col-sm-1">
							<div role="tabpanel" class="tab-pane fade" id="accepte">
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
					</div>
				</div>
			</div>
			
			<!-- dumy service Provider Images -->
			<div class="col-md-3">
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
		<!-- end first row -->





















		<!-- open matchesModal && show details-->
		<div class="modal" id="matchesModal" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header" style="background-color:#999">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<center><label><a  id="bride_groom_details_id"><img class="img_profile" onclick="brideGroomDetails()"  alt=""/ style="height:80px; width:80px; border-radius:50%; color:black"></a></label></center>
						<center><label id="first_name">Amit Ramteke</label></center>
						<p id="msg"></p>
					</div>
					<div class="modal-body">
						<div style="height:200px; width:80%px; border-radius:5px; border-style:groove;  background-color:#5a292940; padding-bottom: 30px;">
	        				<form action="" method="post" enctype="multipart/form-data">
	        					{{csrf_field()}}
	        					<div class="form-group"> 

	        						<label type="text" id="age">18</label>
	        						<br>

	        						<label type="text" id="birthday">30, 5' 10</label>
	        						<br>

	        						<label type="text" id="cast">mahar</label>
	        						<br>

	        						<label  type="text" id="religion"></label>
									<br>

									<label type="text" id="highest_qualification">M.E/M.</label>
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
	        			<center><button type="button" id="proposal_request" class="btn btn-default">Proposal Request</button></center>

	        		</div>
			    </div>
        	</div>
      	</div>
      <!-- end match model -->


      <!-- update intro name details model -->
      	<div class="modal" id="update_intro_Modal" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header" style="background-color:#999">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<center><label><a  id="bride_groom_details_id"><img src="{{asset('profiles/'.$brideGroomProfile->profile)}}" onclick="brideGroomDetails()"  alt=""/ style="height:80px; width:80px; border-radius:50%; color:black"></a></label></center>
						<center><label id="first_name">Amit Ramteke</label></center>
						<p id="msg"></p>
					</div>
					<div class="modal-body">
	        				<form action="{{route('update_self_profile')}}" method="post" enctype="multipart/form-data">
	        					{{csrf_field()}}
						        	<div class="form-group"> 
		        						<input type="text" class="form-control" id="up_first_name" value="{{$brideGroomProfile->first_name}}"  name="first_name" placeholder="Enter First Name">
		        					</div>
		        					<div class="form-group"> 
		        						<input type="text" class="form-control" id="up_middle_name" value="{{$brideGroomProfile->middle_name}}" name="middle_name" placeholder="Enter Middle Name " >
		        					</div>
		        					
		        					<div class="form-group"> 
		        						<input type="text" class="form-control" id="up_last_name" value="{{$brideGroomProfile->last_name}}" name="last_name" placeholder="Enter Last Name">
		        					</div>

		        						<input type="hidden" class="form-control" id="up_hidden_id" value="{{$brideGroomProfile->id}}" name="bride_groom_id">
		        					</div>

		        					<div class="form-group"> 
		        						<input type="hidden" class="form-control" id="up_role" value="{{$brideGroomProfile->role}}"  name="bride_groom_role">
		        					</div>

		        					<div class="modal-footer">
	        							<button type="submit" class="btn btn-primary">Update</button>
	        							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	        						</div>
	        				</form>	
			    	</div>
        		</div>
     		</div>
    	</div>  

      <!-- End update intro name details model --> 
		<!-- Start Update Patner Preferance Model -->
      @if($patnerPreference != null)
      	<div class="modal" id="update_patner_preferance" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-body">
						<h5 style="text-align:center;">Patner Preferance</h5>
	        				<form action="{{route('update_patner_preferance')}}" method="post" enctype="multipart/form-data">
	        					{{csrf_field()}}
						        	<div class="form-group"> 
		        						<input type="text" class="form-control" id="up_age" value="{{$patnerPreference->age}}"  name="age" placeholder="Enter age">
		        					</div>
									<div class="form-group"> 
										<select type="select" class="form-control" id="" name="marital_status"  required="">
											<option>Select Status</option>
											 @foreach($maritalStatusTableData as $key=>$value)
			                                  <option  value="{{$value->id}}"  @if($patnerPreference->marital_status_id == $value->id) ? selected : '' @endif >{{$value->marital_status}} </option>
			                                @endforeach 
										</select>
									</div>
		        					<div class="form-group"> 
		        						<input type="text" class="form-control" id="up_cast" value="{{$patnerPreference->cast}}" name="cast" placeholder="Enter Cast" >
		        					</div>
		        				 	
		        					<div class="form-group"> 
										<select type="select" class="form-control" id="" name="religion"  required="">
											<option>Select Status</option>
											 @foreach($religionTableData as $key=>$value)
			                                  <option  value="{{$value->id}}"  @if($patnerPreference->religion_id == $value->id) ? selected : '' @endif >{{$value->religion}} </option>
			                                @endforeach 
										</select>
									</div>
		        					<div class="form-group"> 
		        						<input type="text" class="form-control" id="education " value="{{$patnerPreference->education}}" name="education" placeholder="Enter Education">
		        					</div>

		        					<div class="form-group"> 
		        						<input type="text" class="form-control" id="occupation " value="{{$patnerPreference->occupation}}"  name="occupation" placeholder="Enter Occupation">
		        					</div>
		        					<input type="hidden" name="patner_preferance_id" id="patner_preferance_id" value="{{$patnerPreference->id}}" >
													
		        					<div class="modal-footer">
	        							<button type="submit" class="btn btn-primary">Update</button>
	        							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	        						</div>
	        				</form>	
			    	</div>
        		</div>
     		</div>
    	</div>  
     @endif


	<!-- Self Information Details && Tabs -->
	<div class="row">
		<div class="col-sm-5">
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
									<tr class="opened">
										<td class="day_label">Occupation Detail :</td>
										<td class="day_value closed"><span>{{$brideGroomProfile->occupation}}</span></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				
				<!-- =========================end first table========= -->

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
												<td class="day_label">Father's Occupation :</td>
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
				@if($patnerPreference !=null)
					<div role="tabpanel" class="tab-pane fade" id="partner_preference" aria-labelledby="profile-tab1">
						<div class="basic_1 basic_2">
								<h3>Partner Preference</h3>
							<div class="basic_1-left">
								<table class="table_working_hours">
									<tbody>
										<tr class="opened">
											<td class="day_label">Age</td>
											<td class="day_value">{{$patnerPreference->age}}</td>
											<!-- <input type="hidden" id="patnerPreferenceAge" value="{{$patnerPreference->age}}"> -->
										</tr>
										<tr class="opened">
											<td class="day_label">Marital Status :</td>
											<td class="day_value">{{$patnerPreference->marital_status}}</td>
										</tr>
										<tr class="opened">
											<td class="day_label">Complexion:</td>
											<td class="day_value closed"><span>{{$patnerPreference->complexion}}</span></td>
										</tr>
										<tr class="opened">
											<td class="day_label">Height:</td>
											<td class="day_value closed"><span>{{$patnerPreference->height}}</span></td>
										</tr>
								
										<tr class="opened">
											<td class="day_label">state :</td>
											<td class="day_value closed"><span>{{$patnerPreference->state}}</span></td>
										</tr>
									
										<tr class="opened">
											<td class="day_label">Education :</td>
											<td class="day_value closed"><span>Doesn't matter</span></td>
										</tr>
										<tr class="opened">
											<td class="day_label">Cast:</td>
											<td class="day_value closed"><span>{{$patnerPreference->cast}}</span></td>
										</tr>
										<tr class="opened">
											<td class="day_label">religion :</td>
											<td class="day_value closed"><span>{{$patnerPreference->religion}}</span></td>
										</tr>
										<tr class="opened">
											<td class="day_label">Education :</td>
											<td class="day_value closed"><span>{{$patnerPreference->education}}</span></td>
										</tr>
										
										<tr class="opened">
											<td class="day_label">Occupation :</td>
											<td class="day_value closed"><span>{{$patnerPreference->occupation}}</span></td>
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



	
	<script type="text/javascript">
		 // Set brideGroomMatchDetails info
		function setDetails(value) {
			$("#first_name").text(value.first_name);
			$("#age").text(value.age);
			$("#cast").text(value.cast);
			$("#religion").html(value.religion);
			$("#birthday").text(value.birthday);
			$("#highest_qualification").text(value.highest_qualification);
			$("#accupation").text(value.occupation);
			$(".hidden_id").val(value.id);
			$(".hidden_role").val(value.role);
			var first_name = value.first_name;
			 var profile = "/profiles/"+value.profile;
			 $('.img_profile').attr('src', profile);
		}

		 // send proposal_request bride Groom
		$(document).ready(function(){
			$("#proposal_request").click(function(){
				var id = $(".hidden_id").val();
				var role = $(".hidden_role").val();
				var token = "{{csrf_token()}}";
			    $.ajax({
			        url:"proposal_request",
			        method:"post",
			        data:{'_token':token,'role':role,'id':id},
			        success:function(res){
			          var resData = JSON.parse(res);
			          var id = resData.id;
			          if(resData !=null && resData.status == 200){
			            $(".msg").text(resData.msg);
			            // $(".cancel_request"+id).show();
			            alert(resData.msg);
			          }
			          if(resData !=null && resData.status == 2){
			            $(".msg").text(resData.msg);
			            $(".cancel_request"+id).show();
			            $(".proposal_request"+id).hide();
			          }else if(resData !=null){
			            $("#login_msg").text(resData.login_msg);
			          }
			        }
			    });

			});
		});

	 	 // when click profile redirect brideGroomDetails
	  	function brideGroomDetails() {
			var id = $(".hidden_id").val();
			var role = $(".hidden_role").val();
			$("#bride_groom_details_id").attr("href", "bride_groom_details/"+id+"/"+role);
			$('#bride_groom_details_id').trigger('click');
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

   </script>
</body >
<!-- Mirrored from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_form_basic&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Jan 2017 16:50:31 GMT -->
</html>

  	<!-- </body>
  	</html>
  -->
