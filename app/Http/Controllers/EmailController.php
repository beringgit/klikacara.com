<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mailers;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class EmailController extends Controller
{
    public function __construct(Mailers\ContactEmailer $emailer){
        $this->emailer = $emailer;
    }
    public function sendFromContact(Requests\EmailContactRequest $request){

        $data = [
            'name'  => $request->contact_name,
            'email' => $request->contact_email,
            'message'   => $request->contact_message
        ];

        $this->emailer->sendFromContact($data);
        Session::flash('contact_success','Your message has been successfully sended');
        return 'Sukses';
    }
}
