@extends('layout.web_master')
@section('content')
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
        <ul>
            <a href="{{Url()->previous()}}" method="post"><img src="{{asset('web_assets/images/icons8-left-40.png')}}" style="height:50px; width:50px; border-radius:50%; color:red"></a>
             <br>
            <a href="index.html"><i class="fa fa-home home_1"></i></a>
            <span class="divider">&nbsp;|&nbsp;</span>
            <li class="current-page">Success couple 1 Vivah.com</li>
        </ul>
   </div>
   <div class="col-md-3 col_5">
        <ul class="match_box">
        <!-- <h3 style="black">Success couple <br>1 Vivah.com</h3> --> 
        <img src="{{asset('web_assets/images/s1.jpg')}}" class="img-responsive hover-animation image-zoom-in" alt=""/ style="border: 5px solid #B22222; border-style: outset; height:170px; width:170px">
        <img src="{{asset('web_assets/images/bride_groom/2.jpg')}}" class="img-responsive" alt=""/>
        <img src="{{asset('web_assets/images/bride_groom/3.jpg')}}" class="img-responsive" alt=""/>
        <img src="{{asset('web_assets/images/bride_groom/4.jpg')}}" class="img-responsive" alt=""/>
        <img src="{{asset('web_assets/images/bride_groom/bride_groom2.jpg')}}" class="img-responsive" alt=""/>
        <img src="{{asset('web_assets/images/bc_images/bc.jpg')}}" class="img-responsive" alt=""/>
        <img src="{{asset('web_assets/images/2.jpg')}}" class="img-responsive" alt=""/>
    </ul>
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
    <div class="col-md-9 members_box2">
      <h3>Matches Profiles</h3>
         @if (count($errors) > 0)
           <div class = "alert alert-primary">
              <ul>
                 @foreach ($errors->all() as $error)
                    <li class="text -center text-blue">{{ $error }}</li>
                 @endforeach
              </ul>
           </div>
          @endif
      @if($errors->any())
        <h4>{{$errors->first()}}</h4>
      @endif
      <label>being deeply loved by someone gives you strength while loving someone  deeply gives you corage</label>
       <div>
           <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
                 <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">All</a></li>
                 <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">New</a></li>
                 <li role="presentation"><a href="#profile1" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Read</a></li>
                 <li role="presentation"><a href="#profile2" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Accepted</a></li>
                 <li role="presentation"><a href="#profile2" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Not Interested</a></li>
              </ul>
                <div id="myTabContent" class="tab-content">
                     <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
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
                             <!-- <p class="msg" style="color:#C32143;"></p> -->
                             <h id="login_msg" style="color:#C32143;"></h>

                            <?php
                                $sentProReq  = [];
                                $incommingProReq  = [];
                                $reqAccepted = [];
                                $reqAcceptedByGroom = [];
                                $reqAcceptedByBride = [];

                                $getProposedToValue = [];
                                if(Auth::User() !=null){
                                   if(Auth::User()->role == 2 && Auth::User()->groom_profile_id !=NULL){
                                       $groom_profile = DB::table('groom_profile_tbl')->where('groom_profile_id',Auth::User()->groom_profile_id)->select('id')->first();
                                       $groom_profile_id =  $groom_profile->id;

                                          //list of proposed request sent by login user
                                        $proposal_request = DB::table('proposal_request')->select('proposed_to','proposed_to_role')
                                            ->where('proposed_by_groom',$groom_profile_id)
                                          ->where('proposed_by_role',2)
                                          ->where('proposel_status',0)->get();

                                        foreach ($proposal_request as $keyReq => $valueReq) {
                                          $sentProReq[] = $valueReq->proposed_to;
                                        }

                                        //list of incomming frined requests
                                         $incommingReq = DB::table('proposal_request')->select('proposed_by_bride','proposed_by_role')
                                         ->where('proposed_to',$groom_profile_id)
                                        ->where('proposed_to_role',2)
                                        ->where('proposel_status',0)->get();
                                        foreach ($incommingReq as $keyIncReq => $valueIncReq) {
                                          $incommingProReq[] = $valueIncReq->proposed_by_bride;
                                        }

                                        $proposal_accepted_by_groom = DB::table('proposal_request')->select('proposed_to','proposed_by_role','proposed_by_bride')
                                          ->where('proposed_to',$groom_profile_id)
                                          ->where('proposed_to_role',2)
                                          ->where('proposel_status',1)
                                          ->get();
                                        foreach ($proposal_accepted_by_groom as $keyReq => $valueReq) {
                                          $reqAcceptedByGroom[] = $valueReq->proposed_by_bride;
                                        }

                                        $proposal_accepted_by_bridge = DB::table('proposal_request')->select('proposed_to','proposed_to_role','proposed_to')
                                            ->where('proposed_by_groom',$groom_profile_id)
                                          ->where('proposed_by_role',2)
                                          ->where('proposel_status',1)->get();
                                        foreach ($proposal_accepted_by_bridge as $keyReq => $valueReq) {
                                          $reqAcceptedByBride[] = $valueReq->proposed_to;
                                        }

                                  }else if(Auth::User()->role == 3 && Auth::User()->bride_profile_id !=NULL){
                                     $bride_profile = DB::table('bride_profile_tbl')->where('bride_profile_id',Auth::User()->bride_profile_id)->select('id')->first();
                                     $bride_profile_id = $bride_profile->id;
                                         
                                          //list of proposed request sent by login user
                                          $proposal_request = DB::table('proposal_request')->select('proposed_to','proposed_to_role')
                                            ->where('proposed_by_bride',$bride_profile_id)
                                          ->where('proposed_by_role',3)
                                          ->where('proposel_status',0)->get();
                                        foreach ($proposal_request as $keyReq => $valueReq) {
                                          $sentProReq[] = $valueReq->proposed_to;
                                        }

                                    //list of incomming frined requests
                                      $incommingReq = DB::table('proposal_request')->select('proposed_by_groom','proposed_by_role')
                                        ->where('proposed_to',$bride_profile_id)
                                        ->where('proposed_to_role',3)
                                        ->where('proposel_status',0)->get();
                                        foreach ($incommingReq as $keyIncReq => $valueIncReq) {
                                          $incommingProReq[] = $valueIncReq->proposed_by_groom;
                                        }

                                         $proposal_accepted_by_groom = DB::table('proposal_request')->select('proposed_to','proposed_to_role','proposed_to')
                                          ->where('proposed_by_bride',$bride_profile_id)
                                          ->where('proposed_by_role',3)
                                          ->where('proposel_status',1)
                                          ->get();
                                        foreach ($proposal_accepted_by_groom as $keyReq => $valueReq) {
                                          $reqAcceptedByGroom[] = $valueReq->proposed_to;
                                        }

                                        $proposal_accepted_by_bridge = DB::table('proposal_request')->select('proposed_to','proposed_by_role','proposed_by_groom')
                                          ->where('proposed_to',$bride_profile_id)
                                          ->where('proposed_to_role',3)
                                          ->where('proposel_status',1)->get();
                                        foreach ($proposal_accepted_by_bridge as $keyReq => $valueReq) {
                                          $reqAcceptedByBride[] = $valueReq->proposed_by_groom;
                                        }
                                        
                                  }
                                }
                            ?>
                                 <!-- style="background-color:#C32143;" -->
                              <!-- ---------------------star foreach---------------------------- -->
                            @foreach($brideGroomFilterData as $key=>$value)
                                     <!-- <p class="msg" style="color:#C32143;"></p> -->
                                <!-- //start- this below link added because a href were not working for bridge -->
                                <a href="/" class="read-more">.</a>
                                <!-- //start- this below link added because a href were not working for bridge -->
                               <div class="jobs-item with-thumb">
                                    <div class="thumb_top">
                                       <div class="thumb"><a href="view_profile.html"><img src="{{asset('profiles/'.$value->profile)}}" class="img-responsive" alt=""/ style="border: 5px solid #B22222; border-style: groove;"></a>
                                       </div>
                                           <div class="jobs_right">
                                                <h6 class="title"><a href="view_profile.html">{{$value->first_name}} - {{$value->id}}</a></h6>
                                                
                                                <ul class="login_details1">
                                                   <li>Last Login : 5 days ago</li>
                                                </ul>
                                                <p class="description">Age:{{$value->age}} <span class="m_1">Reliogion:</span>{{$value->religion}} | <span class="m_1">Cast</span> : {{$value->cast}} | <span class="m_1">Occupation</span> : {{$value->occupation}}<br><a href="{{route('bride_groom_details',['id'=>$value->id,'role'=>$value->role])}}" class="read-more">{{$value->first_name}}'s About Info</a>
                                                </p>
                                                <!-- <a href="{{route('testing_profile')}}">profile</a> -->
                                            </div>
                                            <div class="clearfix"> </div>
                                    </div>
                                     <!-- //show proposed request button only if proposal req is not sent by login user or incommig request is not comming to login user -->
                                    @if( !in_array($value->id,$sentProReq) && !in_array($value->id,$incommingProReq) )
                                        <!-- //dont show propose request if already friends -->
                                       @if( !in_array($value->id,$reqAcceptedByBride) && !in_array($value->id,$reqAcceptedByGroom))
                                           <div class="thumb_bottom">
                                            <a onClick="proposalRequest({{$value}})" class="photo_view proposal_request{{$value->id}}">Proposal Request</a>
                                           </div>
                                       @else
                                           <div class="thumb_bottom">
                                               <div class="thumb"><a  class="photo_view btn-success" style="width:130px">{{Auth::User()->name}}Friends</a></div>
                                            </div>
                                        @endif

                                    @endif
                                    @if(in_array($value->id,$getProposedToValue))
                                         $proposal_request_status = DB::table('proposal_request')->select('proposel_status')
                                         ->where('proposed_by_bride',$bride_profile_id)
                                         ->where('proposed_by_role',3)
                                         ->where('proposed_to',$value->id)
                                         ->first();
                                         @if($proposal_request_status->proposel_status == 0)
                                         <a class="photo_view" id="proposal_request">Proposal Requested</a>
                                         @elseif($proposal_request_status->proposel_status == 1)
                                         <a class="photo_view" id="proposal_request">Proposal Acceptedddd</a>
                                        @endif
                                     
                                    @endif
                                        <div class="thumb">
                                            <a onClick="cancelRequest({{$value}})" class="photo_view cancel_request{{$value->id}}" style="display: none">Cancel Request</a>

                                            @if(in_array($value->id,$sentProReq))
                                              <a onClick="cancelRequest({{$value}})" class="photo_view cancel_request{{$value->id}}">Cancel Request1</a>
                                            @endif

                                            @if(in_array($value->id,$incommingProReq))
                                              <a onClick="acceptRequest({{$value}})" class="photo_view accept_request{{$value->id}}">Accept Request</a>
                                             
                                              <a onClick="rejectRequest({{$value}})" class="photo_view reject_request{{$value->id}}">Reject Request</a>
                                            @endif
                                      </div>
                                      <div class="thumb_but"><a  href="http://ivishesh.com/chatify/" class="photo_view">Messenger</a>
                                      </div>
                                      <div class="clearfix"> </div>
                                       @endforeach  
                                </div>
                                <!-- href="http://localhost:8000/chatify/" -->
                    </div>
                           
                </div>
            </div>
        </div>
  </div>
    </div>
   <div class="clearfix"> </div>
  </div>
