<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\MaritalStatus;
use App\StateModel;
use App\Religion;
use Auth;
use App\GroomProfile;
use App\BrideProfile;
use Redirect;

use App\User;
use App\RecentlyViewProfile;
use App\UploadeImage;
use App\ProposalRequest;
use Mail;
use App\Mail\proposal_request_mail;
use Image;
use App\CoverProfile;
// use App\CoverProfile;
use App\FamilyDetails;
use App\implode;
use App\PartnerPreference;
use App\Http\Controllers\BrideGroomController;
class FilterController extends Controller
{
    // FilterBrideGroom matchesProfileView
    public function matchesProfileView(){
     return view('bride_groom/matches_profile');
    }
    public function FilterBrideGroom(Request $request){
        if ($request->gender !=null){
            if($request->gender == 'male'){
                $brideGroomFilterData = GroomProfile::leftjoin('marital_status','groom_profile_tbl.marital_status_tbl_id','=','marital_status.id')
                ->leftjoin('states','groom_profile_tbl.birth_state_tbl_id','=','states.id')
                ->leftjoin('religions','groom_profile_tbl.religion_tbl_id','=','religions.id')
                // ->leftjoin('proposal_request','groom_profile_tbl.id','=','proposal_request.proposed_by_groom')
                // ->where('current_state_tbl_id',$request->state_id)
                ->whereBetween('age',[$request->age_from, $request->age_to])
                // ->where('marital_status_tbl_id',$request->marital_status_id)
                // ->where('birth_city',$request->city)

                ->orWhere('current_state_tbl_id','like', '%' .$request->state_id . '%')
                ->orWhere('marital_status_tbl_id', 'like', '%' . $request->marital_status_id . '%')
                ->orWhere('birth_city', 'like', '%' . $request->city . '%')

                 ->select('groom_profile_tbl.*','marital_status.marital_status','states.state','religions.religion')
                ->get();
                if(count($brideGroomFilterData) > 0){
                    return view('bride_groom/matches_profile',['brideGroomFilterData'=>$brideGroomFilterData]);
                }else{
                     return redirect()->route('index')->withErrors(['msg' => 'Matches Data Not Fount']);
                }
            }else{
                // BrideProfile
                $brideGroomFilterData = BrideProfile::leftjoin('marital_status','bride_profile_tbl.marital_status_tbl_id','=','marital_status.id')
                ->leftjoin('states','bride_profile_tbl.birth_state_tbl_id','=','states.id')
                ->leftjoin('religions','bride_profile_tbl.religion_tbl_id','=','religions.id')
                // ->leftjoin('proposal_request','bride_profile_tbl.id','=','proposal_request.proposed_by_bride')
                // ->where('current_state_tbl_id',$request->state_id)
                ->whereBetween('age',[$request->age_from, $request->age_to])
                // ->where('marital_status_tbl_id',$request->marital_status_id)
                // ->where('birth_city',$request->city)
                ->orWhere('current_state_tbl_id','like', '%' .$request->state_id . '%')
                ->orWhere('marital_status_tbl_id', 'like', '%' . $request->marital_status_id . '%')
                ->orWhere('birth_city', 'like', '%' . $request->city . '%')
                 ->select('bride_profile_tbl.*','marital_status.marital_status','states.state','religions.religion')
                ->get();
                if(count($brideGroomFilterData) > 0){
                    return view('bride_groom/matches_profile',['brideGroomFilterData'=>$brideGroomFilterData]);
                }else{
                       return redirect()->route('index')->withErrors(['msg' => 'Matches Data Not Fount']);
                }
            }
        }else{
              $notification = array(
                'message' => 'Please Fill Filter Box!',
                'alert-type' => 'warning'
            );
            return redirect()->route('index')->with($notification);
        }
    }  

