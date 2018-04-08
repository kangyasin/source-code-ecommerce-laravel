<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Customer;
use Crypt;

class CustomerConfirmation extends Mailable
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

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $encryptedEmail = Crypt::encrypt($this->customer->email);
        // ex: domain.com/verify?token=xxxx
        $link = route('signup.verify', ['token' => $encryptedEmail]);
        return $this->subject('LaraCommerce Yasin : Customer Email Confirmation')
                ->view('emails.confirmation', ['link'=>$link, 'customer'=>$this->customer]);
    }
}
