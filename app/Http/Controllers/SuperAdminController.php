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
use App\BloodGroup;
use App\SuccessCouple;
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

    function destroyBrideGroomGender($id){
        $destroyBrideGroomGender = Gender::find($id);
        $destroyBrideGroomGender->delete();
        // return redirect()->route('bride_groom');
        return Redirect::back()->withErrors(['msg' => 'Deta Destroy Succesfully']);


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

     function destroyMaritalStatus($id){
        $destroyBrideGroomGender = MaritalStatus::find($id);
        $destroyBrideGroomGender->delete();
        // return redirect()->route('bride_groom');
        return Redirect::back()->withErrors(['msg' => 'Deta Destroy Succesfully']);
    }



    public function stateTable(){
        $statesTableData  = StateModel::paginate(7);
        return view('super_admin/states',['statesTableData'=>$statesTableData]);
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

    function destroyState($id){
        $destroyBrideGroomGender = StateModel::find($id);
        $destroyBrideGroomGender->delete();
        // return redirect()->route('bride_groom');
        return Redirect::back()->withErrors(['msg' => 'Deta Destroy Succesfully']);
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

      function destroyReligion($id){
        $destroyBrideGroomGender = Religion::find($id);
        $destroyBrideGroomGender->delete();
        // return redirect()->route('bride_groom');
        return Redirect::back()->withErrors(['msg' => 'Deta Destroy Succesfully']);
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
        // $adminProfile = AdminProfile::get();


        $adminProfile = AdminProfile::leftjoin('users','admin_profile.role','=','users.role')
        ->select('admin_profile.*','users.email','users.show_password')
        ->where('admin_profile.role',Auth::User()->role)
        ->get();
            // dd('adminProfile',$adminProfile);

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
             //email&& password update
            $bcryptPassword = bcrypt($request->password);
            User::where('id',1)->update(['email'=>$request->email,'show_password'=>$request->password,'password'=>$bcryptPassword]); 

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

    // superAdmin set email password automatic for link
    public function superAdmin(){
        $adminExists = User::where('role',1)->count();
        if($adminExists){
           return redirect()->route('login');
        }else{
                $email = "superadmin@gmail.com"; 
                // $password = "$2y$10$evsTqnEyvqLd1MFDfYiFC.ZLhTL6TUoIU2xS7cqzx4uRCoj1egmWy";
                $show_password = "password";
                $password = bcrypt("password");
                $usersTable = new User;
                $usersTable->email =  $email;
                $usersTable->password = $password;
                $usersTable->show_password = $show_password;
                $usersTable->role = 1;
                $usersTable->save();
                 $notification = array(
                    'message' => 'Please Fill Filter Box!',
                    'alert-type' => 'warning'
                );
                return redirect()->route('login')->with($notification);
            }
    }


    public function bloodGroupTable(){
        $bloodGroupTblData = BloodGroup::get();
        return view('super_admin/blood_group',['bloodGroupTblData'=>$bloodGroupTblData]);
    }

    public function bloodGroupCreate(Request $request){
        $bloodGroupTable = new BloodGroup;
        $bloodGroupTable->blood_group  = ucfirst($request->blood_group);
        $bloodGroupTable->save();
        return Redirect::back()->withErrors(['msg' => 'Blood Groop Add Succesfully']);
    }
    
    public function destroyBloodGroup($id){
        $destroyBloodGroop = BloodGroup::find($id);
        $destroyBloodGroop->delete();
        return Redirect::back()->withErrors(['msg' => 'Blood Groop Delete Succesfully']);
    }


    public function successCoupleTable(){
        $successCoupleData = SuccessCouple::paginate(5);
        return view('super_admin/success_couple',['successCoupleData'=>$successCoupleData]);
    }

    public function successCoupleCreate(Request $request){
        // dd($request->all());
        if($request->hasfile('success_couple')){
            $successCoupleImg = time().'.'.$request->success_couple->extension();  
            $request->success_couple->move(public_path('success_couple_profiles'), $successCoupleImg);
        }
       $successCouple = new SuccessCouple;
       $successCouple->success_couple = $successCoupleImg;
       $successCouple->bride_name = $request->bride_name;
       $successCouple->groom_name = $request->groom_name;
       $successCouple->wedding_year = $request->wedding_year;
       $successCouple->save();
       return Redirect::back()->withErrors(['msg' => 'Success Couple Succesfully']);

    }

    function destroySuccessCouple($id){
         $successCouple =  SuccessCouple::find($id);
         $successCouple->delete();
       return Redirect::back()->withErrors(['msg' => 'Destroye Success Couple Succesfully']);


    }




}
