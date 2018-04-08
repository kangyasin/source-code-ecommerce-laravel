<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\TsHdTransaksi;
use App\Bank;
use Crypt;

class Invoice extends Mailable
{
    use Queueable, SerializesModels;
    public $hdtransaksi;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($hdtransaksi)
    {
        $hdtransaksi = TsHdTransaksi::find($hdtransaksi->id);
        $this->details = $hdtransaksi;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      //dd(Crypt::encrypt($this->transaksi->id));

      // ex: domain.com/verify?token=xxxx
      $bank = Bank::all();
      $link = url('/checkout/success/'.Crypt::encryptString($this->details->id));
      return $this->subject('LaraCommerce Yasin : Invoice')
              ->view('emails.invoice', ['link'=>$link, 'customer'=>$this->details->customertransaksi, 'transaksi'=>$this->details, 'bank' => $bank]);
    }
}
