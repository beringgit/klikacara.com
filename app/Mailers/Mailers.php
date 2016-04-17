<?php

namespace App\Mailers;


use Illuminate\Support\Facades\Mail;

abstract class Mailers
{
   public function send($view, $subject, $data, $email_address = ""){
        Mail::send($view, ['data' => $data], function($message) use($subject,$email_address, $data){

            $message->from($data['email'])
                ->to($email_address)
                ->subject($subject);

        });
   }
}