<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Auth;
use App\User;
class proposal_request_mail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
          $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        // $currentEmail = Auth::User()->email();
        // dd('currentEmail', $currentEmail);

            $currentEmail = Auth::User()->email;
                   // $currentEmail =  Auth::User()->email;

        return $this->from($currentEmail)->subject('Proposal Send  Request')->view('bride_groom/proposal_request_msg')->with('data',$this->data);
    }
}
    

