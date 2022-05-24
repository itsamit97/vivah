@extends('layout.web_master')
@section('content')




	<div id="fh5co-gallery">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center  animate-box">
					<div class="container">
						<div class="row">
							<span>  </span>
						</div>
					</div>
					<br>

					<a href="{{Url()->previous()}}" method="post"><img src="{{asset('web_assets/images/icons8-left-40.png')}}" style="height:50px; width:50px; border-radius:50%; float:left; "></a> 

					@if($role == 2)
						<h2 class="hvr-shutter-out-horizontal">Groom Image</h2>
					@else
						<h2 class="hvr-shutter-out-horizontal">Bride</h2>
					@endif
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
				</div>
				@if(count($uploadeImageData) > 0 )
					
					<!-- <label style="color:red">images not uploaded</label> -->
				@else
					<center><label style="color:#C32143">Images Not Uploaded</label></center>

				@endif
			</div>
			<div class="row row-bottom-padded-md">
				<div class="col-md-12">
					<ul id="fh5co-gallery-list">
						@foreach($uploadeImageData as $key=>$value)
					<!-- 	<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url{{asset('profiles/'.$value->profile_image)}}"> 
							
								<img src="{{asset('profiles/' . $value->profile_image)}}">
								<div class="case-studies-summary">
									<span>14 Photos</span>
									<h2>Two Glas of Juice</h2>
								</div>
						
						</li> -->
										
					<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-3.jpg); ">
						<center>
							<div>
								<a href=""><img src="{{asset('self_profiles/' . $value->profile_image)}}"class="color-3">
									<div class="case-studies-summary">
										<span>{{$value->first_name}} - {{$value->last_name}} </span>
										
									</div>
								</a>

							</div>
					
						</center>
					</li>
				

        

						@endforeach	
				


					
					<!-- <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-4.jpg); ">
						<a href="#" class="color-4">
							<div class="case-studies-summary">
								<span>12 Photos</span>
								<h2>Company's Conference Room</h2>
							</div>
						</a>
					</li>

						<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-5.jpg); ">
							<a href="#" class="color-3">
								<div class="case-studies-summary">
									<span>50 Photos</span>
									<h2>Useful baskets</h2>
								</div>
							</a>
						</li>
						<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-6.jpg); ">
							<a href="#" class="color-4">
								<div class="case-studies-summary">
									<span>45 Photos</span>
									<h2>Skater man in the road</h2>
								</div>
							</a>
						</li>

						<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-7.jpg); ">
							<a href="#" class="color-4">
								<div class="case-studies-summary">
									<span>35 Photos</span>
									<h2>Two Glas of Juice</h2>
								</div>
							</a>
						</li>

						<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-8.jpg); "> 
							<a href="#" class="color-5">
								<div class="case-studies-summary">
									<span>90 Photos</span>
									<h2>Timer starts now!</h2>
								</div>
							</a>
						</li>
						<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-9.jpg); ">
							<a href="#" class="color-6">
								<div class="case-studies-summary">
									<span>56 Photos</span>
									<h2>Beautiful sunset</h2>
								</div>
							</a>
						</li> -->
					</ul>		
				</div>
			</div>
		</div>
	</div>


























@stop