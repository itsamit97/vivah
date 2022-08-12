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
use App\FamilyDetails;
use App\implode;
use App\PartnerPreference;
use App\BloodGroup;
// use Intervention\Image\ImageManagerStatic as Image;


class BrideGroomController extends Controller
{
    public function selfProfileForm(){
        if(Auth::User() != null && (Auth::User()->bride_profile_id != null || Auth::User()->groom_profile_id != null)){
            $notification = array(
                'message' => 'Profile Alredy Taken!',
                'alert-type' => 'warning' 
            );
            return redirect()->route('index')->with($notification);
        }else{
            if(Auth::User() !=null){
                $maritalStatusTableData  = MaritalStatus::get();
                $statesTableData  = StateModel::get();
                $religionTableData  = Religion::get();
                $bloodGroupTableData = BloodGroup::get();
                // dd($bloodGroupTableData);
                return view('bride_groom/create_self_profile',['maritalStatusTableData'=>$maritalStatusTableData,'statesTableData'=>$statesTableData,'religionTableData'=>$religionTableData,'bloodGroupTableData'=>$bloodGroupTableData]);
            }else{
                 return redirect()->route('login')->withErrors(['msg' => 'Please first Login Thank You']);
            }
        }
    }

    // birth_state_tbl_id & current_state_tbl_id same data but differnt only name change
    public function selfProfileCreate(Request $request){
        $this->validate($request,[
         'marital_status_id'=>'required',
         'birthday'=>'required',
         'age'=>'required',
         'birth_state_id'=>'required',
         'religion_id'=>'required',
         'country'=>'required',
         'current_state_id'=>'required',
        ]);
        // Resize Imag Code
        $selfProfile = $request->file('profile');
        $ProfileName = $selfProfile->getClientOriginalName();
        $width = 190; // your max width
        $height = 270; // your max height
        $image_resize = Image::make($selfProfile->getRealPath());              
        $image_resize->resize($width, $height);
        $image_resize->save(public_path('profiles/' .$ProfileName));
        $proofIdentity = time().'.'.$request->proof_identity->extension();  
        $request->proof_identity->move(public_path('proof_identity'), $proofIdentity);
        $proofAddress = time().'.'.$request->proof_address->extension();  
        $request->proof_address->move(public_path('proof_identity'), $proofAddress);
        $usersTable = new User;
        if(Auth::User() != null && (Auth::User()->bride_profile_id != null || Auth::User()->groom_profile_id != null)){
                return Redirect::back()->withErrors(['msg' => 'Profile Alredy Taken']);
        }else{
                if(Auth::User()->role == 2){
                    $groomProfileTable = new GroomProfile;
                    $groomProfileTable->role = (Auth::User()->role);
                    $groomProfileTable->reg_groom_tbl_id = (Auth::User()->reg_groom_tbl_id);
                    $groomProfileTable->groom_profile_id = $groom_profile_id = random_int(100000, 999999);
                    $groomProfileTable->first_name = $request->first_name;
                    $groomProfileTable->middle_name = $request->middle_name;
                    $groomProfileTable->last_name = $request->last_name;
                    $groomProfileTable->marital_status_tbl_id = $request->marital_status_id;
                    $groomProfileTable->birthday = $request->birthday;
                    $groomProfileTable->age = $request->age;
                    $groomProfileTable->birth_state_tbl_id = $request->birth_state_id;
                    $groomProfileTable->birth_city = $request->birth_city;
                    $groomProfileTable->birth_name = $request->birth_name;
                    $groomProfileTable->birth_time = $request->birth_time;
                    $groomProfileTable->email = Auth::User()->email;
                    $groomProfileTable->mobile_no = $request->mobile_no;
                    $groomProfileTable->manglik = $request->manglik;
                    $groomProfileTable->religion_tbl_id = $request->religion_id;
                    $groomProfileTable->cast = $request->cast;
                    $groomProfileTable->mother_tounge = $request->mother_tounge;
                    $groomProfileTable->sub_cast = $request->sub_cast;
                    $groomProfileTable->gotra = $request->gotra;
                    $groomProfileTable->country = $request->country;
                    $groomProfileTable->current_state_tbl_id = $request->current_state_id;
                    $groomProfileTable->current_city = $request->current_city;
                    $groomProfileTable->proof_identity = $proofIdentity;
                    $groomProfileTable->proof_address = $proofAddress;
                    $groomProfileTable->profile = $ProfileName;
                    $groomProfileTable->body_type = $request->body_type;
                    $groomProfileTable->complexion = $request->complexion;
                    $groomProfileTable->weight = $request->weight;
                    $groomProfileTable->height = $request->height;
                    $groomProfileTable->physical_status = $request->physical_status;
                    $groomProfileTable->blood_group_tbl_id = $request->blood_group;
                    $groomProfileTable->drink = implode(',', $request->drink);
                    $groomProfileTable->smoke = $request->smoke;
                    $groomProfileTable->highest_qualification = $request->highest_qualification;
                    $groomProfileTable->passout_year = $request->passout_year;
                    $groomProfileTable->studied_from = $request->studied_from;
                    $groomProfileTable->occupation = $request->occupation;
                    $groomProfileTable->self_introduce = $request->self_introduce;
                    $groomProfileTable->employed_in = $request->employed_in;
                    $groomProfileTable->annual_income = $request->annual_income;
                    $groomProfileTable->organization_name = $request->organization_name;
                    $groomProfileTable->save();
                    User::where('users.id',Auth::User()->id)->update(array('users.groom_profile_id'=>$groomProfileTable->groom_profile_id,'users.name'=>$request->first_name,'profile'=>$groomProfileTable->profile));
                    // return redirect()->route('family_details')->withErrors(['msg' => 'Groom  Data Succesfully']);

                    $notification = array(
                        'message' => '     Youre Profile Create Succesfully    && Please Fill Below Form !',
                        'alert-type' => 'success' 
                    );
                   return redirect()->route('family_details')->with($notification);

                }else if(Auth::User()->role == 3){
                    $brideProfileTable = new BrideProfile;
                    $brideProfileTable->role = (Auth::User()->role);
                    $brideProfileTable->reg_bride_tbl_id = (Auth::User()->reg_bride_tbl_id);
                    $brideProfileTable->bride_profile_id =  $bride_profile_id = random_int(100000, 999999);
                    $brideProfileTable->first_name = $request->first_name;
                    $brideProfileTable->middle_name = $request->middle_name;
                    $brideProfileTable->last_name = $request->last_name;
                    $brideProfileTable->marital_status_tbl_id = $request->marital_status_id;
                    $brideProfileTable->birthday = $request->birthday;
                    $brideProfileTable->age = $request->age;
                    $brideProfileTable->birth_state_tbl_id = $request->birth_state_id;
                    $brideProfileTable->birth_city = $request->birth_city;
                    $brideProfileTable->birth_name = $request->birth_name;
                    $brideProfileTable->birth_time = $request->birth_time;
                    $brideProfileTable->email = Auth::User()->email;
                    $brideProfileTable->mobile_no = $request->mobile_no;
                    $brideProfileTable->manglik = $request->manglik;
                    $brideProfileTable->religion_tbl_id = $request->religion_id;
                    $brideProfileTable->cast = $request->cast;
                    $brideProfileTable->mother_tounge = $request->mother_tounge;
                    $brideProfileTable->sub_cast = $request->sub_cast;
                    $brideProfileTable->gotra = $request->gotra;
                    $brideProfileTable->country = $request->country;
                    $brideProfileTable->current_state_tbl_id = $request->current_state_id;
                    $brideProfileTable->current_city = $request->current_city;
                    $brideProfileTable->proof_identity = $proofIdentity;
                    $brideProfileTable->proof_address = $proofAddress;
                    $brideProfileTable->profile = $ProfileName;
                    $brideProfileTable->body_type = $request->body_type;
                    $brideProfileTable->complexion = $request->complexion;
                    $brideProfileTable->weight = $request->weight;
                    $brideProfileTable->height = $request->height;
                    $brideProfileTable->physical_status = $request->physical_status;
                    $brideProfileTable->blood_group_tbl_id = $request->blood_group;
                    // $brideProfileTable->drink = $request->drink;
                    $brideProfileTable->drink = implode(',', $request->drink);

                    $brideProfileTable->smoke = $request->smoke;
                    $brideProfileTable->highest_qualification = $request->highest_qualification;
                    $brideProfileTable->passout_year = $request->passout_year;
                    $brideProfileTable->studied_from = $request->studied_from;
                    $brideProfileTable->occupation = $request->occupation;
                    $brideProfileTable->self_introduce = $request->self_introduce;
                    $brideProfileTable->employed_in = $request->employed_in;
                    $brideProfileTable->annual_income = $request->annual_income;
                    $brideProfileTable->organization_name = $request->organization_name;
                    $brideProfileTable->save();
                      User::where('users.id',Auth::User()->id)->update(array('users.bride_profile_id'=>$brideProfileTable->bride_profile_id,'users.name'=>$request->first_name,'profile'=>$brideProfileTable->profile));
                        // return redirect()->route('family_details')->withErrors(['msg' => 'Bride Data Succesfully']);
                    $notification = array(
                     'message' => 'Bride Profile Succesfully!',
                      'alert-type' => 'success' 
                    );
                   return redirect()->route('family_details')->with($notification);

                }
            } 
    }