    // brideGroomDetails when click full profile in filter matchesProfileView && Bride_groom:$id & role
    public function brideGroomDetails($id, $role){
        if(Auth::User() != null){
          $groomGroomId  = $this->brideGroomId();
            if((Auth::User()->bride_profile_id != null || Auth::User()->groom_profile_id != null)){
                  $recentlyViewProfile = new RecentlyViewProfile;
                        $recentlyViewProfile->visitor_user_id =$groomGroomId->id;
                        $recentlyViewProfile->visitor_role = Auth::User()->role;
                        $recentlyViewProfile->visited_id = $id;
                        $recentlyViewProfile->visited_role = $role;
                        $recentlyViewProfile->save();
                if($role == 2){
                        // $recentlyViewProfile = new RecentlyViewProfile;
                        // $recentlyViewProfile->visitor_user_id =$groomGroomId->id;
                        // $recentlyViewProfile->visitor_role = Auth::User()->role;
                        // $recentlyViewProfile->visited_id = $id;
                        // $recentlyViewProfile->visited_role = $role;
                        // $recentlyViewProfile->save();
                    $friendsList = ProposalRequest::leftjoin('groom_profile_tbl','proposal_request.proposed_to','=','groom_profile_tbl.id')
                        ->select('proposal_request.*','groom_profile_tbl.first_name','groom_profile_tbl.last_name','groom_profile_tbl.profile')
                         ->where('proposal_request.proposed_by_bride',$groomGroomId->id)
                        ->where('proposal_request.proposed_by_role',Auth::User()->role)
                        ->where('proposal_request.proposel_status',1)->get();

                    $loginGroomDetails = BrideProfile::leftjoin('marital_status','bride_profile_tbl.marital_status_tbl_id','=','marital_status.id')
                        ->leftjoin('states','bride_profile_tbl.birth_state_tbl_id','=','states.id')
                        ->leftjoin('religions','bride_profile_tbl.religion_tbl_id','=','religions.id')
                        ->leftjoin('registration_brides_tbl','bride_profile_tbl.reg_bride_tbl_id','=','registration_brides_tbl.id')
                        ->leftjoin('genders','registration_brides_tbl.add_bride_groom_table_id','genders.id')
                        // ->leftjoin('uploaded ','groom_profile_tbl.id','=','uploaded .bride_groom_profile_id')
                        ->where('bride_profile_tbl.role',Auth::User()->role)
                        ->where('bride_profile_tbl.bride_profile_id',Auth::User()->bride_profile_id)
                        ->select('bride_profile_tbl.age','bride_profile_tbl.cast','bride_profile_tbl.weight','bride_profile_tbl.height','marital_status.marital_status','states.state','religions.religion','bride_profile_tbl.first_name','bride_profile_tbl.last_name','bride_profile_tbl.profile')
                        ->first();
                    $brideGroomMatchDetails = GroomProfile::leftjoin('marital_status','groom_profile_tbl.marital_status_tbl_id','=','marital_status.id')
                        ->leftjoin('states','groom_profile_tbl.birth_state_tbl_id','=','states.id')
                        ->leftjoin('religions','groom_profile_tbl.religion_tbl_id','=','religions.id')
                       ->orwhere('age',$loginGroomDetails->age)
                       ->orwhere('age',$loginGroomDetails->cast)
                       ->orwhere('weight',$loginGroomDetails->weight)
                       ->orwhere('height',$loginGroomDetails->height)
                       ->orwhere('marital_status',$loginGroomDetails->marital_status)
                       ->orwhere('state',$loginGroomDetails->state)
                       ->orwhere('religion',$loginGroomDetails->religion)
                        ->select('groom_profile_tbl.*','marital_status.marital_status','states.state','religions.religion')
                        ->get();
                    $coverProfile = CoverProfile::where('bride_groom_profile_id',$id)
                        ->where('bride_groom_profile_role',$role)
                        ->select('cover_profile')
                        ->first();
                    $brideGroomProfile = GroomProfile::leftjoin('marital_status','groom_profile_tbl.marital_status_tbl_id','=','marital_status.id')
                        ->leftjoin('states','groom_profile_tbl.birth_state_tbl_id','=','states.id')
                        ->leftjoin('religions','groom_profile_tbl.religion_tbl_id','=','religions.id')
                        ->where('groom_profile_tbl.id',$id)
                        ->where('groom_profile_tbl.role',$role)
                        ->select('groom_profile_tbl.*','marital_status.marital_status','states.state','religions.religion')
                        ->first();
                    $partnerPreference = PartnerPreference::leftjoin('marital_status','partner_preference.marital_status_id','=','marital_status.id')
                        ->leftjoin('states','partner_preference.state_id','=','states.id')
                        ->leftjoin('religions','partner_preference.religion_id','=','religions.id')
                        ->where('bride_groom_id',$id)
                        ->where('bride_groom_role',$role)
                        ->first();
                    $familyDetails = FamilyDetails::leftjoin('states','family_details.state_id','=','states.id')
                        ->where('bride_groom_id',$id)
                        ->where('bride_groom_role',$role)
                        ->first();
                    $maritalStatusTableData  = MaritalStatus::get();
                    $statesTableData  = StateModel::get();
                    $religionTableData  = Religion::get();
                     return view('bride_groom/bride_groom_details',['friendsList'=>$friendsList,'brideGroomMatchDetails'=>$brideGroomMatchDetails,'coverProfile'=>$coverProfile,'brideGroomProfile'=>$brideGroomProfile,'partnerPreference'=>$partnerPreference,'familyDetails'=>$familyDetails,'maritalStatusTableData'=>$maritalStatusTableData,'religionTableData'=>$religionTableData,'loginGroomDetails'=>$loginGroomDetails]);
                }elseif(Auth::User() !=null && $role == 3){
                    $bride_profile_id =  $this->getLogedInProfileId();
                    // login user online matche info
                    $friendsList = ProposalRequest::leftjoin('groom_profile_tbl','proposal_request.proposed_by_groom','=','groom_profile_tbl.id')
                        ->leftjoin('bride_profile_tbl','proposal_request.proposed_to','=','bride_profile_tbl.id')
                        ->select('proposal_request.*','groom_profile_tbl.first_name','groom_profile_tbl.last_name','groom_profile_tbl.profile','groom_profile_tbl.id','bride_profile_tbl.first_name','bride_profile_tbl.last_name')
                        ->where('proposal_request.proposed_by_groom',$bride_profile_id)
                        ->where('proposal_request.proposed_by_role',Auth::User()->role)
                        ->where('proposal_request.proposel_status',1)->get();

                    $loginGroomDetails = GroomProfile::leftjoin('marital_status','groom_profile_tbl.marital_status_tbl_id','=','marital_status.id')
                        ->leftjoin('states','groom_profile_tbl.birth_state_tbl_id','=','states.id')
                        ->leftjoin('religions','groom_profile_tbl.religion_tbl_id','=','religions.id')
                        ->leftjoin('registration_grooms_tbl','groom_profile_tbl.reg_groom_tbl_id','=','registration_grooms_tbl.id')
                        ->leftjoin('genders','registration_grooms_tbl.add_bride_groom_table_id','genders.id')
                        // ->leftjoin('uploaded ','groom_profile_tbl.id','=','uploaded .bride_groom_profile_id')
                        ->where('groom_profile_tbl.role',Auth::User()->role)
                        ->where('groom_profile_tbl.groom_profile_id',Auth::User()->groom_profile_id)
                        ->select('groom_profile_tbl.age','groom_profile_tbl.cast','groom_profile_tbl.weight','groom_profile_tbl.height','marital_status.marital_status','states.state','religions.religion','groom_profile_tbl.profile','groom_profile_tbl.first_name','groom_profile_tbl.last_name')
                        ->first();
                    $brideGroomMatchDetails = BrideProfile::leftjoin('marital_status','bride_profile_tbl.marital_status_tbl_id','=','marital_status.id')
                            ->leftjoin('states','bride_profile_tbl.birth_state_tbl_id','=','states.id')
                            ->leftjoin('religions','bride_profile_tbl.religion_tbl_id','=','religions.id')
                            ->leftjoin('registration_grooms_tbl','bride_profile_tbl.reg_bride_tbl_id','=','registration_grooms_tbl.id')
                            ->leftjoin('genders','registration_grooms_tbl.add_bride_groom_table_id','genders.id')
                           ->orwhere('age',$loginGroomDetails->age)
                           ->orwhere('age',$loginGroomDetails->cast)
                           ->orwhere('weight',$loginGroomDetails->weight)
                           ->orwhere('height',$loginGroomDetails->height)
                           ->orwhere('marital_status',$loginGroomDetails->marital_status)
                           ->orwhere('state',$loginGroomDetails->state)
                           ->orwhere('religion',$loginGroomDetails->religion)
                            ->select('bride_profile_tbl.*','marital_status.marital_status','states.state','religions.religion','genders.bride_groom')
                            ->get();

                    $coverProfile = CoverProfile::where('bride_groom_profile_id',$id)
                        ->where('bride_groom_profile_role',$role)
                        ->select('cover_profile')
                        ->first();
                    $brideGroomProfile = BrideProfile::leftjoin('marital_status','bride_profile_tbl.marital_status_tbl_id','=','marital_status.id')
                        ->leftjoin('states','bride_profile_tbl.birth_state_tbl_id','=','states.id')
                        ->leftjoin('religions','bride_profile_tbl.religion_tbl_id','=','religions.id')
                         ->where('bride_profile_tbl.id',$id)
                        ->where('bride_profile_tbl.role',$role)
                        ->select('bride_profile_tbl.*','marital_status.marital_status','states.state','religions.religion')
                        ->first();
                    $partnerPreference = PartnerPreference::leftjoin('marital_status','partner_preference.marital_status_id','=','marital_status.id')
                        ->leftjoin('states','partner_preference.state_id','=','states.id')
                        ->leftjoin('religions','partner_preference.religion_id','=','religions.id')
                        ->where('bride_groom_id',$id)
                        ->where('bride_groom_role',$role)
                        ->first();

                    $familyDetails = FamilyDetails::leftjoin('states','family_details.state_id','=','states.id')
                        ->where('bride_groom_id',$id)
                        ->where('bride_groom_role',$role)
                        ->first();
                    $maritalStatusTableData  = MaritalStatus::get();
                    $statesTableData  = StateModel::get();
                    $religionTableData  = Religion::get();
                    return view('bride_groom/bride_groom_details',['friendsList'=>$friendsList,'brideGroomMatchDetails'=>$brideGroomMatchDetails,'coverProfile'=>$coverProfile,'brideGroomProfile'=>$brideGroomProfile,'partnerPreference'=>$partnerPreference,'familyDetails'=>$familyDetails,'maritalStatusTableData'=>$maritalStatusTableData,'religionTableData'=>$religionTableData,'loginGroomDetails'=>$loginGroomDetails]);
                }
            }else{
                    $notification = array(
                        'message' => 'Please Create Self Profile First!',
                        'alert-type' => 'warning'
                        );
                    return redirect()->route('self_profile_form')->with($notification);
                }
        }else{
            return redirect()->route('login')->withErrors(['msg' => 'Please  Login First']);
        }
    }

