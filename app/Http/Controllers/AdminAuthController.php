<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Helper\PageDescription;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


class AdminAuthController extends Controller
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
    protected $redirectTo = '/admin';

    protected $guard = 'admin';

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
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    public function showLoginForm(){
        if(Auth::guard('admin')->check()){
            return redirect('/admin');
        }
        return view('pages.admin.auth.login')->with('page',$this->page->setPage('Login',''));
    }


    public function getRegister(){
        return $this->showRegistrationForm();
    }
    public function showRegistrationForm(){
        return view('pages.admin.auth.register')->with([
            'page' => $this->page->setPage('Register'),
            'user' => new Admin(),
            'socialite' => false
        ]);
    }

    public function resetPassword(){
        return view('pages.admin.auth.passwords.email')->with('page',$this->page->setPage('Reset Password',''));
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
