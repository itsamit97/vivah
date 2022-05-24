<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\GroomProfile;
use App\MaritalStatus;
use App\StateModel;
use Auth;
use Mail;
use App\Mail\contact_mail;
use Redirect;
class LandingController extends Controller
{
    public function webIndex()
    {
        $maritalStatusTableData  = MaritalStatus::get();
        $statesTableData  = StateModel::get();
        return view('landing_web/index',['maritalStatusTableData'=>$maritalStatusTableData,'statesTableData'=>$statesTableData]);
    }

    public function About(){
        return view('landing_web/about');
    }


    public function Testing(){
        return view('landing_web/testing_form');
    }

    public function brideGroomMatchesProfile(){
        return view('landing_web/bride_groom_matches_profile');
    }

    public function FilterBrideGroom(Request $request)
    {
       // dd('FilterBrideGroom',$request->all());
       // $filterGroom = GroomProfile::where('state',$request->state)->whereBetween('age',[$request->age_from, $request->age_to])->where('status',$request->status)->where('city',$request->city)->get();
       //  return view('landing_web/matches_profile',['filterGroom'=>$filterGroom]);

    }




    public function ContactForm(){

        return view('landing_web/contact');
    }

    public function ContactCreate(Request $request){
        $this->validate($request,[
         'first_name'=>'required',
         // 'email'=>'required',
         'email' => 'email:rfc,dns',
         'message'=>'required',
        ]);

        $data = array(
            // 'email' => $request->email,
            'title' => 'Inquiry Contact',
            'nameDetails' => $request->first_name,
             'message' => $request->message
        );

        Mail::to($request->email)->send(new contact_mail($data));
        // echo"Email has been send";
       return Redirect::back()->withErrors(['msg' => 'Contact Msg Send']);

    }




function LogutBrideGroom(){

     Auth::logout();
  return redirect('login');
}




}



