<?php


namespace App\Mailers;


use App\MailersMailers;

class ContactEmailer extends Mailers
{
    public function sendFromContact($data){
        $this->send('emails.base_email','Customer Service',$data,'rizqy@beringin.net');
    }
}