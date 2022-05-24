@extends('layout.web_master')
@section('content')



<div class="grid_3">
   <div class="container">
       <div class="breadcrumb1">
         <ul>
            <a href="index.html"><i class="fa fa-home home_1"></i></a>
            <span class="divider">&nbsp;|&nbsp;</span>
            <!-- Start Registration Profile form  &&  -->
              <div class="container-fluid">
                <form action="{{route('self_profile_create')}}" method="post" enctype='multipart/form-data'> 
                  {{csrf_field()}}

               <!--  <div class="row">
                  <div class="col-lg-12 " style="background-color:lavender;">Registration</div>
                </div> -->
                 <br>
               
                <!-- first div personal information -->
                <div>

                  @if($errors->any())
                  <h4 id="self_profile_msg">{{$errors->first()}}</h4>
                  @endif
                      <h4 style="color: rgb(237, 47, 89);">
                    <i class="fa fa-edit"></i>&nbsp;Personal Information</h4>
                      <!--  start first row -->
                    <div class="row">
                      <div class="col-sm-3 "><label for="first_name">First Name :</label> <input type="text" class="form-control"name="first_name" id="first_name" placeholder="Enter First Name ">
                      </div>

                      <div class="col-sm-3 "><label for="middle_name">Middle Name:</label> <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Enter Middle Name">
                      </div>

                      <div class="col-sm-3 "><label for="last_name">Last Name:</label> <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter Last Name">
                      </div>
                      <div class="col-sm-3 ">
                          <div class="age_box1">
                            <lable for="first_name"><b>Marital Status :</b></lable>
                              <select type="select" name="marital_status_id" class="form-control" required="">
                                  <option value="">* Select Status</option>
                                @foreach($maritalStatusTableData as $key=>$value)
                                  <option value="{{$value->id}}">{{$value->marital_status}}</option>
                                @endforeach  
                              </select>
                         </div>
                      </div>
                    </div>
                      <!-- end first row -->
                    <div class="row">
                        <div class="col-sm-3"><lable for="first_name"><b>Date Of Birth:</b></lable><input type="text" class="form-control" name="birthday" value="10/24/1984" / required=""></div>

                        <div class="col-sm-3 ">
                          <div class="age_box1">
                            <lable for="first_name"><b>Birth State:</b></lable>
                              <select type="select" name="birth_state_id" class="form-control" required="">
                                <option value="">* Select State</option>
                               @foreach($statesTableData as $key=>$value)
                                  <option  value="{{$value->id}}">{{$value->state}}</option>
                                @endforeach 
                              </select>
                         </div>
                       </div>

                        <div class="col-sm-3"><lable for="birth_city"><b>Birth City:</b></lable><input type="text" class="form-control" name="birth_city"  placeholder="Enter Birth City" /></div>

                        <div class="col-sm-3"><lable for="birth_name"><b>Birth Name:</b></lable><input type="text" class="form-control" name="birth_name"placeholder="Enter Birth Name" /></div>

                    </div>

                     <div class="row">
                        <div class="col-sm-6"><lable for="first_name"><b>Birth Time:</b></lable><input type="text" class="form-control" name="birth_time" id="timepicker" placeholder="Enter Birth Time" /></div>

                        <!-- <div class="col-sm-4"><lable for="email"><b>Email:</b></lable><input type="text" class="form-control" name="email"placeholder="Enter Email" /></div> -->

                        <div class="col-sm-6">
                          <lable for="mobile_no"><b>Mobile No:</b></lable>
                          <input type="text" class="form-control" name="mobile_no"placeholder="Enter Mobile No" />
                        </div>
                        <!-- <input type="text" id="timepicker"/> -->
                    </div>

                    <div class="row">
                        <div>
                          <label>Manglik</label>
                          <div class="radio">
                              <label><input type="radio" name="manglik" value="manglik_yes">Yes</label>
                          </div>
                          <div class="radio">
                              <label><input type="radio" name="manglik" value="manglik_no">No</label>
                          </div>
                        </div>
                    </div>
                </div>
                 <br>

                <!-- End Persional div Information -->
                <!-- Start Religion & Ethnicity div-->
                <div>
                   <h4 style="color: rgb(237, 47, 89);">
                   <i class="fa fa-file-text-o"></i>&nbsp;Religion &amp; Ethnicity</h4>
                    <div class="row">
                     <div class="col-sm-4 ">
                        <div class="age_box1">
                          <lable for="mother_tongue"><b>Religion:</b></lable>
                            <select type="text" name="religion_id" class="form-control" required="">
                              <option value="">* Select State</option>
                               @foreach($religionTableData as $key=>$value)
                                  <option value="{{$value->id}}">{{$value->religion}}</option>
                                @endforeach 
                            </select>
                        </div>
                       </div>
                        <div class="col-sm-4"><lable for="cast"><b>Cast:</b></lable><input type="text" class="form-control" name="cast" placeholder="Enter Cast" />
                        </div>

                        <div class="col-sm-4"><lable for="mother_tounge"><b>Mother Tongue:</b></lable><input type="text" class="form-control" name="mother_tounge"placeholder="Ex.Hindi,Marathi,Eng" />
                        </div>

                        <div class="col-sm-6"><lable for="sub_cast"><b>Sub Caste :</b></lable><input type="text" class="form-control" name="sub_cast"placeholder="Sub Caste " />
                        </div>

                        <div class="col-sm-6"><lable for="gotra"><b>Gotra:</b></lable><input type="text" class="form-control" name="gotra"placeholder="Gotra" />
                        </div>
                    </div>
                </div>
                 <br>

                <!-- End Religion & Ethnicity div-->
                 <div class="row">
                    <h4 style="color: rgb(237, 47, 89);">
                    <i class="fa fa-map-marker"></i>&nbsp;Current Location</h4>
                   
                    <div class="col-sm-4 ">
                          <div class="age_box1">
                            <lable for="country"><b>Country:</b></lable>
                              <select type="text" class="form-control" name="country">
                                <option value="">* Select </option>
                                <option value="india">India</option>
                              </select>
                         </div>
                    </div>
                     <div class="col-sm-4">
                          <div class="age_box1">
                            <lable for="state"><b>State:</b></lable>
                              <select type="text" name="current_state_id" class="form-control" required="">
                                <option value="">* Select State</option>
                                @foreach($statesTableData as $key=>$value)
                                  <option  value="{{$value->id}}">{{$value->state}}</option>
                                @endforeach 
                              </select>
                         </div>
                    </div>
                    <div class="col-sm-4"><lable for="current_city"><b>City:</b></lable><input type="text" class="form-control" name="current_city"placeholder="City" />
                    </div>

                 </div>
                 <br>
                 <!-- Start Ligal documents  -->
                  <div class="row">
                      <h4 style="color: rgb(237, 47, 89);">
                      <i class="fa fa-picture-o"></i>&nbsp;Legal Documents</h4>
                      <div class="col-sm-4"><lable for="profile"><b>Self Profile:</b></lable><input type="file" class="form-control" name="profile"placeholder="Self Profil" enctype="multipart/form-data"  />
                      </div>

                      <div class="col-sm-4"><lable for="proof_identity"><b>Proof Identity:</b></lable><input type="file" class="form-control" name="proof_identity"placeholder="oof Identity" enctype="multipart/form-data"  />
                      </div>

                      <div class="col-sm-4"><lable for="proof_address"><b>Proof of Address:</b></lable><input type="file" class="form-control" name="proof_address" enctype="multipart/form-data" placeholder="oof Identity" / required="">
                      </div>

                  </div>
                  <br>

                  <div class="row">
                      <h4 style="color: rgb(237, 47, 89);">
                      <i class="fa fa-address-book-o"></i>&nbsp;Basics & Lifestyle</h4>
                        <div class="col-sm-3">
                          <div class="age_box1">
                            <lable for="state"><b>Body Type:</b></lable>
                              <select type="text" name="body_type" class="form-control">
                                <option value="">* Body Type</option>
                                  <option  value="fat">Fat</option>
                                  <option  value="slim">Slim</option>
                                  <option  value="medium">Medium</option>
                              </select>
                          </div>
                       </div>
                      <div class="col-sm-3"><lable for="complexion"><b>Complexion:</b></lable><input type="text" class="form-control" name="complexion"placeholder="Ex. fair, black," />
                     </div>

                      <div class="col-sm-3"><lable for="weight "><b>Weight :</b></lable><input type="text" class="form-control" name="weight"placeholder="Weight " />
                     </div>

                      <div class="col-sm-3"><lable for="height"><b>Height:</b></lable><input type="text" class="form-control" name="height"placeholder="Ex.  5 Ft 7 In" />
                     </div>

                     <div class="col-sm-3"><lable for="physical_status"><b>Physical Status:</b></lable><input type="text" class="form-control" name="physical_status"placeholder="Physical Status" />
                     </div>

                       <div class="col-sm-3"><lable for="blood_group"><b>Blood Group:</b></lable><input type="text" class="form-control" name="blood_group"placeholder="Blood Group" />
                     </div>

                       <div class="col-sm-3"><lable for="drink"><b>Drink:</b></lable><input type="text" class="form-control" name="drink"placeholder="Yes & No" />
                     </div>

                      <div class="col-sm-3"><lable for="smoke "><b>Smoke :</b></lable><input type="text" class="form-control" name="smoke"placeholder="Smoke " />
                     </div>

                      <div class="col-sm-3"><lable for="age"><b>Age:</b></lable><input type="text" class="form-control" name="age" id="age" placeholder="Age" />
                     </div>
                    
                  </div>
                  <br>
                    <div class="row">
                      <h4 style="color: rgb(237, 47, 89);">
                      <i class="fa fa-edit"></i>&nbsp;Education Info</h4>

                      <div class="col-sm-4"><lable for="highest_qualification"><b>Highest Qualification:</b></lable><input type="text" class="form-control" name="highest_qualification"placeholder="Highest Qualification" />
                     </div>

                       <!-- <input type="text" name="year" id="datepicker1"/> -->

                      <!--   <input type="text" class="form-control" name="datepicker" id="datepicker" /> -->


                      <div class="col-sm-4"><lable for="passout"><b>Year of pass :</b></lable><input type="text" class="form-control" name="passout_year" id="passout_year" / placeholder="ear of pass ">
                     </div>

                     <div class="col-sm-4"><lable for="height"><b>Education From:</b></lable><input type="text" class="form-control" name="studied_from" placeholder="tudied From">
                     </div>
                  </div>
                    <br>
                   <div class="row">
                      <h4 style="color: rgb(237, 47, 89);">
                      <i class="fa fa-edit"></i>&nbsp;Occupation</h4>
                      <div class="col-sm-4"><lable for="occupation"><b>Occupation:</b></lable><input type="text" class="form-control" name="occupation" placeholder="Occupation">
                      </div>
                      <div class="col-sm-4" ><lable for="gotra"><b>submit All Details:</b></lable>
                       <input type="submit" class="hvr-wobble-vertical" type="submit">
                    </div>

                   </div>

                 
                </form>
              </div>
              <!-- End Fluid -->
         </ul>
       </div> 
   </div>
</div>




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

<!-- year picker  &&  date picker in  footer code -->
<script>
    $(document).ready(function(){
      $("#passout_year").datepicker({
         format: "yyyy",
         viewMode: "years", 
         minViewMode: "years",
         autoclose:true
      }); 

      // <!-- time picker -->
      $('#timepicker').mdtimepicker({
            // format of the time value (data-time attribute)
            timeFormat: 'hh:mm:ss.000', 

            // format of the input value
            format: 'h:mm tt',      

            // theme of the timepicker
            // 'red', 'purple', 'indigo', 'teal', 'green', 'dark'
            theme: 'blue',        

            // determines if input is readonly
            readOnly: true,       

            // determines if display value has zero padding for hour value less than 10 (i.e. 05:30 PM); 24-hour format has padding by default
            hourPadding: false,

            // determines if clear button is visible  
            clearBtn: false
          }); 
    })
</script>













@stop