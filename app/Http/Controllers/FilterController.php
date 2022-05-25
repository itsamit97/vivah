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

                ->where('current_state_tbl_id','like', '%' .$request->state_id . '%')
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
                ->where('current_state_tbl_id','like', '%' .$request->state_id . '%')
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
            return redirect()->route('index')->withErrors(['msg' => 'Please Fill Filter Box']);
        }
    }  

    // brideGroomDetails when click full profile in filter matchesProfileView && Bride_groom:$id & role
    public function brideGroomDetails($id, $role){
        if(Auth::User() != null){
          $groomGroomId  = $this->brideGroomId();
            if(( Auth::User()->bride_profile_id != null || Auth::User()->groom_profile_id != null)){
                    $recentlyViewProfile = new RecentlyViewProfile;
                    $recentlyViewProfile->visitor_user_id =$groomGroomId->id;
                    $recentlyViewProfile->visitor_role = Auth::User()->role;
                    $recentlyViewProfile->visited_id = $id;
                    $recentlyViewProfile->visited_role = $role;
                    $recentlyViewProfile->save();
                    if($role == 2){
                        //grooom
                        $brideGroomDetails = GroomProfile::leftjoin('marital_status','groom_profile_tbl.marital_status_tbl_id','=','marital_status.id')
                        ->leftjoin('states','groom_profile_tbl.birth_state_tbl_id','=','states.id')
                        ->leftjoin('religions','groom_profile_tbl.religion_tbl_id','=','religions.id')
                        ->leftjoin('registration_grooms_tbl','groom_profile_tbl.reg_groom_tbl_id','=','registration_grooms_tbl.id')
                        ->leftjoin('genders','registration_grooms_tbl.add_bride_groom_table_id','genders.id')
                        ->where('groom_profile_tbl.id',$id)
                        ->select('groom_profile_tbl.*','marital_status.marital_status','states.state','religions.religion','genders.bride_groom')
                        ->get();
                         $uploadeImageData = UploadeImage::where('bride_groom_profile_id',$id)
                        ->where('bride_groom_profile_role',$role)->select('profile_image')->get();
                        return view('bride_groom/bride_groom_details',['brideGroomDetails'=>$brideGroomDetails,'uploadeImageData'=>$uploadeImageData]);
                    }elseif($role == 3){
                        $brideGroomDetails = BrideProfile::leftjoin('marital_status','bride_profile_tbl.marital_status_tbl_id','=','marital_status.id')
                        ->leftjoin('states','bride_profile_tbl.birth_state_tbl_id','=','states.id')
                        ->leftjoin('religions','bride_profile_tbl.religion_tbl_id','=','religions.id')
                        ->leftjoin('registration_grooms_tbl','bride_profile_tbl.reg_bride_tbl_id','=','registration_grooms_tbl.id')
                        ->leftjoin('genders','registration_grooms_tbl.add_bride_groom_table_id','genders.id')
                       ->where('bride_profile_tbl.id',$id)
                         ->select('bride_profile_tbl.*','marital_status.marital_status','states.state','religions.religion','genders.bride_groom')
                        ->get();

                         $uploadeImageData = UploadeImage::where('bride_groom_profile_id',$id)
                        ->where('bride_groom_profile_role',$role)->select('profile_image')->get();
                       return view('bride_groom/bride_groom_details',['brideGroomDetails'=>$brideGroomDetails,'uploadeImageData'=>$uploadeImageData]);
                    }  
             }else{
                 return redirect()->route('self_profile_form')->withErrors(['msg' => 'Please Create self Profile Succesfully']);
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
        if(Auth::User() != null){
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
                   $isProposalExist = ProposalRequest::where('proposed_to',$brideProfilId->id)
                ->where('proposed_to_role',Auth::User()->role)
                ->select('proposel_status')
                ->first();
                // dd('isProposalExist',$isProposalExist);
                if($isProposalExist->proposel_status == 1){
                    return json_encode(['msg'=>'alreadyvvvvv Friend...','status'=>200]);
                }
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
             return json_encode(['login_msg'=>'Please  Login First']);
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
            // dd('incommingReq',$incommingReq);

            $acceptReq = ProposalRequest::leftjoin('bride_profile_tbl','proposal_request.proposed_by_bride','=','bride_profile_tbl.id')
            ->select('bride_profile_tbl.*')
            ->where('proposal_request.proposed_to',$groom_profile_id)
            ->where('proposal_request.proposed_to_role',2)
            ->where('proposal_request.proposel_status',1)->get();
            // dd('acceptReq',$acceptReq);

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
            // $groom_profile_id =  $this->getLogedInProfileId();
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

            // dd('acceptReq bride',$acceptReq);

            $recentlyViewProfile = RecentlyViewProfile::leftjoin('groom_profile_tbl','recently_view_profile.visitor_user_id','=','groom_profile_tbl.id')
            ->select('groom_profile_tbl.*')
            ->where('recently_view_profile.visited_id',$bride_profile_id)
            ->where('recently_view_profile.visited_role',3)
            ->get();
            return view('bride_groom/proposal_all_requests', ['brideGroomDatas'=>$brideGroomDatas->brideGroomData,'uploadeImageData'=>$uploadeImageData,'proposal_request'=>$proposal_request,'incommingReq'=>$incommingReq,'acceptReq'=>$acceptReq,'recentlyViewProfile'=>$recentlyViewProfile]);
        }
        
    }







// ===========================21-5-2022======old=========================================
    // public function proposalRequestView(){
    //     if(Auth::User() !=null && Auth::User()->role == 3){

    //         $sentProReq = [];
    //         $incommingProReq = [];

    //         // bride
    //         $brideProfileTableId = BrideProfile::where('bride_profile_id',Auth::User()->bride_profile_id)->select('id','role')->first();

    //         //proposed_to
    //         $proposal_request = ProposalRequest::where('proposed_by_bride',$brideProfileTableId->id)
    //          ->where('proposed_by_role',3)
    //          ->select('proposed_to','proposed_to_role')
    //          ->get();
    //         foreach ($proposal_request as $keyReq => $valueReq) {
    //               $sentProReq[] = $valueReq->proposed_to;
    //          }

    //          //incommingReq
    //         $incommingReq = ProposalRequest::where('proposed_to',$brideProfileTableId->id)
    //             ->where('proposed_to_role',3)
    //          ->select('proposed_by_bride','proposed_by_role')
    //          ->get();
    //           foreach ($incommingReq as $keyIncReq => $valueIncReq) {
    //               $incommingProReq[] = $valueIncReq->proposed_by_bride;
    //             }

    //          $proposalRequestData = ProposalRequest::leftjoin('bride_profile_tbl','proposal_request.proposed_by_bride','=','bride_profile_tbl.id')
    //         ->leftjoin('registration_brides_tbl','bride_profile_tbl.reg_bride_tbl_id','=','registration_brides_tbl.id')
    //         ->leftjoin('genders','registration_brides_tbl.add_bride_groom_table_id','=','genders.id')
    //         ->leftjoin('groom_profile_tbl','proposal_request.proposed_by_groom','=','groom_profile_tbl.id')
    //         // ->where('proposal_request.proposed_by_bride',$brideProfileTableId->id)
    //         // ->where('proposal_request.proposed_by_role',$brideProfileTableId->role)

    //         ->whereIn('proposed_to',array($sentProReq))
    //         // ->whereIn('proposed_by_groom',array($incommingProReq))
    //         ->select('proposal_request.*','genders.bride_groom','groom_profile_tbl.first_name','groom_profile_tbl.last_name','groom_profile_tbl.age','groom_profile_tbl.cast','groom_profile_tbl.id','groom_profile_tbl.role')->get();

    //         // dd('proposalRequestData',$proposalRequestData);
    //         if(count($proposalRequestData) > 0){
    //             return view('bride_groom/proposal_request',['proposalRequestData'=>$proposalRequestData]);
    //        }else{
    //              // return Redirect::back()->route('self_profile_form')->with('msg', 'The Message');
    //             return redirect()->route('self_profile')->withErrors(['msg' => 'Wait Not Send Proposel Request']);
    //        }
             

    //     }else if(Auth::User() !=null && Auth::User()->role == 2){
    //         $groomProfileTableId = GroomProfile::where('groom_profile_id',Auth::User()->groom_profile_id)->select('id','role')->first();
    //         $proposalRequestData = ProposalRequest::leftjoin('groom_profile_tbl','proposal_request.proposed_by_groom','groom_profile_tbl.id')
    //         ->leftjoin('registration_grooms_tbl','groom_profile_tbl.reg_groom_tbl_id','=','registration_grooms_tbl.id')
    //         ->leftjoin('genders','registration_grooms_tbl.add_bride_groom_table_id','=','genders.id')
    //         ->leftjoin('bride_profile_tbl','proposal_request.proposed_by_bride','=','bride_profile_tbl.id')
    //         ->where('proposal_request.proposed_by_groom',$groomProfileTableId->id)
    //         ->where('proposal_request.proposed_by_role',$groomProfileTableId->role)
    //          ->orwhere('proposal_request.proposed_to',$groomProfileTableId->id)
    //        ->select('proposal_request.*','genders.bride_groom','bride_profile_tbl.first_name', 'bride_profile_tbl.last_name','bride_profile_tbl.age','bride_profile_tbl.cast','bride_profile_tbl.profile','bride_profile_tbl.id','bride_profile_tbl.role')->get();
    //        // dd('proposalRequestData',$proposalRequestData);

    //        if(count($proposalRequestData) > 0){
    //             return view('bride_groom/proposal_request',['proposalRequestData'=>$proposalRequestData]);
    //        }else{
    //              // return Redirect::back()->route('self_profile_form')->with('msg', 'The Message');
    //         return redirect()->route('self_profile')->withErrors(['msg' => 'Wait Not Send Proposel Request']);
    //        }
    //        // return view('bride_groom/proposal_request',['proposalRequestData'=>$proposalRequestData]);

    //     }

    // }



    // public function proposalAllRequest(){
    //     // $brideGroomDatas = User::where('id',Auth::User()->id)->get();
    //     if( Auth::User() != null && Auth::User()->role == 2){
    //         $brideGroomDatas = (new BrideGroomController)->viewSelfProfile();
    //         $brideGroomData = $brideGroomDatas->brideGroomData;
    //         $uploadeImageData = $brideGroomDatas->uploadeImageData;
    //         $groom_profile_id =  $this->getLogedInProfileId();

    //         //list of proposed request sent by login user
    //         $proposal_request = ProposalRequest::leftjoin('bride_profile_tbl','proposal_request.proposed_to','=','bride_profile_tbl.id')
    //         ->select('bride_profile_tbl.*')
    //         ->where('proposal_request.proposed_by_groom',$groom_profile_id)
    //         ->where('proposal_request.proposed_by_role',2)
    //         ->where('proposal_request.proposel_status',0)->get();

    //             //list of incomming frined requests
    //         $incommingReq = ProposalRequest::leftjoin('bride_profile_tbl','proposal_request.proposed_by_bride','=','bride_profile_tbl.id')
    //         ->select('bride_profile_tbl.*')
    //         ->where('proposal_request.proposed_to',$groom_profile_id)
    //         ->where('proposal_request.proposed_to_role',2)
    //         ->where('proposal_request.proposel_status',0)->get();
    //         // dd('incommingReq',$incommingReq);

    //         $acceptReq = ProposalRequest::leftjoin('bride_profile_tbl','proposal_request.proposed_by_bride','=','bride_profile_tbl.id')
    //         ->select('bride_profile_tbl.*')
    //         ->where('proposal_request.proposed_to',$groom_profile_id)
    //         ->where('proposal_request.proposed_to_role',2)
    //         ->where('proposal_request.proposel_status',1)->get();
    //         // dd('acceptReq',$acceptReq);

    //         $recentlyViewProfile = RecentlyViewProfile::leftjoin('bride_profile_tbl','recently_view_profile.visitor_user_id','=','bride_profile_tbl.id')
    //         ->select('bride_profile_tbl.*')
    //         ->where('recently_view_profile.visited_id',$groom_profile_id)
    //         ->where('recently_view_profile.visited_role',2)
    //         ->get();
    //         return view('bride_groom/proposal_all_requests', ['brideGroomDatas'=>$brideGroomDatas->brideGroomData,'uploadeImageData'=>$uploadeImageData,'proposal_request'=>$proposal_request,'incommingReq'=>$incommingReq,'acceptReq'=>$acceptReq,'recentlyViewProfile'=>$recentlyViewProfile]);
    //     }else if(Auth::User() != null && Auth::User()->role == 3){
    //         $brideGroomDatas = (new BrideGroomController)->viewSelfProfile();
    //         $brideGroomData = $brideGroomDatas->brideGroomData;
    //         $uploadeImageData = $brideGroomDatas->uploadeImageData;
    //         // $groom_profile_id =  $this->getLogedInProfileId();
    //         $bride_profile_id = $this->getLogedInProfileId();
                     
    //         //list of proposed request sent by login user
    //         $proposal_request = ProposalRequest::leftjoin('groom_profile_tbl','proposal_request.proposed_to','groom_profile_tbl.id')
    //         ->select('groom_profile_tbl.*')
    //         ->where('proposal_request.proposed_by_bride',$bride_profile_id)
    //         ->where('proposal_request.proposed_by_role',3)
    //         ->where('proposal_request.proposel_status',0)->get();

    //         //list of incomming frined requests
    //         $incommingReq = ProposalRequest::leftjoin('groom_profile_tbl','proposal_request.proposed_by_groom','groom_profile_tbl.id')
    //         ->select('groom_profile_tbl.*')
    //         ->where('proposal_request.proposed_to',$bride_profile_id)
    //         ->where('proposal_request.proposed_to_role',3)
    //         ->where('proposal_request.proposel_status',0)->get();

    //          $acceptReq = ProposalRequest::leftjoin('groom_profile_tbl','proposal_request.proposed_by_groom','groom_profile_tbl.id')
    //         ->select('groom_profile_tbl.*')
    //         ->where('proposal_request.proposed_to',$bride_profile_id)
    //         ->where('proposal_request.proposed_to_role',3)
    //         ->where('proposal_request.proposel_status',1)->get();

    //         // dd('acceptReq bride',$acceptReq);

    //         $recentlyViewProfile = RecentlyViewProfile::leftjoin('groom_profile_tbl','recently_view_profile.visitor_user_id','=','groom_profile_tbl.id')
    //         ->select('groom_profile_tbl.*')
    //         ->where('recently_view_profile.visited_id',$bride_profile_id)
    //         ->where('recently_view_profile.visited_role',3)
    //         ->get();
    //         return view('bride_groom/proposal_all_requests', ['brideGroomDatas'=>$brideGroomDatas->brideGroomData,'uploadeImageData'=>$uploadeImageData,'proposal_request'=>$proposal_request,'incommingReq'=>$incommingReq,'acceptReq'=>$acceptReq,'recentlyViewProfile'=>$recentlyViewProfile]);
    //     }
        
    // }


// ===============================new ===================================




    // public function incommingAndSentProposalRequest(){

    //     if( Auth::User() != null && Auth::User()->role == 2){

    //         $groom_profile_id =  $this->getLogedInProfileId();
    //           //list of proposed request sent by login user
    //         $proposal_request = ProposalRequest::leftjoin('bride_profile_tbl','proposal_request.proposed_to','=','bride_profile_tbl.id')
    //         ->select('bride_profile_tbl.*')
    //         ->where('proposal_request.proposed_by_groom',$groom_profile_id)
    //         ->where('proposal_request.proposed_by_role',2)
    //         ->where('proposal_request.proposel_status',0)->get();
    //         // dd('proposal_request',$proposal_request);


    //         // $brideGroomDatas = (new BrideGroomController)->viewSelfProfile();
    //         //     $brideGroomData = $brideGroomDatas->brideGroomData;
    //         //    $uploadeImageData = $brideGroomDatas->uploadeImageData;
    //         // if(count($proposal_request) > 0){
    //         //     // dd('chacke1');

    //         //      return view('bride_groom/proposal_all_requests', ['brideGroomDatas'=>$brideGroomDatas->brideGroomData,'uploadeImageData'=>$uploadeImageData,'proposal_request'=>$proposal_request]);
    //         // }else{
    //         //     // dd('chacke2');
    //         //     // return redirect()->route('index')->withErrors(['msg' => 'Please Fill Filter Box']);
    //         //     return Redirect::back()->withErrors(['msg' => 'The Message']);
    //         // }

            
    //         // return $proposal_request;

    //         //list of incomming frined requests
    //         $incommingReq = ProposalRequest::leftjoin('bride_profile_tbl','proposal_request.proposed_by_bride','=','bride_profile_tbl.id')
    //         ->select('bride_profile_tbl.*')
    //         ->where('proposal_request.proposed_to',$groom_profile_id)
    //         ->where('proposal_request.proposed_to_role',2)
    //         ->where('proposal_request.proposel_status',0)->get();


    //     }else if(Auth::User() != null && Auth::User()->role == 3){

               
    //             $bride_profile_id = $this->getLogedInProfileId();
                     
    //             //list of proposed request sent by login user
    //             $proposal_request = ProposalRequest::leftjoin('groom_profile_tbl','proposal_request.proposed_to','groom_profile_tbl.id')
    //             ->select('groom_profile_tbl.*')
    //             ->where('proposal_request.proposed_by_bride',$bride_profile_id)
    //             ->where('proposal_request.proposed_by_role',3)
    //             ->where('proposal_request.proposel_status',0)->get();
           

    //             //list of incomming frined requests
    //             $incommingReq = ProposalRequest::leftjoin('groom_profile_tbl','proposal_request.proposed_by_groom','groom_profile_tbl.id')
    //             ->select('groom_profile_tbl.*')
    //             ->where('proposal_request.proposed_to',$bride_profile_id)
    //             ->where('proposal_request.proposed_to_role',3)
    //             ->where('proposal_request.proposel_status',0)->get();

    //           }

    // }







    // public function proposalAllRequest(){
    //         // call new BrideGroomController->function

    //     // $brideGroomDatas = User::where('id',Auth::User()->id)->get();

    //      $brideGroomDatas = (new BrideGroomController)->viewSelfProfile();
    //              $brideGroomData = $brideGroomDatas->brideGroomData;
    //              $uploadeImageData = $brideGroomDatas->uploadeImageData;

    //      // $brideGroomDatas1 =  json_parse($brideGroomDatas);
    //      // dd('brideGroomData',$brideGroomData);
    //      return view('bride_groom/proposal_all_requests', ['brideGroomDatas'=>$brideGroomDatas->brideGroomData,'uploadeImageData'=>$uploadeImageData]);

         
        
    // }










    // ================================work====================
    // // brideGroomDetails when click full profile in filter matchesProfileView && Bride_groom:$id & role
    // public function brideGroomDetails($id, $role){
    //     if(Auth::User() != null){
    //       $groomGroomId  = $this->brideGroomId();
    //         if(( Auth::User()->bride_profile_id != null || Auth::User()->groom_profile_id != null)){
    //                 $recentlyViewProfile = new RecentlyViewProfile;
    //                 $recentlyViewProfile->visitor_user_id =$groomGroomId->id;
    //                 $recentlyViewProfile->visitor_role = Auth::User()->role;
    //                 $recentlyViewProfile->visited_id = $id;
    //                 $recentlyViewProfile->visited_role = $role;
    //                 $recentlyViewProfile->save();
    //                 if($role == 2){
    //                     //grooom
    //                     $brideGroomDetails = GroomProfile::leftjoin('marital_status','groom_profile_tbl.marital_status_tbl_id','=','marital_status.id')
    //                     ->leftjoin('states','groom_profile_tbl.birth_state_tbl_id','=','states.id')
    //                     ->leftjoin('religions','groom_profile_tbl.religion_tbl_id','=','religions.id')
    //                     ->leftjoin('registration_grooms_tbl','groom_profile_tbl.reg_groom_tbl_id','=','registration_grooms_tbl.id')
    //                     ->leftjoin('genders','registration_grooms_tbl.add_bride_groom_table_id','genders.id')
    //                     ->where('groom_profile_tbl.id',$id)
    //                     ->select('groom_profile_tbl.*','marital_status.marital_status','states.state','religions.religion','genders.bride_groom')
    //                     ->get();
    //                      $uploadeImageData = UploadeImage::where('bride_groom_profile_id',$id)
    //                     ->where('bride_groom_profile_role',$role)->select('profile_image')->get();
    //                     return view('bride_groom/bride_groom_details',['brideGroomDetails'=>$brideGroomDetails,'uploadeImageData'=>$uploadeImageData]);
    //                 }elseif($role == 3){
    //                     $brideGroomDetails = BrideProfile::leftjoin('marital_status','bride_profile_tbl.marital_status_tbl_id','=','marital_status.id')
    //                     ->leftjoin('states','bride_profile_tbl.birth_state_tbl_id','=','states.id')
    //                     ->leftjoin('religions','bride_profile_tbl.religion_tbl_id','=','religions.id')
    //                     ->leftjoin('registration_grooms_tbl','bride_profile_tbl.reg_bride_tbl_id','=','registration_grooms_tbl.id')
    //                     ->leftjoin('genders','registration_grooms_tbl.add_bride_groom_table_id','genders.id')
    //                    ->where('bride_profile_tbl.id',$id)
    //                      ->select('bride_profile_tbl.*','marital_status.marital_status','states.state','religions.religion','genders.bride_groom')
    //                     ->get();

    //                      $uploadeImageData = UploadeImage::where('bride_groom_profile_id',$id)
    //                     ->where('bride_groom_profile_role',$role)->select('profile_image')->get();
    //                    return view('bride_groom/bride_groom_details',['brideGroomDetails'=>$brideGroomDetails,'uploadeImageData'=>$uploadeImageData]);
    //                 }  
    //          }else{
    //              return redirect()->route('self_profile_form')->withErrors(['msg' => 'Please Create self Profile Succesfully']);
    //          }  

    //     }else{
    //             return redirect()->route('login')->withErrors(['msg' => 'Please  Login First']);
    //         }
    // }

    // // Bride_groom_profile:$id & role
    // public function imageGallery($id, $role){
    //     $uploadeImageData = UploadeImage::where('bride_groom_profile_id',$id)
    //     ->where('bride_groom_profile_role',$role)
    //     ->select('*')
    //     ->get();
    //     return view('bride_groom/bride_groom_image_gallery',['uploadeImageData'=>$uploadeImageData,'role'=>$role,$id]);
    // }

    // public function recentlyViewProfile(){
    //     if(Auth::User() !=null && Auth::User()->role == 3){
    //         // bride
    //         // $brideProfileTableId = BrideProfile::where('bride_profile_id',Auth::User()->bride_profile_id)->select('id','role')->first();
    //          $brideId  = $this->brideGroomId();

    //          $recentlyViewProfileData = RecentlyViewProfile::leftjoin('bride_profile_tbl','recently_view_profile.visited_id','bride_profile_tbl.id')
    //         ->leftjoin('registration_brides_tbl','bride_profile_tbl.reg_bride_tbl_id','=','registration_brides_tbl.id')
    //         ->leftjoin('genders','registration_brides_tbl.add_bride_groom_table_id','genders.id')
    //         // ->leftjoin('users','recently_view_profile.visitor_user_id','=','users.id')
    //         ->leftjoin('groom_profile_tbl','recently_view_profile.visitor_user_id','groom_profile_tbl.id')
    //         ->where('recently_view_profile.visited_id',$brideId->id)
    //         ->where('recently_view_profile.visited_role',$brideId->role)
    //         ->select('recently_view_profile.*','genders.bride_groom','groom_profile_tbl.first_name', 'groom_profile_tbl.last_name','groom_profile_tbl.age','groom_profile_tbl.cast','groom_profile_tbl.profile')->get();
    //         return view('bride_groom/recently_view_profile',['recentlyViewProfileData'=>$recentlyViewProfileData]);
    //     }else if(Auth::User() !=null && Auth::User()->role == 2){
    //         // $groomProfileTableId = GroomProfile::where('groom_profile_id',Auth::User()->groom_profile_id)->select('id','role')->first();
    //          $groomId  = $this->brideGroomId();
    //         $recentlyViewProfileData = RecentlyViewProfile::leftjoin('groom_profile_tbl','recently_view_profile.visited_id','groom_profile_tbl.id')
    //         ->leftjoin('registration_grooms_tbl','groom_profile_tbl.reg_groom_tbl_id','=','registration_grooms_tbl.id')
    //         ->leftjoin('genders','registration_grooms_tbl.add_bride_groom_table_id','genders.id')
    //         // ->leftjoin('users','recently_view_profile.visitor_user_id', '=','users.id')
    //         ->leftjoin('bride_profile_tbl','recently_view_profile.visitor_user_id','bride_profile_tbl.id')
    //         ->where('recently_view_profile.visited_id',$groomId->id)
    //         ->where('recently_view_profile.visited_role',$groomId->role)
    //         ->select('recently_view_profile.*','genders.bride_groom','bride_profile_tbl.first_name', 'bride_profile_tbl.last_name','bride_profile_tbl.age','bride_profile_tbl.cast','bride_profile_tbl.profile')->get();
    //         // dd('recentlyViewProfileData',$recentlyViewProfileData);
    //         return view('bride_groom/recently_view_profile',['recentlyViewProfileData'=>$recentlyViewProfileData]);  
    //     }

    // }





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

