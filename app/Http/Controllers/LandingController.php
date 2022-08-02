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
use App\SuccessCouple;
use App\User;
use App\Riview;
class LandingController extends Controller
{
    public function webIndex()
    {
        $maritalStatusTableData  = MaritalStatus::get();
        $statesTableData  = StateModel::get();
        $successCouple = SuccessCouple::get();
        $riviewSucessCouple = Riview::get();
        return view('landing_web/index',['maritalStatusTableData'=>$maritalStatusTableData,'statesTableData'=>$statesTableData,'successCouple'=>$successCouple,'riviewSucessCouple'=>$riviewSucessCouple]);
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


    public function introOneVivah(){

        return view ('landing_web/intro_one_vivah');
    }

    public function Review(){
        $loginPprofile = User::where('id',Auth::User()->id)->select('profile','name')->first();
        // dd($loginPprofile);
        $riviewTableData = Riview::get();
        return view('landing_web/review',['loginPprofile'=>$loginPprofile,'riviewTableData'=>$riviewTableData]);
    }


    public function riviewOneVivah(Request $request){
        // dd($request->input('bride_name'));

       //  $couple_profile = time().'.'.$request->file->extension();  
       //  $request->file->move(public_path('couple_profile'), $ProfileName);

       // $coupleprofile =  $request->couple_profile;
       //   $request->couple_profile->move(public_path('couple_rofile'), $coupleprofile);

        if ($request->hasFile('image_profile')){
           $successCoupleImg = time().'.'.$request->image_profile->extension();  
            $request->image_profile->move(public_path('success_couple_profiles'), $successCoupleImg);
        }


        $riviewTable = new Riview;
        $riviewTable->bride_name = $request->input('bride_name');
        $riviewTable->groom_name = $request->input('groom_name');
        $riviewTable->comment = $request->input('comment');
        $riviewTable->married = $request->input('married');
        $riviewTable->unmarried = $request->input('unmarried');
        $riviewTable->image_profile = $successCoupleImg;
         $riviewTable->save();
         return json_encode(['msg'=>'success',$riviewTable]);

    }



    function LogutBrideGroom(){

         Auth::logout();
      return redirect('login');
    }




}



