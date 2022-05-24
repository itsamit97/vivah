@extends('layout.web_master')
@section('content')


<!-- Start Filter BrideGroom -->

<div class="banner">
  <div class="container">
    <div class="banner_info">
    		@if($errors->any())
				<center id="self_profile_msg"><h4 class="hvr-shutter-out-horizontal text-center text-danger" id="self_profile_msg">{{$errors->first()}}</h4></center>
				@endif
      <h3>Millions of verified Members</h3>
      <a href="{{route('self_profile_form')}}" class="hvr-shutter-out-horizontal" id="alert_login_id">Create your Profile</a>
    </div>
  </div>
  <div class="profile_search"  style="border-radius:40px;">
  	<div class="container wrap_1">
	  <form action="{{route('filter')}}" method="post">
	  	{{csrf_field()}}
	  	<div class="search_top">

	  		<div class="row">
			       <div class="col-sm-3">
					    <select type="select"  name="gender">
							 <option value="">* Select Gender</option>
							 <option value="female">Bride</option>
							 <option value="male">Groom</option>
						</select>
			      </div>

			      <div class="col-sm-3">
			    		<select type="select"  name="state_id">
									<option value="">* Select State</option>
									@foreach($statesTableData as $key=>$value)
	                  <option  value="{{$value->id}}">{{$value->state}}</option>
	                @endforeach 
				      </select>
			      </div>

			       <div class="col-sm-3">
			    		<select type="select"  name="marital_status_id">
								<option value="">* Select Status</option>
								 	@foreach($maritalStatusTableData as $key=>$value)
	                  <option value="{{$value->id}}">{{$value->marital_status}}</option>
	                @endforeach  
							</select>
			      </div>

			    <div class="col-sm-3">
			    	<input type="text" name="city" placeholder="Enter City">
			    </div>
  			</div>
			<!-- 
		 <div class="inline-block">
		  <label class="gender_1">I am looking for :</label>
			<div class="age_box1" name="gender" style="max-width: 100%;">
				<select type="select"  name="gender">
					<option value="">* Select Gender</option>
					<option value="Male">Bride</option>
					<option value="Female">Groom</option>
				</select>
		   </div>
	    </div> -->
		<!-- 
        <div class="inline-block">
		  			<label class="gender_1">Located In :</label>
						<div class="age_box1" name="state" style="max-width: 100%;">
								<select type="select"  name="state">
									<option value="">* Select State</option>
									<option value="maharastra">maharastra</option>
				        </select>
          </div>
        </div>
 			-->
        <!-- <div class="form-group">
        	
        	<label class="gender_1">City</label>
        	<input type="text" name="city"  class="form-control">

        </div> -->
  		 <!--      <div class="inline-block">
		 			 <label class="gender_1">Interested In :</label>
					<div class="age_box1" style="max-width: 100%; display: inline-block;">
				<select><option value="">* Select Interest</option>
					<option value="Sports &amp; Adventure">Sports &amp; Adventure</option>
					<option value="Movies &amp; Entertainment">Movies &amp; Entertainment</option>
					<option value="Arts &amp; Science">Arts &amp; Science</option>
					<option value="Technology">Technology</option>
					<option value="Fashion">Fashion</option>
               </select>
          </div>
       </div> -->
     </div>
	 <div class="inline-block">
	   <div class="age_box2" style="max-width: 220px;">
	   	<label class="gender_1">Age:</label>
	    <input class="transparent" name="age_from" placeholder="From:" style="width: 50%;" type="text" >
	   </div>
	 </div>

	  <div class="inline-block">
	   <div class="age_box2" style="max-width: 220px;">
	   	<label class="gender_1">To :</label>
	    <input class="transparent" name="age_to" placeholder="To:" style="width: 50%;" type="text" >
	   </div>
	 </div>
		<div class="submit inline-block">
		   <input id="submit-btn" class="hvr-wobble-vertical" type="submit" >
		      <!-- <input id="submit-btn" class="hvr-wobble-vertical" type="submit" value="Find Matches"> -->
		</div>
     </form>
    </div>
  </div> 
