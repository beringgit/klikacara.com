<?php

namespace App\Http\Controllers\Auth;

use App\Helper\NavigationStatus;
use App\Helper\PageDescription;
use App\User;
use Carbon\Carbon;
use Guzzle\Http\Message\Request;
use GuzzleHttp\Handler\CurlFactory;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
    protected $redirectAfterLogout = '/login';

    protected $facebookFields = ['name', 'email', 'gender', 'verified','user_birthday'];

    protected $facebookScopes = ['email','user_birthday'];


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
            'name' => 'required|max:30|min:2',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'gender'  => 'required|max:6',
            'bdate' => 'required|date',
            'phone' => 'required|max:12|min:10|regex:/^[+0-9 ]{9,14}/'
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
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'gender'   => $data['gender'],
            'bdate' => $data['bdate'],
            'phone' => $data['phone'],
            'twitter_id' => $data['twitter_id'],
            'facebook_id'   => $data['facebook_id'],
            'avatar'    => $data['avatar']
        ]);
    }

    public function redirectToFacebookProvider(){
        return Socialite::driver('facebook')
            ->fields($this->facebookFields)
            ->scopes($this->facebookScopes)
            ->redirect();
    }

    public function handleFacebookProviderCallback(){
        try {
            $user = Socialite::driver('facebook')->user();
        } catch(Exception $e){
            return redirect('/auth/facebook');
        }
        $authUser = $this->findOrCreateUserFromFacebookAuth($user);
        if($authUser){
            Auth::login($authUser,true);
            return redirect('/');
        }


        Session::flash('name', $user->user['name']);
        Session::flash('avatar', $user->avatar);
        Session::flash('email', $user->user['email']);
        Session::flash('facebook_id', $user->user['id']);
        Session::flash('gender', $user->user['gender']);
        Session::flash('birthday', isset($user->user_birthday) ? $user->user_birtday : Carbon::now());
        Session::flash('socialite',true);

        return redirect('/register')->with('socialite',true);
    }

    private function findOrCreateUserFromFacebookAuth($user) {
        $authUser = User::where('facebook_id','=',$user->id)->first();
        return $authUser;
    }


    public function redirectToTwitterProvider(){
        return Socialite::driver('twitter')->redirect();
    }

    public function handleTwitterProviderCallback(){
        try {
            $user = Socialite::driver('twitter')->user();
        } catch(Exception $e){
            return redirect('/auth/twitter');
        }
        $authUser = $this->findOrCreateUserFromTwitterAuth($user);

        if($authUser) {
            Auth::login($authUser,true);
            return redirect('/');
        }

        Session::flash('name', $user->name);
        Session::flash('twitter_id', $user->id);
        Session::flash('id', $user->email);
        Session::flash('socialite',true);

        return redirect('/register')->with('socialite',true);

    }

    private function findOrCreateUserFromTwitterAuth($twitter_user) {
        $authUser = User::where('twitter_id','=',$twitter_user->id)->orWhere('email','=',$twitter_user->email)->first();

        return $authUser;

    }

}
