@extends('layout.web_master')
@section('content')

	<!-- Riview model form-->
    <div class="modal" id="update_intro_Modal" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">	
					@if($loginPprofile !=null)
					<div class="modal-header" style="background-color:#999">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<center><label><a ><img src="{{asset('profiles/'.$loginPprofile->profile)}}"   alt="" style="height:80px; width:80px; border-radius:50%; color:black"></a></label></center>
						<center><label id="first_name">{{$loginPprofile->name}}</label></center>
						<p id="msg"></p>
					</div>
					@else

					<div class="modal-header" style="background-color:#999">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<center><label><a ><img src="{{asset('web_assets/images/bride_groom/2.jpg')}}"   alt="" style="height:80px; width:80px; border-radius:50%; color:black"></a></label></center>
						<center><label id="first_name">
						xyz</label></center>
						<p id="msg"></p>
					</div>
					@endif
					<div class="modal-body">
	        				<form id="submitComment" method="post" enctype='multipart/form-data'>
	        					{{csrf_field()}}
						        	<div class="form-group"> 
		        						<input type="text" class="form-control" id="bride_name" name="bride_name" placeholder="Enter Bride Name">
		        					</div>
		        					<div class="form-group"> 
		        						<input type="text" class="form-control" id="groom_name" name="groom_name" placeholder="Enter Groom Name " >
		        					</div>
		        					<div class="form-group">
		        						<textarea rows="4" cols="50" class="form-control" name="comment" id="comment" placeholder="Enter how experience for one vivah.com" ></textarea>
                      </div>
                      <p id="commentMsg"></p>

                       <div class="form-group">
											  <label for="Bride_groom">Wedding Year:</label>
											  <input type="text" class="form-control" name="wedding_year" value="10/24/1984" />
											</div>

                      <div class="form-group">
                            <span>married</span><br>
                            <input type="radio"  name="married" value="yes" id="married">
                               <label for="html">yes</label>  
                            <input type="radio"  name="married" value="no" id="unmarried">
                               <label for="html">No</label><br>
                       </div>
               				
                 				<div class="form-group">
	                   			 <input type="file" name="image_profile" id="image_profile">
      									</div>

    										<p id="alert_msg"></p>

			        					<div class="modal-footer">
		        							<button type="submit"  class="btn btn-primary" >Submit5</button>
		        							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		        						</div>
	        				</form>		
			    	</div>
        	</div>
     		</div>
    	</div> 

	<!-- End Riview model form-->

	<!-- Riview Table-->

		<div class="grid_3">
		  <div class="container">
		   <div class="breadcrumb1">
		     <ul>
		        <a href="index.html"><i class="fa fa-home home_1"></i></a>
		        <span class="divider">&nbsp;|&nbsp;</span>
		        <li class="current-page">Viewed Profiles</li>
		     </ul>
		   </div>
		   <div class="col-md-3 col_5">
		   	 <img src="{{asset('web_assets/images/bride_groom/2.jpg')}}"  class="img-responsive" alt=""/>
		     <ul class="menu">
				<li class="item1"><h3 class="m_2">Show Profiles Created</h3>
				  <ul class="cute">
					<li class="subitem1"><a href="#">within a week (2) </a></li>
					<li class="subitem2"><a href="#">within a month (4)</a></li>
				  </ul>
				</li>
				<li class="item1"><h3 class="m_2">Profile type</h3>
				  <ul class="cute">
					<li class="subitem1"><a href="#">with Photo (3) </a></li>
				  </ul>
				</li>
				<li class="item1"><h3 class="m_2">Marital Status</h3>
				  <ul class="cute">
					<li class="subitem1"><a href="#">Unmarried (2) </a></li>
				  </ul>
				</li>
				<li class="item1"><h3 class="m_2">Mother Tongue</h3>
				  <ul class="cute">
					<li class="subitem1"><a href="#">English </a></li>
				  </ul>
				</li>
				<li class="item1"><h3 class="m_2">Education</h3>
				  <ul class="cute">
					<li class="subitem1"><a href="#">Bachelors-Engineering </a></li>
					<li class="subitem1"><a href="#">Masters-Engineering </a></li>
				  </ul>
				</li>
				<li class="item1"><h3 class="m_2">Occupation</h3>
				  <ul class="cute">
					<li class="subitem1"><a href="#">Engineer-Non IT (2) </a></li>
					<li class="subitem1"><a href="#">Software Professional (3)</a></li>
				  </ul>
				</li>
				<li class="item1"><h3 class="m_2">Physical Status</h3>
				  <ul class="cute">
					<li class="subitem1"><a href="#">Normal (2) </a></li>
				  </ul>
				</li>
				<li class="item1"><h3 class="m_2">Eating Habits</h3>
				  <ul class="cute">
					<li class="subitem1"><a href="#">Non Vegetarian (3)</a></li>
					<li class="subitem1"><a href="#">Vegetarian (2)</a></li>
				  </ul>
				</li>
				<li class="item1"><h3 class="m_2">Smoking</h3>
				  <ul class="cute">
					<li class="subitem1"><a href="#">Not Specified (3)</a></li>
				  </ul>
				</li>
				<li class="item1"><h3 class="m_2">Drinking</h3>
				  <ul class="cute">
					<li class="subitem1"><a href="#">Not Specified (3)</a></li>
					<li class="subitem1"><a href="#">Never Drinks (3)</a></li>
				  </ul>
				</li>
				<li class="item1"><h3 class="m_2">Profile Created by</h3>
				  <ul class="cute">
					<li class="subitem1"><a href="#">Self (1)</a></li>
				  </ul>
				</li>
			  </ul>
		   </div>
			  <div class="col-md-9 profile_left">
			   	 <p id="commentMsg"></p>

			     <div class="col_4">
					    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
								   <ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
									  <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Members Viewded my profile</a></li>
									  <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Privacy Settings</a></li>
								   </ul>


								   @if(Auth::User()!=null)
								   <!-- Add Review -->
								   <button class="btn btn-sm btn-muted" data-toggle="modal"  data-target="#update_intro_Modal" style="width:18%; float:right; color:#c71f1f;background-color:#1262db29; border-block-color: red;">Add Comment</button>
								   @else
								   	 <button class="btn btn-sm btn-muted" onclick="loginMsg()" style="width:18%; float:right; color:#c71f1f;background-color:#1262db29; border-block-color: red;">Add Comment</button>
								   @endif

								    
								     <!-- alertMsg -->
								    	<p id="loginMsg"></p>

										<!-- Start Riview Table-->

							  <div id="myTabContent" class="tab-content">
								  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
								    <div class="tab_box tab_box1">
								      <h1>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</h1>
								      <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution</p>
								    </div>
								    <ul class="pagination pagination_1">
								 	  <li class="active"><a href="#">1</a></li>
								 	  <li><a href="#">2</a></li>
								 	  <li><a href="#">3</a></li>
								 	  <li><a href="#">4</a></li>
								 	  <li><a href="#">5</a></li>
								 	  <li><a href="#">...</a></li>
								 	  <li><a href="#">Next</a></li>
					                </ul>
					          <div class="clearfix"> </div>

							          @foreach($riviewTableData as $key=>$value)
							            <div class="jobs-item with-thumb">
								              <div class="thumb_top">
											        <div class="thumb"><a href="jobs_single.html"><img src="{{asset('web_assets/images/bride_groom/lawn.jpg')}}"  class="img-responsive" alt=""/></a></div> 
												    <div class="jobs_right">
															<h6 class="title"><a href="view_profile.html">{{$value->bride_name}} - {{$value->groom_name}}</a></h6>
															<ul class="top-btns">
															  <li><a href="#" class="fa fa-facebook"></a></li>
															  <li><a href="#" class="fa fa-twitter"></a></li>
															  <li><a href="#" class="fa fa-google-plus"></a></li>
															</ul>
															<ul class="login_details1">
															  <li>wedding Year :  20-07-2022</li>
															</ul>
															<ul class="login_details1">
															  <li>Last Login Time : 5 days ago</li>
															</ul>
															<ul class="login_details1">
															  <li>Comment Time : 5 days ago</li>
															</ul>
															<div style="height:auto; width:302px;border-radius:5px;border-style:groove;border-block-color: red;">
																			<div class="heart-divider">
																				<span class="grey-line">{{$value->bride_name}}</span>
																				<i class="fa fa-heart pink-heart"></i>
																				<i class="fa fa-heart grey-heart"></i>
																				<span class="grey-line">{{$value->groom_name}}</span>
																					<li class="profile_item-img" style="margin-left: 10px">
													    							<img src="{{asset('success_couple_profiles/'.$value->image_profile)}}" class="img-responsive" alt=""/>
													    						</li>
																			</div>
																			{{$value->comment}}
																			Marriage is full of many ups and downs, adventures, and incredible memories with the person you love. And if you’re looking to celebrate a special event with your partner, you may be looking for the perfect quote to highlight those memories. So whether you’re looking for a quote to add to a special birthday photo book gift, quotes to add to your wedding vows, or even just what to write in an anniversary card, we’ve got you covered. Check out the marriage quotes below to celebrate your loved one on any occasion.
															</div>
													 </div>
														<!-- 	style="height:50px; width:205px; border-radius:5px; border-style:groove; margin-left:11%; background-color:darkgray; padding-bottom: 30px;" float-center -->
														<div class="clearfix"> </div>
													   </div>
													   <div class="thumb_bottom">
													   	  <div class="thumb"><a href="view_profile.html" class="photo_view">Return Comment</a></div>
													   	   <div class="thumb_but"><a href="view_profile.html" class="photo_view">Send Mail</a></div>
													   	  <div class="clearfix"> </div>
													   </div>
												</div>
											@endforeach
							 		</div> 
						  	</div>
				   </div>
			   </div>
			   <div class="clearfix"> </div>
			  </div>
		</div>

	<!--End  Riview Table-->