    public function viewSelfProfile(){
        if(Auth::User() !=null && ( Auth::User()->bride_profile_id != null || Auth::User()->groom_profile_id != null)){
             if(Auth::User() !=null && Auth::User()->role == 2){
                $brideGroomData = GroomProfile::leftjoin('marital_status','groom_profile_tbl.marital_status_tbl_id','=','marital_status.id')
                ->leftjoin('states','groom_profile_tbl.birth_state_tbl_id','=','states.id')
                ->leftjoin('religions','groom_profile_tbl.religion_tbl_id','=','religions.id')
                ->leftjoin('registration_grooms_tbl','groom_profile_tbl.reg_groom_tbl_id','=','registration_grooms_tbl.id')
                ->leftjoin('genders','registration_grooms_tbl.add_bride_groom_table_id','genders.id')
                // ->leftjoin('uploaded ','groom_profile_tbl.id','=','uploaded .bride_groom_profile_id')
                ->leftjoin('blood_groups','groom_profile_tbl.blood_group_tbl_id','=','blood_groups.id')
                ->where('groom_profile_tbl.role',Auth::User()->role)
                ->where('groom_profile_tbl.groom_profile_id',Auth::User()->groom_profile_id)
                ->select('groom_profile_tbl.*','marital_status.marital_status','states.state','religions.religion','genders.bride_groom','blood_groups.blood_group')
                ->get();

                $uploadeImageData = UploadeImage::where('user_tbl_id',Auth::User()->id)
                ->where('bride_groom_profile_role',Auth::User()->role)->select('profile_image')->get();
                return view('bride_groom/view_self_profile',['brideGroomData'=>$brideGroomData,'uploadeImageData'=>$uploadeImageData]);
            }elseif(Auth::User() !=null && Auth::User()->role == 3){
                $brideGroomData = BrideProfile::leftjoin('marital_status','bride_profile_tbl.marital_status_tbl_id','=','marital_status.id')
                ->leftjoin('states','bride_profile_tbl.birth_state_tbl_id','=','states.id')
                ->leftjoin('religions','bride_profile_tbl.religion_tbl_id','=','religions.id')
                ->leftjoin('registration_grooms_tbl','bride_profile_tbl.reg_bride_tbl_id','=','registration_grooms_tbl.id')
                ->leftjoin('genders','registration_grooms_tbl.add_bride_groom_table_id','genders.id')
                ->where('bride_profile_tbl.role',Auth::User()->role)
                ->where('bride_profile_tbl.bride_profile_id',Auth::User()->bride_profile_id)
                ->select('bride_profile_tbl.*','marital_status.marital_status','states.state','religions.religion','genders.bride_groom')
                ->get();
                 $uploadeImageData = UploadeImage::where('user_tbl_id',Auth::User()->id)
                ->where('bride_groom_profile_role',Auth::User()->role)->select('profile_image')->get();
                return view('bride_groom/view_self_profile',['brideGroomData'=>$brideGroomData,'uploadeImageData'=>$uploadeImageData]);
            }else{
                return Redirect::back()->withErrors(['msg' => 'Please Login First']);
            }

        }else{
            $notification = array(
             'message' => 'Please Create Profile First!',
              'alert-type' => 'warning' 
            );
            return redirect()->route('index')->with($notification);
        }
    }

