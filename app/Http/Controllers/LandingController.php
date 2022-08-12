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

// use Request;
class LandingController extends Controller
{



    // public function getClientIps()
    // {
    //     $clientIps = array();
    //     $ip = $this->server->get('REMOTE_ADDR');
    //     if (!$this->isFromTrustedProxy()) {
    //         return array($ip);
    //     }
    //     if (self::$trustedHeaders[self::HEADER_FORWARDED] && $this->headers->has(self::$trustedHeaders[self::HEADER_FORWARDED])) {
    //         $forwardedHeader = $this->headers->get(self::$trustedHeaders[self::HEADER_FORWARDED]);
    //         preg_match_all('{(for)=("?\[?)([a-z0-9\.:_\-/]*)}', $forwardedHeader, $matches);
    //         $clientIps = $matches[3];
    //     } elseif (self::$trustedHeaders[self::HEADER_CLIENT_IP] && $this->headers->has(self::$trustedHeaders[self::HEADER_CLIENT_IP])) {
    //         $clientIps = array_map('trim', explode(',', $this->headers->get(self::$trustedHeaders[self::HEADER_CLIENT_IP])));
    //     }
    //     $clientIps[] = $ip; // Complete the IP chain with the IP the request actually came from
    //     $ip = $clientIps[0]; // Fallback to this when the client IP falls into the range of trusted proxies
    //     foreach ($clientIps as $key => $clientIp) {
    //         // Remove port (unfortunately, it does happen)
    //         if (preg_match('{((?:\d+\.){3}\d+)\:\d+}', $clientIp, $match)) {
    //             $clientIps[$key] = $clientIp = $match[1];
    //         }
    //         if (IpUtils::checkIp($clientIp, self::$trustedProxies)) {
    //             unset($clientIps[$key]);
    //         }
    //     }
    //     // Now the IP chain contains only untrusted proxies and the client IP
    //     return $clientIps ? array_reverse($clientIps) : array($ip);
    // } 


    public function webIndex()
    {
 

  // echo $request->ip();
            // server ip

          
            // server ip

            // echo $this->getIp(); //see the method below
            // clent ip


//         $ip = Request::ip();
// dd('ip',ip);
// dd('tets');


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
        if (Auth::User() !=null) {
           $loginPprofile = User::where('id',Auth::User()->id)->select('profile','name')->first();
        }
        $loginPprofile = '';
        // dd($loginPprofile);
        $riviewTableData = Riview::get();
        return view('landing_web/review',['loginPprofile'=>$loginPprofile,'riviewTableData'=>$riviewTableData]);
    }


    public function riviewOneVivah(Request $request){

        if (Auth::User() !=null) {

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
        }else{
            dd('not login');
            return json_encode(['msg'=>'Please Login First Befor Comment']);
        }
    }



    function LogutBrideGroom(){

         Auth::logout();
      return redirect('login');
    }




}



