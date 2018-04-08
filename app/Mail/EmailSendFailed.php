<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\TsHdPayment;
use App\Bank;
use Crypt;

class EmailSendFailed extends Mailable
{
    use Queueable, SerializesModels;
    public $hdpayment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct(TsHdPayment $hdpayment)
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
       $customer = $this->details->headertransaksi->customertransaksi;
       return $this->subject('LaraCommerce Yasin : Pesanan Anda Dibatalkan')
              ->view('emails.pesanangagal', ['customer'=> $customer, 'transaksi'=> $this->details->headertransaksi]);
     }
}
