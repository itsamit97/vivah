<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contact_mail extends Mailable
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
         return $this->from('ramtekea23@gmail.com')->subject('Contact 1 Vivah.com')->view('landing_web/contact_msg')->with('data',$this->data);
    }
}