</div> 
<!-- End Filter BrideGroom -->


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
						<img src="{{asset('web_assets/images/p10.jpg')}}" alt="" class="hover-animation image-zoom-in img-responsive"/>
		             <div class="layer m_1 hidden-link hover-animation delay1 fade-in">
		                <div class="center-middle">About Him</div>
		             </div>
		             <h3><span class="m_3">Profile ID : MI-387412</span><br>28, Christian, Australia<br>Corporate</h3></a>
	          	</div>
	         </li>
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

<!-- add our story content -->
	<div id="fh5co-couple-story">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<span>We Love Each Other</span>
					 <center>
        				<label class="hvr-shutter-out-horizontal">Our Story</label>
       		   </center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-md-offset-0">
					<ul class="timeline animate-box animate_image">
						<li class="animate-box">
							<div class="timeline-badge" style="background-image:url({{asset('web_assets/images/14.jpg')}});"></div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h3 class="timeline-title">First We Meet</h3>
									<span class="date">December 25, 2015</span>
								</div>
								<div class="timeline-body">
									<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
								</div>
							</div>
						</li>
						<li class="timeline-inverted animate-box animate_image">
							<div class="timeline-badge" style="background-image:url({{asset('web_assets/images/p14.jpg')}});"></div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h3 class="timeline-title">First Date</h3>
									<span class="date">December 28, 2015</span>
								</div>
								<div class="timeline-body">
									<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
								</div>
							</div>
						</li>
						<li class="animate-box">
							<div class="timeline-badge" style="background-image:url({{asset('web_assets/images/image4.jpg')}});"></div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h3 class="timeline-title">In A Relationship</h3>
									<span class="date">January 1, 2016</span>
								</div>
								<div class="timeline-body">
									<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
								</div>
							</div>
						</li>
			    	</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- end our story content -->
	<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
		<span> April 28th, 2022 </span>
		<center>
			<label class="hvr-shutter-out-horizontal">Bride & Groom Together</label>
	   </center>
	</div>
	<!----start bride & groom together -->
	<div id="fh5co-couple">
		<div class="container">
			<div class="couple-wrap animate-box">
				<div class="couple-half">
					<div class="groom">
						<img src="{{asset('web_assets/images/14.jpg')}}" alt="groom" class="img-responsive">
					</div>
					<div class="desc-groom">
						<h3>Joefrey Mahusay</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</p>
					</div>
				</div>
				<p class="heart text-center"><i class="icon-heart2"></i></p>
				<div class="couple-half">
					<div class="bride">
						<img src="{{asset('web_assets/images/p14.jpg')}}" alt="groom" class="img-responsive">
					</div>
					<div class="desc-bride">
						<h3>Sheila Mahusay</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ----- End bride & groom together -->
	
	<!-- ==========Start Future Profile Slider========= -->
	<div class="container">
		<center>
				<label class="hvr-shutter-out-horizontal">Future Profile</label>
		   </center>
		<div class="heart-divider">
			<span class="grey-line"></span>
			<i class="fa fa-heart pink-heart"></i>
			<i class="fa fa-heart grey-heart"></i>
			<span class="grey-line"></span>
		</div>

		<div class="autoplay">
			<div>
				<img src="{{asset('web_assets/images/s3.jpg')}}"  class="hover-animation image-zoom-in img-responsive center">
				</img>
				<div class="layer m_1 hidden-link hover-animation delay1 fade-in">
				</div>
			</div>
			<div>
				<img src="{{asset('web_assets/images/2.jpg')}}"  class="hover-animation image-zoom-in img-responsive center">
				</img>
				<div class="layer m_1 hidden-link hover-animation delay1 fade-in">
				</div>
			</div>

			<div>
				<img src="{{asset('web_assets/images/3.jpg')}}" class="hover-animation image-zoom-in img-responsive center"></img>
				<div class="layer m_1 hidden-link hover-animation delay1 fade-in">
				</div>
			</div>

			<div >
				<img src="{{asset('web_assets/images/4.jpg')}}" class="hover-animation image-zoom-in img-responsive center"></img>
				<div class="layer m_1 hidden-link hover-animation delay1 fade-in">
				</div>
			</div>

			<div>
				<img src="{{asset('web_assets/images/5.jpg')}}" class="hover-animation image-zoom-in img-responsive center"></img>
				<div class="layer m_1 hidden-link hover-animation delay1 fade-in">
				</div>
			</div>

			<div class="img_style"><img src="{{asset('web_assets/images/6.jpg')}}"></img>
			</div>
		</div>
  </div>
  <!-- End future profile -->

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
			<label class="hvr-shutter-out-horizontal"><b>Why Choose 1 Vivah</b><br>1 vivah is different from other matchmaking sites because of some unique benefits that every parent will find highly useful
					1 vivah.com is one of India’s leading matrimonial websites that has helped lakhs of members find their perfect life partner.

				We believe choosing a life partner is a big and important decision, and hence work towards giving a simple and secure matchmaking experience for you and your family. Each profile registered with us goes through a manual screening process before going live on site; we provide superior privacy controls for Free; and also verify contact information of members.

				You can register for Free and search according to your specific criteria on age, height, community, profession, income, location and much more- on your computer, tablet or mobile. Regular custom mails and notifications make the process easier and take you closer to your 1 Vivah!
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

