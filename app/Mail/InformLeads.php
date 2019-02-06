<?php

namespace App\Mail;

use App\Generallead;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InformLeads extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
   public $mailId =0;

    public function __construct($mailId)
    {
        $this->mailId =$mailId;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $leadDetails =Generallead::find($this->mailId);




        return $this->subject("Inform about lead gen form")->from('rashan@enfection.com')->view('mail.welcome1')->with('data',$leadDetails);
    }
}