    public function updateSelfProfile(Request $request){
        if($request->bride_groom_role == 2){  //Groom Resize img
            if($request->hasfile('profile')){
                $updateProfile = $request->file('profile');
                $ProfileName = $updateProfile->getClientOriginalName();
                $width = 190; // your max width
                $height = 270; // your max height
                $image_resize = Image::make($updateProfile->getRealPath());              
                $image_resize->resize($width, $height);
                $image_resize->save(public_path('profiles/' .$ProfileName));
                $getOldProfile = GroomProfile::where('id',$request->bride_groom_id)->pluck('profile')->first();
                $getOldProfile = 'profiles/'.$getOldProfile;
                if(is_file($getOldProfile)){
                    unlink($getOldProfile);
                }
                //New Update Image GroomProfile
                GroomProfile::where('id',$request->bride_groom_id)->update(['profile'=>$ProfileName]);
            }
                $upGroomProfileTable = GroomProfile::find($request->bride_groom_id);
                $upGroomProfileTable->first_name = $request->first_name;
                $upGroomProfileTable->middle_name = $request->middle_name;
                $upGroomProfileTable->last_name = $request->last_name;
                $upGroomProfileTable->save();
                // Update Name & Surname in UploadImageTable
               UploadeImage::where('uploaded.bride_groom_profile_id',$request->bride_groom_id)
               ->where('uploaded.bride_groom_profile_role',$request->bride_groom_role)
               ->update(array('uploaded.first_name'=>$request->first_name,'uploaded.last_name'=>$request->last_name));
               if($request->first_name){
                 User::where('users.id',Auth::User()->id)->update(array('users.name'=>$request->first_name));
                }else{
                    User::where('users.id',Auth::User()->id)->update(array('users.name'=>$request->first_name,'profile'=>$ProfileName));
                }
                return Redirect::back()->withErrors(['msg' => 'Profile Update Succesfully']);
        }else if($request->bride_groom_role == 3){  //Bride
            if($request->hasfile('profile')){
                $updateProfile = $request->file('profile');
                $ProfileName = $updateProfile->getClientOriginalName();
                $width = 190; // your max width
                $height = 270; // your max height
                $image_resize = Image::make($updateProfile->getRealPath());              
                $image_resize->resize($width, $height);
                $image_resize->save(public_path('profiles/' .$ProfileName));
                // $newProfile = time().'.'.$request->profile->extension();  
                // $request->profile->move(public_path('profiles'), $newProfile);
                $getOldProfile = BrideProfile::where('id',$request->bride_groom_id)->pluck('profile')->first();
                $getOldProfile = 'profiles/'.$getOldProfile;
                if(is_file($getOldProfile)){
                    unlink($getOldProfile);
                }
                //New Update Image GroomProfile
                BrideProfile::where('id',$request->bride_groom_id)->update(['profile'=>$ProfileName]);
            }
                $upBrideProfileTable = BrideProfile::find($request->bride_groom_id);
                $upBrideProfileTable->first_name = $request->first_name;
                $upBrideProfileTable->middle_name = $request->middle_name;
                $upBrideProfileTable->last_name = $request->last_name;
                $upBrideProfileTable->save();
                // Update Name & surname in UploadImageTable
                UploadeImage::where('uploaded.bride_groom_profile_id',$request->bride_groom_id)
               ->where('uploaded.bride_groom_profile_role',$request->bride_groom_role)
               ->update(array('uploaded.first_name'=>$request->first_name,'uploaded.last_name'=>$request->last_name));
                if($request->first_name){
                   User::where('users.id',Auth::User()->id)->update(array('users.name'=>$request->first_name));
                }else{
                    User::where('users.id',Auth::User()->id)->update(array('users.name'=>$request->first_name,'profile'=>$ProfileName));
                }
                return Redirect::back()->withErrors(['msg' => 'Profile Update Succesfully']);
        }else{
                return Redirect::back()->withErrors(['msg' => 'Bride Groom Profile Not  Updated']);
        }
    }
     
  