    // Bride_groom_profile:$id & role
    public function imageGallery($id, $role){
        $uploadeImageData = UploadeImage::where('bride_groom_profile_id',$id)
        ->where('bride_groom_profile_role',$role)
        ->select('*')
        ->get();
        return view('bride_groom/bride_groom_image_gallery',['uploadeImageData'=>$uploadeImageData,'role'=>$role,$id]);
    }

    public function proposalRequest(Request $request){
        if(Auth::User() != null && (Auth::User()->groom_profile_id || Auth::User()->bride_profile_id)){
            //groom
            $groomProfilId  = GroomProfile::where('groom_profile_id',Auth::User()->groom_profile_id)->select('id','first_name','first_name','last_name')->first();
             $proposalRequestTbl = new ProposalRequest;
            if(Auth::User()->role == 2){
                $isProposalExist = ProposalRequest::where('proposed_to',$groomProfilId->id)
                ->where('proposed_to_role',Auth::User()->role)
                ->select('proposel_status')
                ->first();
                if(isset($isProposalExist->proposel_status) == 1){
                     return json_encode(['msg'=>'already Friend...','status'=>200]);
                }
                
                //START - check if proposal request is already sent
                $isReqExist = ProposalRequest::where('proposed_by_groom',$groomProfilId->id)
                ->where('proposed_by_role',Auth::User()->role)
                ->where('proposed_to',$request->id)
                ->where('proposed_to_role',$request->role)
                ->count();
                if($isReqExist > 0){
                    return json_encode(['msg'=>'Proposal Request already sent...','status'=>200]);
                }else if( ($groomProfilId->id == $request->id) && (Auth::User()->role == $request->role ) ){
                    return json_encode(['msg'=>'You can not send proposal request to yourself...','status'=>200]);
                }
                //END - check if proposal request is already sent
                $proposalRequestTbl->proposed_by_groom = $groomProfilId->id;
                $proposalRequestTbl->proposed_by_role = Auth::User()->role;
                $proposalRequestTbl->proposed_to = $request->id;
                $proposalRequestTbl->proposed_to_role = $request->role;
                $proposalRequestTbl->proposel_status = 0;
                $proposalRequestTbl->save();
                $data = array(
                    // 'email' => $request->email,
                    'title' => 'Proposal Requested Msg',
                    // 'message' => Auth::user()->first_name.'Send Proposal Request',
                   'message' => $groomProfilId->first_name.'-'.$groomProfilId->last_name.' '.'Has Send Proposal Request. For More Details Please Visit Website'
                );
                Mail::to($request->email)->send(new proposal_request_mail($data));
                return json_encode(['msg'=>'Proposal Request Succesfully','id'=>$request->id,'status'=>2]);
            }else if(Auth::User()->role == 3){
                $brideProfilId  = BrideProfile::where('bride_profile_id',Auth::User()->bride_profile_id)->select('id','first_name','last_name')->first();
                //START - check if proposal request is already sent
                $isReqExist = ProposalRequest::where('proposed_by_bride',$brideProfilId->id)
                ->where('proposed_by_role',Auth::User()->role)
                ->where('proposed_to',$request->id)
                ->where('proposed_to_role',$request->role)
                ->count();

                if($isReqExist > 0){
                    return json_encode(['msg'=>'Proposal Request already sent...','status'=>200]);
                }else if( ($brideProfilId->id == $request->id) && (Auth::User()->role == $request->role ) ){
                    return json_encode(['msg'=>'You can not send proposal request to yourself...','status'=>200]);
                }
                //END - check if proposal request is already sent
                $proposalRequestTbl->proposed_by_bride = $brideProfilId->id;
                $proposalRequestTbl->proposed_by_role = Auth::User()->role;
                $proposalRequestTbl->proposed_to = $request->id;
                $proposalRequestTbl->proposed_to_role = $request->role;
                $proposalRequestTbl->proposel_status = 0;
                $proposalRequestTbl->save();
                $data = array(
                    'title' => 'Proposal Requested Msg',
                    'message' => $brideProfilId->first_name.'-'.$brideProfilId->last_name.' '.'Has Send Proposal Request. For More Details Please Visit Website'
                );
                Mail::to($request->email)->send(new proposal_request_mail($data));
                 return json_encode(['msg'=>'Proposal Request Succesfully','id'=>$request->id,'status'=>2]);
            }else{
                 return json_encode(['login_msg'=>'Please  Login First','status'=>3]);
            }
        }else{
             return json_encode(['login_msg'=>'Please  Login First && Create Self Profile']);
        }
    }  

