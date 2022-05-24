<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gender;
use App\MaritalStatus;
use App\StateModel;
use App\Religion;
use App\User;
use App\AdminProfile;
use Auth;
use Redirect;
class SuperAdminController extends Controller
{
    public function superAdminIndex (){
        $groomRegistrationsCount =  User::where('role',2)->count();
        $brideRegistrationsCount =  User::where('role',3)->count();
        $adminProfile = AdminProfile::get();

        return view('super_admin/index',['groomRegistrationsCount'=>$groomRegistrationsCount,'brideRegistrationsCount'=>$brideRegistrationsCount,'adminProfile'=>$adminProfile]);
    }

    // addbride_groom  for crete registration
    public function brideGroomGenderTable(){
        $brideGroomGenders  = Gender::get();
       return view('super_admin/bride_groom_gender',['brideGroomGenders'=>$brideGroomGenders]);
    }

      
    public function  brideGroomCreate(Request $request){
        $this->validate($request,[
         'bride_groom' => 'required|unique:genders',
         'gender'=>'required',
        ]);
        $addBrideGroomTable = new Gender;
        $addBrideGroomTable->bride_groom = ucwords($request->bride_groom);
        $addBrideGroomTable->gender = $request->gender;
        $addBrideGroomTable->save();
        return redirect()->route('bride_groom');
    }


    public function maritalStatusTable(){
        $maritalStatusTableData  = MaritalStatus::get();
        return view('super_admin/marital_status',['maritalStatusTableData'=>$maritalStatusTableData]);
    }

    public function maritalStatusCreate(Request $request){
        $this->validate($request,[
         'marital_status' => 'required|unique:marital_status',
        ]);
        $maritalStatusTable = new MaritalStatus;
        $maritalStatusTable->marital_status  = ucwords($request->marital_status);
        $maritalStatusTable->save();
         return redirect()->route('marital_status');
    }

    public function stateTable(){
        $StatesTableData  = StateModel::paginate(7);
        return view('super_admin/states',['StatesTableData'=>$StatesTableData]);
    }

    public function stateCreate(Request $request){
        $this->validate($request,[
         'state' => 'required|unique:states',
        ]);
        $stateTable = new StateModel;
        $stateTable->state = ucwords($request->state);
        $stateTable->save();
        return redirect()->route('state');
    }

    public function religionTable (){
        $religionTableData  = Religion::paginate(7);
        return view('super_admin/religions',['religionTableData'=>$religionTableData]);
    }

    public function religionCreate(Request $request){
        $religionTable = new Religion;
        $religionTable->religion = ucwords($request->religion);
        $religionTable->save();
        return redirect()->route('religion');
    }

    public function brideRegistrationView(Request $request){
        $brideRegistrationData = User::where('role',3)->paginate(5);
        return view('super_admin/bride_registration',['brideRegistrationData'=>$brideRegistrationData]);
    }

    public function groomRegistrationView(Request $request){
        $groomRegistrationData = User::where('role',2)->paginate(5);
        return view('super_admin/groom_registration',['groomRegistrationData'=>$groomRegistrationData]);
    }

    public function superAdminProfile(){
        $adminProfile = AdminProfile::get();
        return view('super_admin/super_admin_profile',['adminProfile'=>$adminProfile]);
    }

    public function createProfile(Request $request){
        $counAadminProfile = AdminProfile::count();
        if($counAadminProfile){
            return Redirect::back()->withErrors(['msg' => 'Adin Profile Alredy Exit']);

        }
        // dd('counAadminProfile',$counAadminProfile);
        $selfProfile = time().'.'.$request->profile->extension();  
        $request->profile->move(public_path('profiles'), $selfProfile);
        $adminProfile = new AdminProfile;
        $adminProfile ->first_name = $request->first_name; 
        $adminProfile->last_name = $request->last_name;
        $adminProfile->profile = $selfProfile;
        $adminProfile->role = Auth::User()->role;
        $adminProfile->save();
        return Redirect::back()->withErrors(['msg' => 'Profile create  Succesfully']);
    }


    public function updateProfile(Request $request){
        if($request->hasfile('profile')){
            $selfProfile = time().'.'.$request->profile->extension();  
            $request->profile->move(public_path('profiles'), $selfProfile);
            $oldImg = AdminProfile::where('id',$request->admin_profile_id)->pluck('profile')->first();
                if(is_file($oldImg)){
                     unlink('profiles/'.$oldImg);
                }
                AdminProfile::where('id',$request->admin_profile_id)->update(['profile'=>$selfProfile]);
        }
            $adminProfileu = AdminProfile::find($request->admin_profile_id);
            $adminProfileu ->first_name = $request->first_name; 
            $adminProfileu->last_name = $request->last_name;
            $adminProfileu->save();
            return Redirect::back()->withErrors(['msg' => 'Update Succesfully']);
    }

    public function groomSearchRegistration(Request $request){
        $groomRegistrationData = User::where('role',2)
        ->where('email','LIKE','%'.$request->search_email.'%')->paginate('4');
        return view('super_admin/groom_registration',['groomRegistrationData'=>$groomRegistrationData]);
    }
    public function brideSearchRegistration(Request $request){
        $brideRegistrationData = User::where('role',3)
        ->where('email','LIKE','%'.$request->search_email.'%')->paginate('4');
        return view('super_admin/bride_registration',['brideRegistrationData'=>$brideRegistrationData]);
    }
    public function adminLogout(){
           auth()->logout();
           return redirect()->route('login');
    }



}

