<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;
class forgot_password extends Mailable
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
         return $this->from('ramtekea23@gmail.com')->subject(' User Forgot Password')->view('registrations/forgot_password_msg')->with('data',$this->data);
    }
}