    public function cancelRequest(Request $request){
        if(Auth::User()->role == 2){
            $groomProfilId = $this->getLogedInProfileId();
            $destroyProposalRequest = ProposalRequest::where('proposed_to',$request->id)->where('proposed_to_role',$request->role)->where('proposed_by_groom',$groomProfilId)->where('proposed_by_role',Auth::User()->role)->delete();
             return json_encode(['msg'=>'Proposal Request Canceled Succesfully','id'=>$request->id]);
        }else if(Auth::User()->role == 3){
            $brideProfilId = $this->getLogedInProfileId();
            $destroyProposalRequest = ProposalRequest::where('proposed_to',$request->id)->where('proposed_to_role',$request->role)->where('proposed_by_bride',$brideProfilId)->where('proposed_by_role',Auth::User()->role)->delete();
            return json_encode(['msg'=>'Proposal Canceled Succesfully','id'=>$request->id]);
        }  
    }

    public function rejectRequest(Request $request){
        if($request->proposed_by_role == 2){
            $groomProfilId = $this->getLogedInProfileId();
            ProposalRequest::where('proposed_by_groom',$request->proposed_by)
            ->where('proposed_to',$groomProfilId)
            ->where('proposel_status',0)
            ->delete();
            return json_encode(['msg'=>'Proposal request rejected.']);
        }else if($request->proposed_by_role == 3){

            $brideProfilId = $this->getLogedInProfileId();
            ProposalRequest::where('proposed_by_bride',$request->proposed_by)
            ->where('proposed_to',$brideProfilId)
            ->where('proposel_status',0)
            ->delete();
            return json_encode(['msg'=>'Proposal request rejected.']);
        }  

    }

