<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use App\ User;
use Auth;
use Redirect;
use Mail;
use App\Mail\send_bride_groom_mail;
use App\GroomRegistration;
use App\BrideRegistration;
use App\Gender;
use DateTime;

class RegistrationController extends Controller
{
    // Start Registration Only Bride & Groom  And Login SuperAdmin This Controller
    public function brideGroomLoginForm(){
        return view('registrations/login');
    }
    public function brideGroomSuperAdminLogin(Request $request){
        // SuperAdmin
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password, 'role'=>'1'])){
            return redirect()->route('super_admin_index');
        }elseif(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
           return redirect()->route('index');
        }else{
         return Redirect::back()->withErrors(['msg' => 'Incorect Email Password']);  
        }
    }

    public function brideGroomRegistration(){
        $registrationForData = Gender::get();
        return view('registrations/registration',['registrationForData'=>$registrationForData]);
    }

    public function brideGroomRegistrationCreate(Request $request){
        $this->validate($request,[
           'email' => 'required|email|unique:users,email',  
           'password'=>'required',
           'conf_password'=>'required|same:password',
           'gender'=>'required',
       ]);
        // Start Email Bride Groom Code; && // include three table usersTable & brideTbl & groomTbl
        $data = array(
            'title' => 'testing email for bride & groom',
            'message' => 'Thank you for registration 1vivah .com'
        );
        Mail::to($request->email)->send(new send_bride_groom_mail($data));
        echo"Email has been send";
        $ldate = new DateTime('now');
        $usersTable = new User;
        if($request->gender == 'male'){
           $groomTbl = new GroomRegistration;
           $groomTbl->add_bride_groom_table_id =  $request->add_bride_groom_table_id;
           $groomTbl->email = $request->email;
           $groomTbl->password = bcrypt($request->password);
             // $groomTbl->show_password = $request->password;
           $groomTbl->gender = $request->gender;
           $groomTbl->role  = 2;
           $groomTbl->save();
           $usersTable->reg_groom_tbl_id = $groomTbl->id;
           $usersTable->role = $groomTbl->role;
       }else{
           $brideTbl = new BrideRegistration;
           $brideTbl->add_bride_groom_table_id =  $request->add_bride_groom_table_id;
           $brideTbl->email = $request->email;
           $brideTbl->password = bcrypt($request->password);
           $brideTbl->gender = $request->gender;
           $brideTbl->role  = 3;
           $brideTbl->save();
           $usersTable->reg_bride_tbl_id = $brideTbl->id;
           $usersTable->role = $brideTbl->role;
       }
           $usersTable->email = $request->email;
           $usersTable->password = bcrypt($request->password);
           $usersTable->show_password = $request->password;
           $usersTable->save();
                // return redirect()->route('login');
           return redirect()->route('login')->withErrors(['msg' => 'Registration successfully']);
    }

    public function getGenderName($id){
        $getGenderNameData = Gender::select('gender')->where('id',$id)->first();
        return json_encode(['status'=>'success','data'=>$getGenderNameData]);
    }
    public function serviceProviderRegistration(){
        return view('registrations/service_provider_reg');
    }
}


