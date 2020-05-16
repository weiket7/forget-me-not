<?php

namespace App\Mail;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
  
    public $contact;
  
    public function __construct($contact)
    {
        $this->contact = $contact;
    }
  
    public function build()
    {
        $mainEmail = $this->contact->email == "wei_ket@hotmail.com" ? "wei_ket@hotmail.com" : Setting::getMainEmail();
        return $this->to($mainEmail)->replyTo($this->contact->email)->subject('[Contact] ' . $this->contact->subject)->view('emails.contact');
    }
}
