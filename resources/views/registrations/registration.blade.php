
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
                                    <li class="text -center text-blue">{{ $error }}</li>
                                 @endforeach
                              </ul>
                           </div>
                          @endif
                          <div class="row justify-content-center px-3 mb-3"> <img id="logo" src="{{asset('web_assets/images/bc_images/r1.jpg')}}"> </div>
                         <!-- <div class="logo"> <img src="{{asset('web_assets/images/bc_images/r1.jpg')}}" alt=""> </div> -->
                         <div class="text-center mt-4 name text-danger"> 1Vivah</div>
                         <form action="{{route('registration')}}" method="post">
                                {{csrf_field()}}

                                <div class="form-group"> <label class="form-control-label text-muted">Create Registration For</label>
                                 <select type="select" id="add_bride_groom_table_id" name="add_bride_groom_table_id" placeholder="" class="form-control" required=""> 
                                   <option value="">Registration For</option>
                                  @foreach($registrationForData as $key=>$value )
                                    
                                    <option value="{{$value->id}}">{{$value->bride_groom}}</option>
                                     
                                    @endforeach  
                                  </select>
                              </div>

                              <div class="form-group">
                               <label class="form-control-label text-muted">Email</label>
                                <input type="text" id="email" name="email"  value="{{ old('email')}}" placeholder="email id" class="form-control" required=""> 
                              </div>

                              <div class="form-group"> 
                                <label class="form-control-label text-muted">Password</label> 
                                <input type="Password" name="password" id="password" value="{{ old('password')}}" placeholder="Password" class="form-control"  required=""> 
                              </div>
                              <div class="form-group"> 
                                <label class="form-control-label text-muted">Conf Password</label>
                                <input type="Password" name="conf_password" id="psw" value="{{ old('conf_password')}}" placeholder="Con Password" class="form-control"  required=""> 
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
                  <div class="my-auto mx-md-5 px-md-5 right">
                      <h4 class="text-white">Now, chat for free & registration free from 1vivah.com..!
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
                           var gender = resData.data.gender;
                          if(gender == 'male'){
                              // console.log(male);
                            $('#male').prop('checked', true);
                          }else if(gender == 'female'){
                            $('#female').prop('checked',true);
                          }
                      }
                   });
            });
          });

    </script>
  </body>
</html>






