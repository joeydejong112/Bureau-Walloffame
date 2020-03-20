<?php

namespace App\Http\Controllers\Auth;
use App\admin_website;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    public function showLoginForm()
    {   $website_control = admin_website::get();
        $thumbs = admin_website::get() ;

        foreach ($thumbs as $thumbs) {
            
            if($thumbs->login == 1){
                $number = 1;
            }
            if($thumbs->login == 0){
                $number = 0;
             }
        }
        if($number == 1){
                  return view('auth.login',['website_control' => $website_control ]);

     }else{
        return view('errors/register_down',['website_control' => $website_control ])->with('error','Login staat momenteel uit!! ');
     }
    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
