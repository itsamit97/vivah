<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ User;
use Auth;
use Redirect;
class UserController extends Controller
{
    public function brideGroomLogin(){
        return view('bride_groom_login/login');
    }
    public function brideGroomLoginCreate(Request $request){
        // dd($request->all());
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
           return Redirect::back()->withErrors(['msg' => 'Login Succesfully']);
        }else{
          return Redirect::back()->withErrors(['msg' => 'Login not Succesfully']);  
        }

    }
    

    public function brideGroomRegistration(){
        return view('bride_groom_login/registration');
    }
    public function brideGroomRegistrationCreate(Request $request){
        $this->validate($request,[
          'email' => 'required|email|unique:users,email',  
         'Password'=>'required|min:5',
         'conf_password'=>'required|same:Password',
         'gender'=>'required',
        ]);

        // dd('check registration data',$request->all());
        $usersTable = new User;
        $usersTable->create_profile_for = $request->create_profile_for;
        $usersTable->email = $request->email;
        $usersTable->password = bcrypt($request->Password);
        $usersTable->show_password = $request->Password;
        $usersTable->gender = $request->gender;
        $usersTable->save();
        return redirect()->route('login');

    }

}
