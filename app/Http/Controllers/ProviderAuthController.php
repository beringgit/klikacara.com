<?php

namespace App\Http\Controllers;

use App\Helper\PageDescription;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ProviderAuthController extends Controller
{
    /*
   |--------------------------------------------------------------------------
   | Registration & Login Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles the registration of new users, as well as the
   | authentication of existing users. By default, this controller uses
   | a simple trait to add these behaviors. Why don't you explore it?
   |
   */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/provider';

    protected $guard = 'provider';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(PageDescription $page)
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        $this->page = $page;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    public function showLoginForm(){
        if(Auth::guard('provider')->check()){
            return redirect('/admin');
        }
        return view('pages.provider.auth.login')->with('page',$this->page->setPage('Login',''));
    }

    public function showRegisterForm(){
        return view('pages.provider.auth.register')->with('page',$this->page->setPage('Register',''));
    }

    public function resetPassword(){
        return view('pages.provider.auth.passwords.email')->with('page',$this->page->setPage('Reset Password',''));
    }

    public function logout(){
        Auth::guard('provider')->logout();
        return redirect('/provider/login');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
