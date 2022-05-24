
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 

    
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">


 <link href="{{asset('web_assets/css/registration.css')}}" rel='stylesheet' type='text/css' />

<!-- 
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
 -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
    
  <body>
   <div class="container px-4 py-5 mx-auto">
      <div class="card card0">
          <div class="d-flex flex-lg-row flex-column-reverse">
              <div class="card card1">
                  <div class="row justify-content-center my-auto">
                      <div class="col-md-8 col-10 my-5">
                          @if (count($errors) > 0)
                           <div class = "alert alert-danger">
                              <ul>
                                 @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                 @endforeach
                              </ul>
                           </div>
                          @endif
                          <div class="row justify-content-center px-3 mb-3"> <img id="logo" src="{{asset('web_assets/images/bc_images/r1.jpg')}}"> </div>
                         <!-- <div class="logo"> <img src="{{asset('web_assets/images/bc_images/r1.jpg')}}" alt=""> </div> -->
                         <div class="text-center mt-4 name text-danger"> 1Vivah</div>
                         <form action="{{route('registration')}}" method="post">
                                {{csrf_field()}}

                              <div class="form-group">
                               <label class="form-control-label text-muted">First Name</label>
                                <input type="text" id="first_name" name="first_name" placeholder="First Name " class="form-control" required=""> 
                              </div>

                               <div class="form-group">
                               <label class="form-control-label text-muted">Last Name</label>
                                <input type="text" id="last_name" name="last_name" placeholder="Last Name" class="form-control" required=""> 
                              </div>

                               <div class="form-group">
                               <label class="form-control-label text-muted">Email</label>
                                <input type="text" id="email" name="email" placeholder="email id" class="form-control" required=""> 
                              </div>

                              
                              <div class="form-group"> 
                                <label class="form-control-label text-muted">Password</label> 
                                <input type="text" name="password" id="password"  placeholder="Password" class="form-control"  required=""> 
                              </div>

                               <div class="form-group"> 
                                <label class="form-control-label text-muted">Conf_Password</label>
                                <input type="text" name="conf_password" id="psw"  placeholder="Con Password" class="form-control"  required=""> 
                              </div>


                              <div class="form-group"> <label class="form-control-label text-muted">Many Days Service</label>
                                 <select type="select" id="how_many_days_service" name="how_many_days_service" placeholder="how Many Days Service" class="form-control" required=""> 
                                   <option value="">Select Many Days Service</option>
                                    <option value="1 month">1-Month</option>
                                    <option value="2 month">2-Month</option>
                                    <option value="2 month">5-Month</option>
                                    <option value="7 month">8-Month</option>
                                    <option value="1 Year">1-Year</option>
                                    <option value="2-Year">2-Year</option>
                                  </select>
                              </div>

                              <div class="form-group"> <label class="form-control-label text-muted">Service Price</label>
                                 <select type="select" id="how_many_days_service" name="how_many_days_service" placeholder="" class="form-control" required=""> 
                                   <option value="">Registration For</option>
                                    <option value="1 month">500</option>
                                    <option value="2 month">1000</option>
                                    <option value="2 month">2500</option>
                                  </select>
                              </div>

                               <div class="form-group">
                                   <span>Gender</span><br>
                                  <input type="radio"  name="gender" value="male" id="male">
                                   <label for="html">male</label>  
                                 <input type="radio"  name="gender" value="female" id="female">
                                   <label for="html">female</label><br>
                                </div>

                              <div class="row justify-content-center my-3 px-3"> 
                                <button type="submit" name="submit" class="btn-block btn-color">Registration</button> 
                              </div>
                              <!-- <input type="submit" name="submit"> -->
                        </form>
                          <div class="row justify-content-center my-2"> <a href="#"><small class="text-muted">Forgot Password?</small></a>
                           </div>
                      </div>
                  </div>
                  <div class="bottom text-center mb-5">
                      <p href="#" class="sm-text mx-auto mb-3">Don't have an account?<button class="btn btn-white ml-2">Create new</button></p>
                  </div>
              </div>
              <div class="card card2">
                  <div class="">
                      <h4 class="text-white text-center">Now, chat for free & registration free from 1vivah.com..!
                        Finding your perfect match just became easier</h4> <small class="text-white">1 vivah is different from other matchmaking sites because of some unique benefits that every parent will find highly useful
                     1 vivah.com is one of India’s leading matrimonial websites that has helped lakhs of members find their perfect life partner.</small>
                  </div>
              </div>
          </div>
      </div>
    </div>




<script type="text/javascript">
  
      $(document).ready(function(){

        $("#add_bride_groom_table_id").change(function(){

         var add_bride_groom_table_id  = $("#add_bride_groom_table_id").val();

          // console.log('registrationForId chack',registrationForId);

          $.ajax({
                  url:"get_gender_name/"+add_bride_groom_table_id,
                   method:"get",

                  success:function(res){
                    var resData =  JSON.parse(res);
                        // console.log(resData.data.gender);
                       var gender = resData.data.gender;

                      if(gender == 'male'){
                          // console.log(male);
                        $('#male').prop('checked', true);

                      }else if(gender == 'female'){
                          console.log(female);

                        $('#female').prop('checked',true);

                         // $('#female').prop('checked', true);
                      }

                  }

              
          });

        });
      });

</script>




  
  </body>
</html>






