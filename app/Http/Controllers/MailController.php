<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\newMail;

class MailController extends Controller
{
    //
    public function sendemail(){
      Mail::send(new newMail());
      // Mail::send(["text"=>"email.pemesanan"],["name"=>"Fake KangYasin"], function($message){
      //   $message->to('tutorialblogmarine@gmail.com', 'Muhamad Yasin')->subject('Tagihan Pembayaran');
      //   $message->from('fakekangyasin@gmail.com', 'Fake Kang Yasin');
      // });
      //return view('email/pemesanan');
    }
}