    public function acceptRequest(Request $request){
        if($request->proposed_by_role == 2){

            $groomProfilId = $this->getLogedInProfileId();
            ProposalRequest::where('proposed_by_groom',$request->proposed_by)
            ->where('proposed_to',$groomProfilId)
            ->where('proposel_status',0)
            ->update(
                ['proposel_status'=>1]
            );
            return json_encode(['msg'=>'Proposal request accepted.','proposel_status'=>1]);
        }else if($request->proposed_by_role == 3){

            $brideProfilId = $this->getLogedInProfileId();
            ProposalRequest::where('proposed_by_bride',$request->proposed_by)
            ->where('proposed_to',$brideProfilId)
            ->where('proposel_status',0)
            ->update(
                ['proposel_status'=>1]
            );
            return json_encode(['msg'=>'Proposal request accepted.','proposel_status'=>1]);
        }  

    }


    // proposalAllRequest View
    public function proposalAllRequest(){
        // $brideGroomDatas = User::where('id',Auth::User()->id)->get();
        if( Auth::User() != null && Auth::User()->role == 2){
            $brideGroomDatas = (new BrideGroomController)->viewSelfProfile();
            $brideGroomData = $brideGroomDatas->brideGroomData;
            $uploadeImageData = $brideGroomDatas->uploadeImageData;
            $groom_profile_id =  $this->getLogedInProfileId();
            //list of proposed request sent by login user
            $proposal_request = ProposalRequest::leftjoin('bride_profile_tbl','proposal_request.proposed_to','=','bride_profile_tbl.id')
            ->select('bride_profile_tbl.*')
            ->where('proposal_request.proposed_by_groom',$groom_profile_id)
            ->where('proposal_request.proposed_by_role',2)
            ->where('proposal_request.proposel_status',0)->get();

                //list of incomming frined requests
            $incommingReq = ProposalRequest::leftjoin('bride_profile_tbl','proposal_request.proposed_by_bride','=','bride_profile_tbl.id')
            ->select('bride_profile_tbl.*')
            ->where('proposal_request.proposed_to',$groom_profile_id)
            ->where('proposal_request.proposed_to_role',2)
            ->where('proposal_request.proposel_status',0)->get();
            $acceptReq = ProposalRequest::leftjoin('bride_profile_tbl','proposal_request.proposed_by_bride','=','bride_profile_tbl.id')
            ->select('bride_profile_tbl.*')
            ->where('proposal_request.proposed_to',$groom_profile_id)
            ->where('proposal_request.proposed_to_role',2)
            ->where('proposal_request.proposel_status',1)->get();
            $recentlyViewProfile = RecentlyViewProfile::leftjoin('bride_profile_tbl','recently_view_profile.visitor_user_id','=','bride_profile_tbl.id')
            ->select('bride_profile_tbl.*')
            ->where('recently_view_profile.visited_id',$groom_profile_id)
            ->where('recently_view_profile.visited_role',2)
            ->get();
            return view('bride_groom/proposal_all_requests', ['brideGroomDatas'=>$brideGroomDatas->brideGroomData,'uploadeImageData'=>$uploadeImageData,'proposal_request'=>$proposal_request,'incommingReq'=>$incommingReq,'acceptReq'=>$acceptReq,'recentlyViewProfile'=>$recentlyViewProfile]);
        }else if(Auth::User() != null && Auth::User()->role == 3){
            $brideGroomDatas = (new BrideGroomController)->viewSelfProfile();
            $brideGroomData = $brideGroomDatas->brideGroomData;
            $uploadeImageData = $brideGroomDatas->uploadeImageData;
            $bride_profile_id = $this->getLogedInProfileId();
                     
            //list of proposed request sent by login user
            $proposal_request = ProposalRequest::leftjoin('groom_profile_tbl','proposal_request.proposed_to','groom_profile_tbl.id')
            ->select('groom_profile_tbl.*')
            ->where('proposal_request.proposed_by_bride',$bride_profile_id)
            ->where('proposal_request.proposed_by_role',3)
            ->where('proposal_request.proposel_status',0)->get();

            //list of incomming frined requests
            $incommingReq = ProposalRequest::leftjoin('groom_profile_tbl','proposal_request.proposed_by_groom','groom_profile_tbl.id')
            ->select('groom_profile_tbl.*')
            ->where('proposal_request.proposed_to',$bride_profile_id)
            ->where('proposal_request.proposed_to_role',3)
            ->where('proposal_request.proposel_status',0)->get();

             $acceptReq = ProposalRequest::leftjoin('groom_profile_tbl','proposal_request.proposed_by_groom','groom_profile_tbl.id')
            ->select('groom_profile_tbl.*')
            ->where('proposal_request.proposed_to',$bride_profile_id)
            ->where('proposal_request.proposed_to_role',3)
            ->where('proposal_request.proposel_status',1)->get();

            $recentlyViewProfile = RecentlyViewProfile::leftjoin('groom_profile_tbl','recently_view_profile.visitor_user_id','=','groom_profile_tbl.id')
            ->select('groom_profile_tbl.*')
            ->where('recently_view_profile.visited_id',$bride_profile_id)
            ->where('recently_view_profile.visited_role',3)
            ->get();
            return view('bride_groom/proposal_all_requests', ['brideGroomDatas'=>$brideGroomDatas->brideGroomData,'uploadeImageData'=>$uploadeImageData,'proposal_request'=>$proposal_request,'incommingReq'=>$incommingReq,'acceptReq'=>$acceptReq,'recentlyViewProfile'=>$recentlyViewProfile]);
        }
        
    }