<!-- Start We Provide Services -->
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
				<h2>We Provide Services</h2>
				<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="feature-left animate-box" data-animate-effect="fadeInLeft">
					<span class="icon">
						<i class="icon-calendar"></i>
					</span>
					<div class="feature-copy">
						<h3>We Organized Events</h3>
						<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
					</div>
				</div>

				<div class="feature-left animate-box" data-animate-effect="fadeInLeft">
					<span class="icon">
						<i class="icon-image"></i>
					</span>
					<div class="feature-copy">
						<h3>Photoshoot</h3>
						<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
					</div>
				</div>

				<div class="feature-left animate-box" data-animate-effect="fadeInLeft">
					<span class="icon">
						<i class="icon-video"></i>
					</span>
					<div class="feature-copy">
						<h3>Video Editing</h3>
						<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
					</div>
				</div>

			</div>

			<div class="col-md-6 animate-box">
				<div class="fh5co-video fh5co-bg" style="background-image: url(images/img_bg_3.jpg); ">
					<a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo"><i class="icon-video2"></i></a>
					<div class="overlay"></div>
				</div>
			</div>
		</div>

		<!-- Start slider service Provider -->
		<div class="autoplay">
			<div class="col_1">
				<img src="{{asset('web_assets/images/bride_groom/lawn.jpg')}}"  class="hover-animation image-zoom-in img-responsive center "><a href="*">Provider</a>
				</img>
				<div class="layer m_1 hidden-link hover-animation delay1 fade-in">
				</div>
			</div>
			<div >
				<img src="{{asset('web_assets/images/bride_groom/cat/2.jpg')}}"  class="hover-animation image-zoom-in img-responsive center"><a href="*">Provider</a>
				</img>
				<div class="layer m_1 hidden-link hover-animation delay1 fade-in">
				</div>
			</div>

			<div >
				<img src="{{asset('web_assets/images/bride_groom/make1.jpg')}}" class="hover-animation image-zoom-in img-responsive center"><a href="*">Provider</a></img>
				<div class="layer m_1 hidden-link hover-animation delay1 fade-in">
				</div>
			</div>

			<div >
				<img src="{{asset('web_assets/images/bride_groom/event.jpg')}}" class="hover-animation image-zoom-in img-responsive center"><a href="*">Provider</a></img>
				<div class="layer m_1 hidden-link hover-animation delay1 fade-in">
				</div>
			</div>

			<div>
				<img src="{{asset('web_assets/images/bride_groom/dj.jpg')}}" class="hover-animation image-zoom-in img-responsive center"><a href="*">Provider</a></img>
				<div class="layer m_1 hidden-link hover-animation delay1 fade-in">
				</div>
			</div>

			<div class="img_style"><img src="{{asset('web_assets/images/bride_groom/dj.jpg')}}"><a href="*">Provider</a></img>
			</div>
		</div>
		<!-- End slider service Provider -->
</div>
<!-- End We Provide Services -->

