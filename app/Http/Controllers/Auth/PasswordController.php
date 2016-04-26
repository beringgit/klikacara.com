<?php

namespace App\Http\Controllers\Auth;

use App\Helper\PageDescription;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{

    public function __construct(PageDescription $page){
        $this->page = $page;
        $this->middleware('guest');

    }
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */

    public function showLinkRequestForm()
    {
        if (property_exists($this, 'linkRequestView')) {
            return view($this->linkRequestView);
        }

        if (view()->exists('auth.passwords.email')) {
            return view('auth.passwords.email')->with([
                'page'  => $this->page->setPage('Reset password'),
            ]);
        }

        return view('auth.password')->with([
            'page'  => $this->page->setPage('Reset password'),
        ]);
    }
}