    // Destroy image Gallery
    public function destroyImageGallery(){
         if(Auth::User() !=null && Auth::User()->role == 2){
            $uploadeImageData = UploadeImage::where('user_tbl_id',Auth::User()->id)
            ->where('bride_groom_profile_role',Auth::User()->role)->select('*')->get();
             return view('bride_groom/self_image_gallery',['uploadeImageData'=>$uploadeImageData]);
        }elseif(Auth::User() !=null && Auth::User()->role == 3){
            $uploadeImageData = UploadeImage::where('user_tbl_id',Auth::User()->id)
            ->where('bride_groom_profile_role',Auth::User()->role)->select('*')->get();
          return view('bride_groom/self_image_gallery',['uploadeImageData'=>$uploadeImageData]);
         }
    } 
     // Destroy image Gallery   for Bride  && Groom
    function destroyImage($id){
        $getOldProfile = UploadeImage::where('id',$id)->pluck('profile_image')->first();
            $getOldProfile = 'self_profiles/'.$getOldProfile;
            if(is_file($getOldProfile)){
                unlink($getOldProfile);
            }
        $destroyUploadeImage = UploadeImage::find($id);
        $destroyUploadeImage->delete();
        return Redirect::back()->withErrors(['msg' => 'Image Delete Succesfully']);
    }




    public function familyDetails(){
        $maritalStatusTableData  = MaritalStatus::get();
        $statesTableData  = StateModel::get();
        $religionTableData  = Religion::get();
        return view('bride_groom/family_details',['maritalStatusTableData'=>$maritalStatusTableData,'statesTableData'=>$statesTableData,'religionTableData'=>$religionTableData]);

    }