<!-- Start Happy Clients -->
<div class="about_middle">
	<div class="container">
	  <h2>Happy Clients</h2>
	  <div class="about_middle-grid1">
			<div class="col-sm-6 testi_grid list-item-0">
				<blockquote class="testi_grid_blockquote">
					<figure class="featured-thumbnail">
						<img src="{{asset('web_assets/images/2.jpg')}}" class="img-responsive" alt=""/>
					</figure>
					<div>
						<a href="#">Aenean nonummy hendrerit mau phasellu porta. Fusce suscipit varius mi sed. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui.…</a>
						<div class="clearfix"></div>
					</div>
				</blockquote>
			    <small class="testi-meta"><span class="user">Eiusmod tempor incididunt</span></small>
			</div>
			<div class="col-sm-6 testi_grid list-item-1">
				<blockquote class="testi_grid_blockquote">
					<figure class="featured-thumbnail">
						<img src="{{asset('web_assets/images/3.jpg')}}" class="img-responsive" alt=""/>
					</figure>
					<div>
						<a href="#">Aenean nonummy hendrerit mau phasellu porta. Fusce suscipit varius mi sed. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui.…</a>
						<div class="clearfix"></div>
					</div>
				</blockquote>
				<small class="testi-meta1"><span class="user">Sint occaecat </span></small>
			</div>
			<div class="clearfix"> </div>
	  </div>
	  <div class="about_middle-grid2">
		<div class="col-sm-6 testi_grid list-item-0">
			<blockquote class="testi_grid_blockquote">
				<figure class="featured-thumbnail">
					<img src="{{asset('web_assets/images/2.jpg')}}" class="img-responsive" alt=""/>
				</figure>
				<div><a href="#">Aenean nonummy hendrerit mau phasellu porta. Fusce suscipit varius mi sed. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui.…</a>
				<div class="clearfix"></div>
				</div>
			</blockquote>
		    <small class="testi-meta"><span class="user">Eiusmod tempor incididunt</span></small>
		</div>
		<div class="col-sm-6 testi_grid list-item-1">
			<blockquote class="testi_grid_blockquote">
				<figure class="featured-thumbnail">
					<img src="{{asset('web_assets/images/2.jpg')}}" class="img-responsive" alt=""/>
				</figure>
				<div><a href="#">Aenean nonummy hendrerit mau phasellu porta. Fusce suscipit varius mi sed. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui.…</a>
				<div class="clearfix"></div>
				</div>
			</blockquote>
			<small class="testi-meta1"><span class="user">Sint occaecat </span></small>
		</div>
		<div class="clearfix"> </div>
	  </div>
	</div>
</div>
<!-- End Happy Clients -->


   <div class="bg">
		<div class="container"> 
			<h3>Guest Messages</h3>
			<div class="heart-divider">
				<span class="grey-line"></span>
				<i class="fa fa-heart pink-heart"></i>
				<i class="fa fa-heart grey-heart"></i>
				<span class="grey-line"></span>
            </div>
            <div class="col-sm-6">
            	<div class="bg_left">
            		<h4>But I must explain</h4>
            		<h5>Friend of Bride</h5>
            		<p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            	   <ul class="team-socials">
                    <li><a href="#"><span class="icon-social "><i class="fa fa-facebook"></i></span></a></li>
                    <li><a href="#"><span class="icon-social "><i class="fa fa-twitter"></i></span></a></li>
                    <li><a href="#"><span class="icon-social"><i class="fa fa-google-plus"></i></span></a></li>
                   </ul>
            	</div>
            </div>
            <div class="col-sm-6">
            	<div class="bg_left">
            		<h4>But I must explain</h4>
            		<h5>Friend of Groom</h5>
            		<p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            	   <ul class="team-socials">
                    <li><a href="#"><span class="icon-social "><i class="fa fa-facebook"></i></span></a></li>
                    <li><a href="#"><span class="icon-social "><i class="fa fa-twitter"></i></span></a></li>
                    <li><a href="#"><span class="icon-social"><i class="fa fa-google-plus"></i></span></a></li>
                   </ul>
            	</div>
            </div>
            <div class="clearfix"> </div>
		</div>
	</div>
	<!-- <div class="map">
	   <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3150859.767904157!2d-96.62081048651531!3d39.536794757966845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1408111832978"> </iframe>
    </div> -->
@stop