<script type="text/javascript">
	
	$(document).ready(function(){
			// Married Alert Msg
	  	$("#married").click(function(){
	   	 $('#married').val('yes');  
				var married = $("#married").val();
				if(married == 'yes'){
					$("#alert_msg").html('Pleas Upload Togather Profile').css("color","red");
					$('#unmarried').val('');  
				}
	   	});

			// Unmarried Alert Msg
	   $("#unmarried").click(function(){
	   	 $('#unmarried').val('no');  
			var unmarried = $("#unmarried").val();
			if(unmarried == 'no'){
          $("#alert_msg").html('Pleas Upload Your Profile').css("color","red");
          $('#married').val('');  
			}
	   });

	   	// Upload Image With Input Data
	   	 $(document).on('submit', '#submitComment',function(e) {
	   	 	// console.log('eddhiubwh huih uiehiuh');
	   	 	// $("#button_sub").click(function(e){
	   	 		// if(Auth ::User()!=null){
 				 		e.preventDefault();
 				 			 var form_data = new FormData($("#submitComment")[0]);   
 							  var token = "{{csrf_token()}}";  
			      	  form_data.append('_token', token);
 				 			  $.ajax({
			            url:"riview_one_vivah",
			            type:"POST",
			            data: form_data,
			            contentType: false,
			            // cache: false,
			            processData:false,
				         	 success: function(res){
												var resData = JSON.parse(res);

													$(".commentMsg").text(resData.msg).css('color',"red");
							      }
 			 					});
	   	 		// }else{
	   	 		// 	$(".commentMsg").text('Please Login First').css('color',"red");

	   	 		// }
	   	 });


  });





	function loginMsg(){
		// console.log('chak msg');
	$("#loginMsg").html('Please Login First').css('color',"red");

	}












</script>



    














@stop

