@extends('layout.web_master')
@section('content')
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.html"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">New Matches</li>
     </ul>
   </div>
   <div class="col-md-9 profile_left2">
   	<h4 style="">Matches Profile</h4>
  <!--    <form>
	  <div class="form_but2">
		<label class="col-md-2 control-lable1" for="sex">Don't Show : </label>
		<div class="col-md-10 form_radios">
			<input type="checkbox" class="radio_1"> Don't show already viewed &nbsp;&nbsp;&nbsp;
			<input type="checkbox" class="radio_1" checked="checked"> Don't show already contacted &nbsp;&nbsp;&nbsp;
			<input type="checkbox" class="radio_1" checked="checked"> Show profiles with photo
		</div>
		<div class="clearfix"> </div>
	  </div>
	 </form> -->
	@foreach($filterGroom as $key=>$value)	 
	 <div class="profile_top"><a href="view_profile.html">
      <h2>254879 | Profile Created for self</h2>
	    <div class="col-sm-3 profile_left-top">
	    	<img src="{{asset('web_assets/images/a5.jpg')}}" class="img-responsive" alt=""/>
	    </div>
	    <div class="col-sm-3">
	      <ul class="login_details1">
			 <li>Last Login : 5 days ago</li>
			 <li><p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor." More....</p></li>
		  </ul>
	    </div>
	    <div class="col-sm-6">
	    	<table class="table_working_hours">
	        	<tbody>
	        		<!-- @foreach($filterGroom as $key=>$value) -->
	        		<tr class="opened_1">
						<td class="day_label1">Age / Height :</td>
						<td class="day_value">{{$value->name}}</td>
					</tr>


				    <tr class="opened">
						<td class="day_label1">Last Login :</td>
						<td class="day_value">4 hours ago</td>
					</tr>
				    <tr class="opened">
						<td class="day_label1">Religion :</td>
						<td class="day_value">Sikh</td>
					</tr>
				    <tr class="opened">
						<td class="day_label1">Marital Status :</td>
						<td class="day_value">Single</td>
					</tr>
				    <tr class="opened">
						<td class="day_label1">Location :</td>
						<td class="day_value">India</td>
					</tr>
				    <tr class="closed">
						<td class="day_label1">Profile Created by :</td>
						<td class="day_value closed"><span>Self</span></td>
					</tr>
				    <tr class="closed">
						<td class="day_label1">Education :</td>
						<td class="day_value closed"><span>Engineering</span></td>
					</tr>
					<!-- @endforeach -->
			    </tbody>
		   </table>
		   <div class="buttons">
			   <div class="vertical">Send Mail</div>
			   <div class="vertical">Shortlisted</div>
			   <div class="vertical">Send Interest</div>
		   </div>

	    </div>
	    <div class="clearfix"> </div>
    </a>
  </div>

@endforeach
    
</div>

<div class="map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3150859.767904157!2d-96.62081048651531!3d39.536794757966845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1408111832978"> </iframe>
</div>
@stop
