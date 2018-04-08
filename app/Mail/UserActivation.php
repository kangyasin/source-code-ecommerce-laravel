<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Customer;
use Crypt;

class UserActivation extends Mailable
{
  use Queueable, SerializesModels;

  /**
   * Create a new message instance.
   *
   * @return void
   */

   public $customer;

   public function __construct(Customer $customer)
   {
       $this->customer = $customer;
   }

   public function build()
   {
       // return $this->markdown('emails.activation', $this->customer->toArray());
       // generate link
        $encryptedEmail = Crypt::encrypt($this->customer->email);
        // ex: domain.com/verify?token=xxxx
        $link = route('signup.verify', ['token' => $encryptedEmail]);
        return $this->subject('Verify Your Email Address')
            ->with('link', $link)
            ->view('email.signup');
   }
}
