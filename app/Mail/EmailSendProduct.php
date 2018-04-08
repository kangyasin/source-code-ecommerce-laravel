<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\TsHdPayment;
use App\Bank;
use App\Alamat;
use Crypt;

class EmailSendProduct extends Mailable
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
       $alamat = Alamat::find($this->details->headertransaksi->alamat);
       return $this->subject('LaraCommerce Yasin : Proses Pengiriman Pesanan')
              ->view('emails.proseskirim', ['customer'=> $customer, 'transaksi'=> $this->details->headertransaksi, 'alamat'=> $alamat]);
     }
}
