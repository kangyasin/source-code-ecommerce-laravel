<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\EmailSendFailed;
use Mail;
use App\TsHdPayment;

class SendingFailed implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;

    /**
     * Create a new job instance.
     *
     * @return void
     */
     public function __construct(TsHdPayment $headerpayment)
     {
         $this->details = $headerpayment;
         
     }

    /**
     * Execute the job.
     *
     * @return void
     */
     public function handle()
     {
       $customer = $this->details->headertransaksi->customertransaksi;
       $email = new EmailSendFailed($this->details);
       Mail::to($customer->email)->send($email);
     }
}
