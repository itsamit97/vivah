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
// use Intervention\Image\ImageManagerStatic as Image;


class BrideGroomController extends Controller
{
    public function selfProfileForm(){
        if(Auth::User() != null && (Auth::User()->bride_profile_id != null || Auth::User()->groom_profile_id != null)){
            return Redirect::back()->withErrors(['msg' => 'Profile Alredy 1Taken']);
        }else{
            if(Auth::User() !=null){
                $maritalStatusTableData  = MaritalStatus::get();
                $statesTableData  = StateModel::get();
                $religionTableData  = Religion::get();
                return view('bride_groom/create_self_profile',['maritalStatusTableData'=>$maritalStatusTableData,'statesTableData'=>$statesTableData,'religionTableData'=>$religionTableData]);
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
        // $selfProfile = time().'.'.$request->profile->extension();  
        // $request->profile->move(public_path('profiles'), $selfProfile);
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
                    $groomProfileTable->blood_group = $request->blood_group;
                    $groomProfileTable->drink = $request->drink;
                    $groomProfileTable->smoke = $request->smoke;
                    $groomProfileTable->highest_qualification = $request->highest_qualification;
                    $groomProfileTable->passout_year = $request->passout_year;
                    $groomProfileTable->studied_from = $request->studied_from;
                    $groomProfileTable->occupation = $request->occupation;
                    $groomProfileTable->save();
                    User::where('users.id',Auth::User()->id)->update(array('users.groom_profile_id'=>$groomProfileTable->groom_profile_id));
                    return redirect()->route('index')->withErrors(['msg' => 'Groom  Data Succesfully']);
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
                    $brideProfileTable->email = Auth::User()->email;;
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
                    $brideProfileTable->blood_group = $request->blood_group;
                    $brideProfileTable->drink = $request->drink;
                    $brideProfileTable->smoke = $request->smoke;
                    $brideProfileTable->highest_qualification = $request->highest_qualification;
                    $brideProfileTable->passout_year = $request->passout_year;
                    $brideProfileTable->studied_from = $request->studied_from;
                    $brideProfileTable->occupation = $request->occupation;
                    $brideProfileTable->save();
                     User::where('users.id',Auth::User()->id)->update(array('users.bride_profile_id'=>$brideProfileTable->bride_profile_id));
                    return redirect()->route('index')->withErrors(['msg' => 'Bride Data Succesfully']);
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
                ->where('groom_profile_tbl.role',Auth::User()->role)
                ->where('groom_profile_tbl.groom_profile_id',Auth::User()->groom_profile_id)
                ->select('groom_profile_tbl.*','marital_status.marital_status','states.state','religions.religion','genders.bride_groom')
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
             return redirect()->route('index')->withErrors(['msg' => 'Please Create Profile First']);
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
                return Redirect::back()->withErrors(['msg' => 'Profile Update Succesfully']);
        }else{
                return Redirect::back()->withErrors(['msg' => 'Bride Groom Profile Not  Updated']);
        }
    }
     
    // uploadeImages in view_self_profile
    public function uploadImage(Request $request){
        $this->validate($request, [
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
            if($request->hasfile('profile_image')){
                $image  = $request->file('profile_image');
                $filename = $image->getClientOriginalName();
                // Unique Img
                $profileImgArray = [];
                $profileImg = UploadeImage::where('user_tbl_id',Auth::User()->id)->select('profile_image')->get();
                for($i = 0; $i<count($profileImg); $i++){
                   $profileImgArray[]=$profileImg[$i]['profile_image'];
                }

                if (in_array($filename,$profileImgArray)){
                   $data = [
                      'status' => true,
                      'message'=> 'Please Try Other Image This Image Alredy Exit'
                    ] ;
                    return response()->json($data);
                }else{
                    if(count($profileImgArray) >=3) {
                        $data = [
                          'success' => true,
                          'message'=> 'Only Upload Three images'
                        ] ;
                         return response()->json($data); 
                    }else{

                        $width = 190; // your max width
                        $height = 270; // your max height
                          $image_resize = Image::make($image->getRealPath()); 
                        $image_resize->resize($width, $height);
                        $image_resize->save(public_path('self_profiles/' .$filename));
                        $uploadeImagesTbl = new UploadeImage;
                        $uploadeImagesTbl->bride_groom_profile_id = $request->Profile_tbl_id;
                        $uploadeImagesTbl->user_tbl_id = Auth::User()->id;
                        $uploadeImagesTbl->bride_groom_profile_role = $request->role;
                        $uploadeImagesTbl->first_name = $request->first_name;
                        $uploadeImagesTbl->last_name = $request->last_name;
                        $uploadeImagesTbl->profile_image = $filename;
                        $uploadeImagesTbl->save();
                        $data = [
                                  'status' => true,
                                  'message'=> 'Image Uplode Succesfully'
                                ] ;
                                return response()->json($data);
                    }     
                }
            
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

}
