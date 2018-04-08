<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Customer;
use Crypt;
use URL;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $customer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct(Customer $customer)
     {
         $this->customer = $customer;
     }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $encryptedEmail = Crypt::encrypt($this->customer->email);

      // ex: domain.com/verify?token=xxxx
      $link = URL::to('/customer/changepassword?email='.$encryptedEmail);
      return $this->subject('LaraCommerce Yasin : Forgot Password')
              ->view('emails.forgotpassword', ['link'=>$link, 'customer'=>$this->customer]);
    }
}