</div>

<div class="map">
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3150859.767904157!2d-96.62081048651531!3d39.536794757966845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1408111832978"> </iframe>
</div>

<script type="text/javascript">

 function proposalRequest(value){
    // console.log('check value',value);
    var id = value.id;
    var role = value.role;
    var email = value.email;
    var first_name  = value.first_name;
    var last_name = value.last_name;
    var token = "{{csrf_token()}}";
    $.ajax({
        url:"proposal_request",
        method:"post",
        data:{'_token':token,'role':role,'id':id,'email':email,'first_name':first_name,'last_name':last_name},
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
            // $("#login_msg").text(resData.login_msg);
            // $("#login_msg").text(resData.login_msg);

            alert(resData.login_msg);
          }
        }
    });
  }








// ----------------------cancle request---------------------------

function cancelRequest(value){
    // console.log('check value',value);
    var id = value.id;
    var role = value.role;
    var token = "{{csrf_token()}}";
    $.ajax({
        url:"cancel_request",
        method:"post",
        data:{'_token':token,'role':role,'id':id},
        success:function(res){
          // console.log('check value',res);
          var resData = JSON.parse(res);
          // console.log('check value',resData);
          var id = resData.id;
          // console.log('check id',id);

          if(resData !=null){
            $(".msg").text(resData.msg);
            $(".cancel_request"+id).hide();
          }
        }
    });
  }


  function rejectRequest(value){
    var id = value.id;
    var proposed_by = value.id;
    var proposed_by_role = value.role;
    var token = "{{csrf_token()}}";
    $.ajax({
      url:"reject_request",
      method:"post",
      data:{'_token':token,'proposed_by_role':proposed_by_role,'proposed_by':proposed_by},
      success:function(res){
        var resData = JSON.parse(res);
        if(resData !=null){
          $(".msg").text(resData.msg);
          $(".reject_request"+id).hide();
          $(".accept_request"+id).hide();
        }
      }
    });
  }

  function acceptRequest(value){
    var id = value.id;
    var proposed_by = value.id;
    var proposed_by_role = value.role;
    var token = "{{csrf_token()}}";
    $.ajax({
      url:"accept_request",
      method:"post",
      data:{'_token':token,'proposed_by_role':proposed_by_role,'proposed_by':proposed_by},
      success:function(res){
        var resData = JSON.parse(res);
        if(resData != null){
          $(".msg").text(resData.msg);
          $(".accept_request"+id).hide();
          $(".reject_request"+id).hide();
             // $("#proposal_request").hide();
            // $("#request_accepted").show();
        }
      }
    });
  }

</script>

@stop

