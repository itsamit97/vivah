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
	<!-- start date picker using crete profile-->
	<!--   <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> -->
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<!-- end date picker -->


  <!-- new year picker -->
	<!-- 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>

	<!-- end year picker -->

<!-- start time picker cdn -->
	<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->
  <script src="{{asset('time_picker_asset/mdtimepicker.js')}}"></script>

<!-- end time picker cdn -->

<script>
		window.onscroll = function() {myFunction()};

		var header = document.getElementById("myHeader");
		var sticky = header.offsetTop;

		function myFunction() {
		  if (window.pageYOffset > sticky) {
		    header.classList.add("sticky");
		  } else {
		    header.classList.remove("sticky");
		  }
		}
</script>



<script type="text/javascript">
  $(document).ready(function(){
      // $('.your-class').slick({
      //   setting-name: setting-value
      // });
        $('.autoplay').slick({
          slidesToShow:3,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed:1000,
        });

// toaster.success('testing msg');
  

			// start animate_image
		    $(".animate_image").mouseenter(function(){
		      $(this).css("background-color","#c32143");
		    });
		    
		    $(".animate_image").mouseleave(function(){
		      $(this).css("background-color","white");
		    });
			// End animate_image

			// birthday date picker
				$(function() {
				  $('input[name="birthday"]').daterangepicker({
				    singleDatePicker: true,
				    showDropdowns: true,
				    minYear: 1901,
				    maxYear: parseInt(moment().format('YYYY'),10)
				  }, function(start, end, label) {
				    var years = moment().diff(start, 'years');
				    	$('#age').val(years);
				    // alert("You are " + years + " years old!");
				  });
				});
	});
			// end animate_image

			// start hide msg 
  $('#self_profile_msg').hide(3000);



  // new add datepicker
            $(function() {
              $('input[name="wedding_year"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'),10)
              }, function(start, end, label) {
                var years = moment().diff(start, 'years');
                alert("You're wedding"+" " + years + " years completed!");
              });
            });



  </script>
</body>
</html>	

