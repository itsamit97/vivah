<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use App\ User;
use Auth;
use Redirect;
use Mail;
use App\Mail\send_bride_groom_mail;
use App\Mail\forgot_password;

use App\GroomRegistration;
use App\BrideRegistration;
use App\Gender;
use DateTime;
use App\RegistrationBy;
use Stevebauman\Location\Facades\Location;

class RegistrationController extends Controller
{
    // Start Registration Only Bride & Groom  And Login SuperAdmin This Controller
    public function brideGroomLoginForm(){
        $userData = User::get();
        return view('registrations/login',['userData'=>$userData]);
    }
    public function brideGroomSuperAdminLogin(Request $request){
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password, 'role'=>'1'])){
            return redirect()->route('super_admin_index');
        }elseif(Auth::attempt(['email'=>$request->email_mobile_no, 'password'=>$request->password,'mail_otp'=>$request->mail_otp])){
            //email
            User::where('email',$request->email_mobile_no)->where('mail_otp',$request->mail_otp)->update(['otp_access'=>'Yes']);
            return redirect()->route('index');
        }elseif(Auth::attempt(['mobile_no'=>$request->email_mobile_no, 'password'=>$request->password,'mail_otp'=>$request->mail_otp])){
            //mobile_no
            User::where('mobile_no',$request->email_mobile_no)->where('mail_otp',$request->mail_otp)->update(['otp_access'=>'Yes']);
            return redirect()->route('index');

        }else{
            $notification = array(
                'message' => 'Incorect Email Password Otp!',
                'alert-type' => 'warning'
            );
            return redirect()->route('login')->with($notification);
        }
    }

    public function brideGroomRegistration(){
        $registrationForData = Gender::get();
        $registrationByData = RegistrationBy::get();
        return view('registrations/registration',['registrationForData'=>$registrationForData,'registrationByData'=>$registrationByData]);
    }


     // Start Email Bride Groom Code; && // include three table usersTable & brideTbl & groomTbl

        // New Registration Data

        public function brideGroomRegistrationCreate(Request $request){
            $this->validate($request,[
               'registration_for'=>'required',
               'registration_by'=>'required',
               'first_name'=>'required',
               // 'last_name'=>'required',
               'first_name' => 'required|regex:/^[a-zA-Z]+$/u|max:255',
               'last_name' => 'required|regex:/^[a-zA-Z]+$/u|max:255',
               // 'mobile_no'=>'required',
                'mobile_no' => 'required|numeric|digits:10|unique:users,mobile_no',
               'email' => 'required|email|unique:users,email',  
               'password'=>'required',
               'conf_password'=>'required|same:password',

           ]);  

            // one type password otp
            $mailOtp = sprintf("%06d", mt_rand(1, 999999));
            // Send Email Otp Grating
            $data = array(
                'title' => 'i Vivah Info',
                'message' => 'Congratulations! We screened your profile and it has been made live. Log in now to search for your 1vivah.com!',
                'mail_otp'=> $mailOtp,
            );
            Mail::to($request->email)->send(new send_bride_groom_mail($data));
            echo"Email has been send";

            $genderData = Gender::where('id',$request->registration_for)->select('gender')->first();
            $usersTable = new User;
                if($genderData->gender == 'Male'){
                   $groomRegistration = new GroomRegistration;
                   $groomRegistration->gender_tbl_id =  $request->registration_for;
                   $groomRegistration->registration_by_tbl_id =  $request->registration_by;
                   $groomRegistration->first_name =  ucfirst($request->first_name);
                   $groomRegistration->last_name =  ucfirst($request->last_name);
                   $groomRegistration->mobile_no =  $request->mobile_no;
                   $groomRegistration->email =  $request->email;
                   $groomRegistration->show_password =  $request->password;
                   $groomRegistration->password = bcrypt($request->password);
                   $groomRegistration->role  = 2;
                   $groomRegistration->mail_otp  = $mailOtp;
                   $groomRegistration->user_ip_address = $request->user_ip;
                   $groomRegistration->save();

                   $usersTable->registration_groom_tbl_id = $groomRegistration->id;
                   $usersTable->first_name =  ucfirst($groomRegistration->first_name);
                   $usersTable->last_name =  ucfirst($groomRegistration->last_name);
                   $usersTable->role = $groomRegistration->role;
                   $usersTable->mail_otp = $groomRegistration->mail_otp;

                }else{

                   $brideRegistration = new BrideRegistration;
                   $brideRegistration->gender_tbl_id =  $request->registration_for;
                   $brideRegistration->registration_by_tbl_id =  $request->registration_by;
                   $brideRegistration->first_name =   ucfirst($request->first_name);
                   $brideRegistration->last_name =   ucfirst($request->last_name);
                   $brideRegistration->mobile_no =  $request->mobile_no;
                   $brideRegistration->email =  $request->email;
                   $brideRegistration->show_password =  $request->password;
                   $brideRegistration->password = bcrypt($request->password);
                   $brideRegistration->role  = 3;
                    $brideRegistration->mail_otp  = $mailOtp;
                    $brideRegistration->user_ip_address = $request->user_ip;
                   $brideRegistration->save();

                   $usersTable->registration_bride_tbl_id = $brideRegistration->id;
                   $usersTable->first_name =  ucfirst($brideRegistration->first_name);
                   $usersTable->last_name =  ucfirst($brideRegistration->last_name);
                   $usersTable->role = $brideRegistration->role;
                   $usersTable->mail_otp = $brideRegistration->mail_otp;

                }

                    $usersTable->email = $request->email;
                    $usersTable->password = bcrypt($request->password);
                    $usersTable->show_password = $request->password;
                    $usersTable->otp_access = 'No';
                    $usersTable->mobile_no =  $request->mobile_no;
                    $usersTable->user_ip_address =  $request->user_ip;
                    $usersTable->save();
                     $notification = array(
                        'message' => ' Registration Successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('login')->with($notification);
        }

       

        // confirmEmail From Registration
        public function confirmEmail(Request $request){
           $usersTable = User::where('email',$request->confEmail)->count();
           if($usersTable > 0){
                return json_encode(['status'=>1,'msg'=>'Error : Email Already Taken']);
           }else{
                 return json_encode(['msg'=>'Error : success']);
            }
        }

        // confirmMobileNo From Registration
        public function confirmMobileNo(Request $request){
           $usersTable = User::where('mobile_no',$request->mobNum)->count();
           if($usersTable > 0){
                return json_encode(['status'=>1,'msg'=>'Error : Mobile No Taken']);
           }else{
                 return json_encode(['msg'=>'Error : success']);
            }
        }


        
























        // varificationOtp From Login
        public function varificationOtp(Request $request){
            if(is_numeric($request->email_mobile_no)){
                //Number
                $mobileNumberExists = User::where('mobile_no',$request->email_mobile_no)->count();
                if($mobileNumberExists > 0){
                    $userData = User::where('mobile_no',$request->email_mobile_no)->select('mail_otp','otp_access','mobile_no')->first();
                    $otpAccess  =  $userData->otp_access;
                    $mailOtpExists  =  $userData->mail_otp;
                    $emailMobileNo =  $userData->mobile_no;

                    if($mailOtpExists){
                        return json_encode(['status'=>1,'msg'=>'Success','mailOtpExists'=>$mailOtpExists,'otpAccess'=>$otpAccess,'emailMobileNo'=>$emailMobileNo]);
                    }else{
                        return json_encode(['status'=>2,'msg'=>'Registration First','mailOtpExists'=>$mailOtpExists,'otpAccess'=>$otpAccess]);
                    }    

                }else{
                    return json_encode(['status'=>2,'emailAlertMsg'=>'Verify Your Mobile No Password']);
                }  
            }else{
                // text
                $emailExists = User::where('email',$request->email_mobile_no)->count();
                if($emailExists > 0){
                    $userData = User::where('email',$request->email_mobile_no)->select('mail_otp','otp_access','email')->first();
                    $otpAccess  =  $userData->otp_access;
                    $mailOtpExists  =  $userData->mail_otp;
                    $emailMobileNo  =  $userData->email;

                    if($mailOtpExists){
                        return json_encode(['status'=>1,'msg'=>'Success','mailOtpExists'=>$mailOtpExists,'otpAccess'=>$otpAccess,'emailMobileNo'=>$emailMobileNo]);
                    }else{
                        return json_encode(['status'=>2,'msg'=>'Registration First','mailOtpExists'=>$mailOtpExists,'otpAccess'=>$otpAccess]);
                    }    

                }else{
                    return json_encode(['status'=>2,'emailAlertMsg'=>'Verify Your Email Password']);
                }  
            }
        }

        // userForgotPassword
        public function forgotPassword(){
            return view ('registrations/forgot_password');
        }

        public function forgotPasswordCreate(Request $request){
            $userEmailExists = User::where('email',$request->email)->count();
            if ($userEmailExists) {
                
                $data = array(
                    'title' => 'User Forgot Password',
                    'message' => 'are You Sure Reset Your password!',
                    'userEmail' => $request->email,
                );
                Mail::to($request->email)->send(new forgot_password($data));
                $notification = array(
                    'message' => 'Chack Your Email Id And Click Below Link!',
                    'alert-type' => 'success'
                );
                return redirect()->route('login')->with($notification);
            }else{
                 $notification = array(
                        'message' => 'Please First Registration!',
                        'alert-type' => 'warning'
                    );
                    return redirect()->route('registration')->with($notification);
            }

        }

        // resetUserPassword
        public function resetPassword($email){
           $userRole =  User::where('email',$email)->select('role')->first();
           if ($userRole->role == 2) {
                GroomRegistration::where('email',$email)->update(['password'=>'','show_password'=>'']);
                User::where('email',$email)->update(['password'=>'','show_password'=>'']);
                $notification = array(
                    'message' => 'Your password Reset Successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->route('set_password')->with($notification);
            }else{
                BrideRegistration::where('email',$email)->update(['password'=>'','show_password'=>'']);
                User::where('email',$email)->update(['password'=>'','show_password'=>'']);
                $notification = array(
                    'message' => 'Your password Reset Successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->route('set_password')->with($notification);
           }
        }

        // setUserPassword
        public function setPassword(){
            return view('registrations/set_password');
        }

        // Update User Password (setPassword)
        public function setPasswordCreate(Request $request){
            $this->validate($request,[
               'password'=>'required',
               'conf_password'=>'required|same:password',
           ]); 

           $userRole =  User::where('email',$request->email)->select('role')->first();
           $password = bcrypt($request->password);
            if($userRole){
               if ($userRole->role == 2) {
                    GroomRegistration::where('email',$request->email)->update(['password'=>$password,'show_password'=>$request->password]);
                    User::where('email',$request->email)->update(['password'=>$password,'show_password'=>$request->password]);
                    $notification = array(
                        'message' => 'Update password Successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('login')->with($notification);
                }else{
                    BrideRegistration::where('email',$request->email)->update(['password'=>$password,'show_password'=>$request->password]);
                    User::where('email',$request->email)->update(['password'=>$password,'show_password'=>$request->password]);
                    $notification = array(
                        'message' => 'Update password Successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('login')->with($notification);
               }
            }else{
                   $notification = array(
                        'message' => 'Incorect Email Password!',
                        'alert-type' => 'warning'
                    );
                    return redirect()->route('set_password')->with($notification);
            }
        }



// -----------------------add email_mobile_no-----------------------------------------------------




















    public function getGenderName($id){
        $getGenderNameData = Gender::select('gender')->where('id',$id)->first();
        return json_encode(['status'=>'success','data'=>$getGenderNameData]);
    }
    public function serviceProviderRegistration(){
        return view('registrations/service_provider_reg');
    }
}


