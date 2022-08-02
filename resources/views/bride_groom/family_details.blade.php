@extends('layout.web_master')
@section('content')

<!--  style="border-style: groove; height:auto;" -->
	
		<div class="container">
		  <h2>Modal Example</h2>
		  <!-- Trigger the modal with a button -->
		  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#familyDetails" style="float:right; margin-top:20px;">Family Details</button>

		  <!-- Modal -->
		  <div class="modal fade" id="familyDetails" role="dialog">
		    <div class="modal-dialog">
		    <form action="{{route('family_details')}}" method="post">
		    	{{csrf_field()}}
		    	<!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title" >Family Details</h4>
		        </div>
		        <div class="modal-body">
		              <p style="color:#89167a">Family Occupation.</p>
		          		<div class="form-group"> 
    						<input type="text" class="form-control" id="up"  name="mother_occupation" placeholder="Enter Mother Occupation "  required="">
    					</div>
    					<div class="form-group"> 
    						<input type="text" class="form-control" id="" name="father_occupation" placeholder="Enter Father Occupation" required="">
    					</div>
    					<p style="color:#89167a">Family Members.</p>
						<input type="checkbox" id="vehicle1" name="family_member[]" value="father">
						<label for="vehicle1"> Fatcher</label><br>
						<input type="checkbox" id="vehicle2" name="family_member[]" value="mother">
						<label for="vehicle2"> Mother</label><br>
						<input type="checkbox" id="vehicle3" name="family_member[]" value="brother">
						<label for="vehicle3">Brother</label><br>
						<input type="checkbox" id="vehicle3" name="family_member[]" value="sister">
						<label for="vehicle3">Sister</label><br><br>

						<div class="form-group"> 
    						<select type="select" class="form-control" id="" name="family_income"  required="">
    							<option>Select Family Income</option>
    							<option>Rs 1 Lakh</option>
    							<option>Rs 1 - 2 Lakh</option>
    							<option>Rs 3 Lakh</option>
    							<option>Rs 4 Lakh</option>
    							<option>Rs 5Lakh</option>
    							<option>Rs 10-15 Lakh</option>
    						</select>
    					</div>

						<div class="form-group"> 
							<select type="select" class="form-control" id="" name="states"  required="">
								<option>Select States</option>
								 @foreach($statesTableData as $key=>$value)
                                  <option  value="{{$value->id}}">{{$value->state}}</option>
                                @endforeach 
							</select>
						</div>

    					<div class="form-group"> 
    						<input type="text" class="form-control" id="" name="city" placeholder="Enter City">
    					</div>
		        </div>
		        <div class="modal-footer">
		          <button type="submit" class="btn btn-primary">Submit</button>
		           <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
		        </div>
		      </div>
		    </form>
		    </div>
		  </div>
		  
		</div>

		<!-- Alert Notification Msg -->
		<script>
			@if(Session::has('message'))
			    var type = "{{ Session::get('alert-type', 'info') }}";
			     switch(type){
			        case 'info':
			            toastr.info("{{ Session::get('message') }}");
			            break;

			        case 'warning':
			            toastr.warning("{{ Session::get('message') }}");
			            break;

			        case 'success':
			            toastr.success("{{ Session::get('message') }}");
			            break;

			        case 'error':
			            toastr.error("{{ Session::get('message') }}");
			            break;
			      }
		  @endif
		</script>
		<!-- All Service providers -->
      <div class="row">
          	<div class=" col-sm-3 view_profile view_profile1"  style="overflow-y:scroll;height:900px;    margin-left: 22px;">
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
		     <!-- End Service provider -->

		        <!-- Partner Preference Form -->
			   <div class="col-sm-6" class="patner_form_body" style="background-color:#ede2e545;border-style:groove;height:auto;border-color:#604d5900; margin-top:20px;">
					  <h2>Partner Preference</h2>
					  <form action="{{route('partner_preference')}}"class="form-horizontal" action="/action_page.php">
					    <div class="form-group">
					      <label class="control-label col-sm-2" for="Age ">Age :</label>
					      <div class="col-sm-10">
					        <input type="text" class="form-control" id="age " placeholder="Enter Age " name="age">
					      </div>
					    </div>
					    <div class="form-group"> 
					    	 <label class="control-label col-sm-2" for="marital_status ">Status :</label>
					    	<div class="col-sm-10">   
								<select type="select" class="form-control" id="" name="marital_status">
									<option>Select Marital Status</option>
	                                @foreach($maritalStatusTableData as $key=>$value)
	                                  <option value="{{$value->id}}">{{$value->marital_status}}</option>
	                                @endforeach  
								</select>
							</div>
						 </div>
					     <div class="form-group">
						      <label class="control-label col-sm-2" for="pwd">Complexion:</label>
						      <div class="col-sm-10">          
						        <input type="text" class="form-control" id="complexion" placeholder="Enter Complexion:" name="complexion">
						      </div>
					    </div>

					     <div class="form-group">
					      <label class="control-label col-sm-2" for="height">height:</label>
					      <div class="col-sm-10">          
					        <input type="text" class="form-control" id="height" placeholder="Enter Height Ex. 5 fit" name="height">
					      </div>
					    </div>

					    <div class="form-group">
					      <label class="control-label col-sm-2" for="cast">Cast:</label>
					      <div class="col-sm-10">          
					        <input type="text" class="form-control" id="cast" placeholder="Enter Cast" name="cast" required>
					      </div>
					    </div>

					    <div class="form-group">
					      <label class="control-label col-sm-2" for="religion">Religion:</label>
					      <div class="col-sm-10">          
					        <select type="select" class="form-control" id="religion" placeholder="Enter Religion" name="religion">
					        		<option>Select Religion</option>
					        	 @foreach($religionTableData as $key=>$value)
	                                  <option value="{{$value->id}}">{{$value->religion}}</option>
	                                @endforeach
	                         </select>      
					      </div>
					    </div>
						<div class="form-group"> 
							<label class="control-label col-sm-2" for="States">States:</label>
							<div class="col-sm-10"> 
								<select type="select" class="form-control" id="" name="states">
									<option>Select States</option>
									 @foreach($statesTableData as $key=>$value)
	                                  <option  value="{{$value->id}}">{{$value->state}}</option>
	                                @endforeach 
								</select>
							</div>	
						</div>
					    <div class="form-group">
					      <label class="control-label col-sm-2" for="education">Education :</label>
					      <div class="col-sm-10">          
					        <input type="text" class="form-control" id="education" placeholder="Enter Education" name="education" required>
					      </div>
					    </div>

					    <div class="form-group">
					      <label class="control-label col-sm-2" for="occupation">Occupation:</label>
					      <div class="col-sm-10">          
					        <input type="text" class="form-control" id="occupation" placeholder="Enter Occupation" name="occupation" required>
					      </div>
					    </div>

					    <div class="form-group">        
					      <div class="col-sm-offset-2 col-sm-10">
					        <div class="checkbox">
					          <label><input type="checkbox" name="remember"> Remember me</label>
					        </div>
					      </div>
					    </div>
					    <div class="form-group">        
					      <div class="col-sm-offset-2 col-sm-10">
					        <button type="submit" class="btn btn-default">Submit</button>
					      </div>
					    </div>
					  </form>
				</div>
          </div>
		




















@stop