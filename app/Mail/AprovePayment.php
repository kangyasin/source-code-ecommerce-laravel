<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\TsHdPayment;
use App\Bank;
use Crypt;

class AprovePayment extends Mailable
{
    use Queueable, SerializesModels;
    public $hdpayment;
    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($hdpayment)
     {
       $this->details = $hdpayment;
     }

    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
     {
       $bank = Bank::find($this->details->id_bank);
       $customer = $this->details->headertransaksi->customertransaksi;
       //dd(Crypt::encrypt($this->transaksi->id));
       return $this->subject('LaraCommerce Yasin : Pembayaran Sukses')
              ->view('emails.approvepayment', ['customer'=> $customer, 'transaksi'=> $this->details->headertransaksi, 'bank' => $bank]);
     }
}