    function brideGroomId(){
        if(Auth::User()->role == 2){
         $groomId = GroomProfile::where('groom_profile_id',Auth::User()->groom_profile_id)->select('id','role')->first();
         return $groomId;
        }else{
            $brideId = BrideProfile::where('bride_profile_id',Auth::User()->bride_profile_id)->select('id','role')->first();
                return $brideId;
        }

    }

    public function getLogedInProfileId(){
        if(Auth::User()->role == 2){
            $groom_profile = GroomProfile::where('groom_profile_id',Auth::User()->groom_profile_id)->select('id')->first();
            return $groom_profile->id;
        }else if(Auth::User()->role == 3){
           $bride_profile = BrideProfile::where('bride_profile_id',Auth::User()->bride_profile_id)->select('id')->first();
           return $bride_profile->id;
        }
    }

    // public function rejectRequest(Request $request){
    //     if($request->proposed_by_role == 2){

    //         $groomProfilId = $this->getLogedInProfileId();
    //         ProposalRequest::where('proposed_by_groom',$request->proposed_by)
    //         ->where('proposed_to',$groomProfilId)
    //         ->where('proposel_status',0)
    //         ->delete();
    //         return json_encode(['msg'=>'Proposal request rejected.']);
    //     }else if($request->proposed_by_role == 3){

