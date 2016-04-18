<?php

namespace App\Http\Controllers\Auth;

use App\Helper\PageDescription;
use App\User;
use GuzzleHttp\Handler\CurlFactory;
use Illuminate\Support\Facades\App;
use Laravel\Socialite\Facades\Socialite;
use Mockery\CountValidator\Exception;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
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
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(PageDescription $page)
    {
        $this->page = $page;
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'fname' => 'required|max:30|min:2',
            'lname' => 'max:30|min:2',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'gender'  => 'required|max:6',
            'bdate' => 'required|date',
            'phone' => 'required|max:12|min:10|regex:/^[+0-9 ]{9,14}/',
            'username'  => array('required','max:20','min:6','unique:users',
                'regex:/^([a-zA-Z])[a-zA-Z_-]*[\w_-]*[\S]$|^([a-zA-Z])[0-9_-]*[\S]$|^[a-zA-Z]*[\S]$/')
        ]);
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
            'f_name' => $data['f_name'],
            'l_name' => $data['l_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'sex'   => $data['sex'],
            'bdate' => $data['bdate'],
            'phone' => $data['phone'],
            'username' => $data['username']
        ]);
    }

    public function redirectToFacebookProvider(){
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookProviderCallback(){
        dd(Socialite::driver('facebook')->user());
        try {
            $user = Socialite::driver('facebook')->user();
        } catch(Exception $e){
            return redirect('/auth/facebook');
        }

        $authUser = $this->findOrCreateUserFromFacebookAuth($user);
        Auth::login($authUser,true);
        return redirect('/');

    }

    private function findOrCreateUserFromFacebookAuth($facebook_user) {
        $authUser = User::where('facebook_id',$facebook_user->id)->first();

        if($authUser) {
            return $authUser;
        }

        $newUser = new User([
            'fname' => $facebook_user->first_name,
            'lname' => $facebook_user->last_name,
            'email' => $facebook_user->email,
            'gender'   => $facebook_user->gender,
            'bdate' => $facebook_user->user_birthday,
            'facebook_id'   => $facebook_user->id
        ]);

        return view('pages.user-register')->with([
            'page'  => $this->page->setPage('Register with Facebook',''),
            'user'  => $newUser
        ]);

    }
}