    public function familyDetailsCreate(Request $request){
        // dd($request->all());
        $brideGroomId = $this->getLogedInProfileId();
        $familyDetailsExist = FamilyDetails::where('bride_groom_id',$brideGroomId)
        ->where('bride_groom_role',Auth::User()->role)->count();
        if ($familyDetailsExist > 0) {
            $notification = array(
                'message' => 'Family Details Alredy Exits!',
                'alert-type' => 'warning'
            );
            return redirect()->route('family_details')->with($notification);

        }else{
            $familyDetailsTable = new FamilyDetails;
            $familyDetailsTable->bride_groom_id = $brideGroomId;
            $familyDetailsTable->bride_groom_role = Auth::User()->role;
            $familyDetailsTable->mother_occupation = $request->mother_occupation;
            $familyDetailsTable->father_occupation = $request->father_occupation;
            $familyDetailsTable->family_member = implode(",",$request->family_member);
            $familyDetailsTable->family_income = $request->family_income;
            $familyDetailsTable->state_id = $request->states;
            $familyDetailsTable->city = $request->city;
            $familyDetailsTable->save();
            $notification = array(
                'message' => 'successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('testing_profile')->with($notification);
        } 

    }

    public function partnerPreference(Request $request){
        $brideGroomId = $this->getLogedInProfileId();
        $partnerPreferenceExist = PartnerPreference::where('bride_groom_id',$brideGroomId)
        ->where('bride_groom_role',Auth::User()->role)->count();
        if ($partnerPreferenceExist > 0) {
            $notification = array(
                'message' => ' Patner Preference Alredy Exits!',
                'alert-type' => 'warning'
            );
            return redirect()->route('family_details')->with($notification);

        }else{
            $partnerPreferenceTable = new PartnerPreference;
            $partnerPreferenceTable->bride_groom_id = $brideGroomId;
            $partnerPreferenceTable->bride_groom_role = Auth::User()->role;
            $partnerPreferenceTable->age = $request->age;
            $partnerPreferenceTable->marital_status_id = $request->marital_status;
            $partnerPreferenceTable->complexion = $request->complexion;
            $partnerPreferenceTable->height = $request->height;
            $partnerPreferenceTable->cast = $request->cast;
            $partnerPreferenceTable->religion_id = $request->religion;
            $partnerPreferenceTable->state_id = $request->states;
            $partnerPreferenceTable->education = $request->education;
            $partnerPreferenceTable->occupation = $request->occupation;
            $partnerPreferenceTable->save();
            // return Redirect::back()->withErrors(['msg' => 'Add Patner Preference   Succesfully']);
            $notification = array(
                'message' => 'successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('family_details')->with($notification);
        }
    }
    
    public function updatePartnerPreferance(Request $request){

        
        // dd($request->all());
        $updatePartnerPreference = PartnerPreference::find($request->patner_preferance_id);
        $updatePartnerPreference->education = $request->education;
        $updatePartnerPreference->occupation = $request->occupation;
        $updatePartnerPreference->age = $request->age;
        $updatePartnerPreference->marital_status_id = $request->marital_status;
        $updatePartnerPreference->cast = $request->cast;
        $updatePartnerPreference->religion_id = $request->religion;
        $updatePartnerPreference->save();
        // return Redirect::back()->withErrors(['msg' => 'Update Succesfully']);

         $notification = array(
            'message' => 'Update Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('testing_profile')->with($notification);
    }


    public function testing_profile(){
        if(Auth::User() !=null && Auth::User()->role == 2){
            $groom_profile_id =  $this->getLogedInProfileId();
            $friendsList = ProposalRequest::leftjoin('bride_profile_tbl','proposal_request.proposed_to','=','bride_profile_tbl.id')
            ->select('proposal_request.*','bride_profile_tbl.first_name','bride_profile_tbl.last_name','bride_profile_tbl.profile','bride_profile_tbl.id')
            ->where('proposal_request.proposed_by_groom',$groom_profile_id)
            ->where('proposal_request.proposed_by_role',2)
            ->where('proposal_request.proposel_status',1)->get();

            $groomDetails = GroomProfile::leftjoin('marital_status','groom_profile_tbl.marital_status_tbl_id','=','marital_status.id')
                ->leftjoin('states','groom_profile_tbl.birth_state_tbl_id','=','states.id')
                ->leftjoin('religions','groom_profile_tbl.religion_tbl_id','=','religions.id')
                ->leftjoin('registration_grooms_tbl','groom_profile_tbl.reg_groom_tbl_id','=','registration_grooms_tbl.id')
                ->leftjoin('genders','registration_grooms_tbl.add_bride_groom_table_id','genders.id')
                // ->leftjoin('uploaded ','groom_profile_tbl.id','=','uploaded .bride_groom_profile_id')
                ->where('groom_profile_tbl.role',Auth::User()->role)
                ->where('groom_profile_tbl.groom_profile_id',Auth::User()->groom_profile_id)
                ->select('groom_profile_tbl.age','groom_profile_tbl.cast','groom_profile_tbl.weight','groom_profile_tbl.height','marital_status.marital_status','states.state','religions.religion')
                ->first();
            $brideGroomMatchDetails = BrideProfile::leftjoin('marital_status','bride_profile_tbl.marital_status_tbl_id','=','marital_status.id')
                ->leftjoin('states','bride_profile_tbl.birth_state_tbl_id','=','states.id')
                ->leftjoin('religions','bride_profile_tbl.religion_tbl_id','=','religions.id')
                ->leftjoin('registration_grooms_tbl','bride_profile_tbl.reg_bride_tbl_id','=','registration_grooms_tbl.id')
                ->leftjoin('genders','registration_grooms_tbl.add_bride_groom_table_id','genders.id')
               ->orwhere('age',$groomDetails->age)
               ->orwhere('age',$groomDetails->cast)
               ->orwhere('weight',$groomDetails->weight)
               ->orwhere('height',$groomDetails->height)
               ->orwhere('marital_status',$groomDetails->marital_status)
               ->orwhere('state',$groomDetails->state)
               ->orwhere('religion',$groomDetails->religion)
                ->select('bride_profile_tbl.*','marital_status.marital_status','states.state','religions.religion','genders.bride_groom')
                ->get();
             $coverProfile = CoverProfile::where('bride_groom_profile_id',$groom_profile_id)
                ->where('bride_groom_profile_role',Auth::User()->role)
                ->select('cover_profile')
                ->first();
            $brideGroomProfile = GroomProfile::leftjoin('marital_status','groom_profile_tbl.marital_status_tbl_id','=','marital_status.id')
                ->leftjoin('states','groom_profile_tbl.birth_state_tbl_id','=','states.id')
                ->leftjoin('religions','groom_profile_tbl.religion_tbl_id','=','religions.id')
                ->leftjoin('registration_grooms_tbl','groom_profile_tbl.reg_groom_tbl_id','=','registration_grooms_tbl.id')
                ->leftjoin('genders','registration_grooms_tbl.add_bride_groom_table_id','genders.id')
                // ->leftjoin('uploaded ','groom_profile_tbl.id','=','uploaded .bride_groom_profile_id')
                ->leftjoin('blood_groups','groom_profile_tbl.blood_group_tbl_id','=','blood_groups.id')
                ->where('groom_profile_tbl.role',Auth::User()->role)
                ->where('groom_profile_tbl.groom_profile_id',Auth::User()->groom_profile_id)
                ->select('groom_profile_tbl.*','marital_status.marital_status','states.state','religions.religion','genders.bride_groom','blood_groups.blood_group','genders.bride_groom')
                ->first();

            $partnerPreference = PartnerPreference::leftjoin('marital_status','partner_preference.marital_status_id','=','marital_status.id')
                ->leftjoin('states','partner_preference.state_id','=','states.id')
                ->leftjoin('religions','partner_preference.religion_id','=','religions.id')
                ->where('bride_groom_id',$groom_profile_id)
                ->where('bride_groom_role',Auth::User()->role)
                ->select('partner_preference.*','marital_status.marital_status','states.state',)
                ->first();

                // dd('chack',$partnerPreference);

             $familyDetails = FamilyDetails::leftjoin('states','family_details.state_id','=','states.id')
                // ->leftjoin('religions','partner_preference.religion_id','=','religions.id')
                ->where('family_details.bride_groom_id',$groom_profile_id)
                ->where('bride_groom_role',Auth::User()->role)
                ->first();

            $maritalStatusTableData  = MaritalStatus::get();
            $statesTableData  = StateModel::get();
            $religionTableData  = Religion::get();

             return view('bride_groom/testing_profile',['friendsList'=>$friendsList,'brideGroomMatchDetails'=>$brideGroomMatchDetails,'coverProfile'=>$coverProfile,'brideGroomProfile'=>$brideGroomProfile,'partnerPreference'=>$partnerPreference,'familyDetails'=>$familyDetails,'maritalStatusTableData'=>$maritalStatusTableData,'religionTableData'=>$religionTableData]);
        }elseif(Auth::User() !=null && Auth::User()->role == 3){
            $bride_profile_id =  $this->getLogedInProfileId();
            // dd($bride_profile_id);
            $friendsList = ProposalRequest::leftjoin('groom_profile_tbl','proposal_request.proposed_to','=','groom_profile_tbl.id')
            ->select('proposal_request.*','groom_profile_tbl.first_name','groom_profile_tbl.last_name','groom_profile_tbl.profile','groom_profile_tbl.id')
            ->where('proposal_request.proposed_by_bride',$bride_profile_id)
            ->where('proposal_request.proposed_by_role',3)
            ->where('proposal_request.proposel_status',1)->get();
            $brideDetails = BrideProfile::leftjoin('marital_status','bride_profile_tbl.marital_status_tbl_id','=','marital_status.id')
                ->leftjoin('states','bride_profile_tbl.birth_state_tbl_id','=','states.id')
                ->leftjoin('religions','bride_profile_tbl.religion_tbl_id','=','religions.id')
                ->leftjoin('registration_brides_tbl','bride_profile_tbl.reg_bride_tbl_id','=','registration_brides_tbl.id')
                ->leftjoin('genders','registration_brides_tbl.add_bride_groom_table_id','genders.id')
                // ->leftjoin('uploaded ','groom_profile_tbl.id','=','uploaded .bride_groom_profile_id')
                ->where('bride_profile_tbl.role',Auth::User()->role)
                ->where('bride_profile_tbl.bride_profile_id',Auth::User()->bride_profile_id)
                ->select('bride_profile_tbl.age','bride_profile_tbl.cast','bride_profile_tbl.weight','bride_profile_tbl.height','marital_status.marital_status','states.state','religions.religion')
                ->first();
            $brideGroomMatchDetails = GroomProfile::leftjoin('marital_status','groom_profile_tbl.marital_status_tbl_id','=','marital_status.id')
                ->leftjoin('states','groom_profile_tbl.birth_state_tbl_id','=','states.id')
                ->leftjoin('religions','groom_profile_tbl.religion_tbl_id','=','religions.id')
                ->leftjoin('registration_grooms_tbl','groom_profile_tbl.reg_groom_tbl_id','=','registration_grooms_tbl.id')
                ->leftjoin('genders','registration_grooms_tbl.add_bride_groom_table_id','genders.id')
               ->orwhere('age',$brideDetails->age)
               ->orwhere('age',$brideDetails->cast)
               ->orwhere('weight',$brideDetails->weight)
               ->orwhere('height',$brideDetails->height)
               ->orwhere('marital_status',$brideDetails->marital_status)
               ->orwhere('state',$brideDetails->state)
               ->orwhere('religion',$brideDetails->religion)
                ->select('groom_profile_tbl.*','marital_status.marital_status','states.state','religions.religion','genders.bride_groom')
                ->get();

             $coverProfile = CoverProfile::where('bride_groom_profile_id',$bride_profile_id)
                ->where('bride_groom_profile_role',Auth::User()->role)
                ->select('cover_profile')
                ->first();
            $brideGroomProfile = BrideProfile::leftjoin('marital_status','bride_profile_tbl.marital_status_tbl_id','=','marital_status.id')
                ->leftjoin('states','bride_profile_tbl.birth_state_tbl_id','=','states.id')
                ->leftjoin('religions','bride_profile_tbl.religion_tbl_id','=','religions.id')
                ->leftjoin('registration_grooms_tbl','bride_profile_tbl.reg_bride_tbl_id','=','registration_grooms_tbl.id')
                ->leftjoin('genders','registration_grooms_tbl.add_bride_groom_table_id','genders.id')
                ->leftjoin('blood_groups','bride_profile_tbl.blood_group_tbl_id','=','blood_groups.id')
                ->where('bride_profile_tbl.role',Auth::User()->role)
                ->where('bride_profile_tbl.bride_profile_id',Auth::User()->bride_profile_id)
                ->select('bride_profile_tbl.*','marital_status.marital_status','states.state','religions.religion','genders.bride_groom','blood_groups.blood_group','genders.bride_groom')
                ->first();
                // dd('brideGroomProfile',$brideGroomProfile);

             $partnerPreference = PartnerPreference::leftjoin('marital_status','partner_preference.marital_status_id','=','marital_status.id')
                ->leftjoin('states','partner_preference.state_id','=','states.id')
                ->leftjoin('religions','partner_preference.religion_id','=','religions.id')
                ->where('bride_groom_id',$bride_profile_id)
                ->where('bride_groom_role',Auth::User()->role)
                ->select('partner_preference.*','marital_status.marital_status','states.state',)
                ->first();
                 $familyDetails = FamilyDetails::leftjoin('states','family_details.state_id','=','states.id','religions.religion')
                ->where('bride_groom_id',$bride_profile_id)
                ->where('bride_groom_role',Auth::User()->role)
                ->first();

                $maritalStatusTableData  = MaritalStatus::get();
                $statesTableData  = StateModel::get();
                $religionTableData  = Religion::get();

                return view('bride_groom/testing_profile',['friendsList'=>$friendsList,'brideGroomMatchDetails'=>$brideGroomMatchDetails,'coverProfile'=>$coverProfile,'brideGroomProfile'=>$brideGroomProfile,'partnerPreference'=>$partnerPreference,'familyDetails'=>$familyDetails,'maritalStatusTableData'=>$maritalStatusTableData,'religionTableData'=>$religionTableData]);
           }else{
                return redirect()->route('login')->withErrors(['msg' => 'Please  Login First']);
            }

    }








        public function uploadCoverProfile(Request $request){
            $bride_groom_profile_id = $this->getLogedInProfileId();
                if($request->file){
                    $coverProfileName = time().'.'.$request->file->extension();  
                    $request->file->move(public_path('cover_profile'), $coverProfileName);

                    //check if for this user cover picture is already added
                    $existingCoverImg = CoverProfile::where('bride_groom_profile_id',$bride_groom_profile_id)
                    ->where('bride_groom_profile_role',Auth::User()->role)
                    ->select('bride_groom_profile_id','cover_profile')->first();

                    if($existingCoverImg != null && $existingCoverImg->cover_profile != null && $existingCoverImg->cover_profile != '' ){
                        $oldImgPath = 'cover_profile/'.$existingCoverImg->cover_profile;
                        if(is_file($oldImgPath)){
                            unlink($oldImgPath);
                        }
                        //uodating new img 
                        CoverProfile::where('bride_groom_profile_id',$bride_groom_profile_id)
                        ->where('bride_groom_profile_role',Auth::User()->role)
                        ->update(['cover_profile'=>$coverProfileName]);
                    }else{
                        $coverProfile = new CoverProfile;
                        $coverProfile->bride_groom_profile_id = $bride_groom_profile_id;
                        $coverProfile->bride_groom_profile_role = (Auth::User()->role);
                        $coverProfile->cover_profile = $coverProfileName;
                        $coverProfile->save();
                    }
                    $coverProfile = CoverProfile::where('bride_groom_profile_id',$bride_groom_profile_id)
                    ->where('bride_groom_profile_role',Auth::User()->role)->first();
                    return json_encode(['profile'=>$coverProfile]);
                }else{
                     return json_encode(['msg'=>'Error : Please select file']);
                 }
        }




        public function updateProfile(Request $request){
      

                $bride_groom_profile_id = $this->getLogedInProfileId();
                if($request->file){
                    $ProfileName = time().'.'.$request->file->extension();  
                    $request->file->move(public_path('profiles'), $ProfileName);

                     if(Auth::User() !=null && Auth::User()->role == 2){

                        $getOldProfile = GroomProfile::where('id',$bride_groom_profile_id)->pluck('profile')->first();
                        $getOldProfile = 'profiles/'.$getOldProfile;
                        if(is_file($getOldProfile)){
                            unlink($getOldProfile);
                        }

                        GroomProfile::where('id',$bride_groom_profile_id)
                        ->where('role',Auth::User()->role)
                        ->update(['profile'=>$ProfileName]);

                        User::where('id',Auth::User()->id)
                        ->where('role',Auth::User()->role)
                        ->update(['profile'=>$ProfileName]);
                       return json_encode(['profile'=>$ProfileName]);
                    }elseif(Auth::User() !=null && Auth::User()->role == 3){

                        $getOldProfile = BrideProfile::where('id',$bride_groom_profile_id)->pluck('profile')->first();
                        $getOldProfile = 'profiles/'.$getOldProfile;
                        if(is_file($getOldProfile)){
                            unlink($getOldProfile);
                        }

                        BrideProfile::where('id',$bride_groom_profile_id)
                        ->where('role',Auth::User()->role)
                        ->update(['profile'=>$ProfileName]);

                         User::where('id',Auth::User()->id)
                        ->where('role',Auth::User()->role)
                        ->update(['profile'=>$ProfileName]);
                       return json_encode(['profile'=>$ProfileName]);

                      }  

                }else{
                    return json_encode(['msg'=>'Error : Please select file']);
                 }
            
        }


        public function uploadImages(Request $request){
             $bride_groom_profile_id = $this->getLogedInProfileId();
             if(Auth::User()->role == 2){
                $brideGroomData = GroomProfile::where('id',$bride_groom_profile_id)->select('role','first_name','last_name')->first();
             }else{
                $brideGroomData = BrideProfile::where('id',$bride_groom_profile_id)->select('role','first_name','last_name')->first();
             }
            if($request->file){
                $image  = $request->file('file');
                $filename = $image->getClientOriginalName();
                // Unique Img
                $profileImgArray = [];
                $profileImg = UploadeImage::where('user_tbl_id',Auth::User()->id)->select('profile_image')->get();
                for($i = 0; $i<count($profileImg); $i++){
                   $profileImgArray[]=$profileImg[$i]['profile_image'];
                }
                if (in_array($filename,$profileImgArray)){
                     return json_encode(['msg'=>'Please Try Other Image This Image Alredy Exit','status'=>200]);
                }else{
                        $width = 190; // your max width
                        $height = 270; // your max height
                          $image_resize = Image::make($image->getRealPath()); 
                        $image_resize->resize($width, $height);
                        $image_resize->save(public_path('self_profiles/' .$filename));
                        $uploadeImagesTbl = new UploadeImage;
                        $uploadeImagesTbl->bride_groom_profile_id = $bride_groom_profile_id;
                        $uploadeImagesTbl->user_tbl_id = Auth::User()->id;
                        $uploadeImagesTbl->bride_groom_profile_role = $brideGroomData->role;
                        $uploadeImagesTbl->first_name = $brideGroomData->first_name;
                        $uploadeImagesTbl->last_name = $brideGroomData->last_name;
                        $uploadeImagesTbl->profile_image = $filename;
                        $uploadeImagesTbl->save();
                     return json_encode(['msg'=>'Image Uplode Succesfully','status'=>1]);

                }
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



}