    //         $brideProfilId = $this->getLogedInProfileId();
    //         ProposalRequest::where('proposed_by_bride',$request->proposed_by)
    //         ->where('proposed_to',$brideProfilId)
    //         ->where('proposel_status',0)
    //         ->delete();
    //         return json_encode(['msg'=>'Proposal request rejected.']);
    //     }  

    // }

    // public function acceptRequest(Request $request){
    //     if($request->proposed_by_role == 2){

    //         $groomProfilId = $this->getLogedInProfileId();
    //         ProposalRequest::where('proposed_by_groom',$request->proposed_by)
    //         ->where('proposed_to',$groomProfilId)
    //         ->where('proposel_status',0)
    //         ->update(
    //             ['proposel_status'=>1]
    //         );
    //         return json_encode(['msg'=>'Proposal request accepted.','proposel_status'=>1]);
    //     }else if($request->proposed_by_role == 3){

    //         $brideProfilId = $this->getLogedInProfileId();
    //         ProposalRequest::where('proposed_by_bride',$request->proposed_by)
    //         ->where('proposed_to',$brideProfilId)
    //         ->where('proposel_status',0)
    //         ->update(
    //             ['proposel_status'=>1]
    //         );
    //         return json_encode(['msg'=>'Proposal request accepted.','proposel_status'=>1]);
    //     }  

    // }
   

}

