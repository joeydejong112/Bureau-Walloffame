<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     

        $this->middleware('guest');
        // $this->middleware('auth');

    }
    public function index(){
        $this->middleware('guest');

      
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'opleiding' => ['required', 'string', 'max:255'],
            'github' => ['required' , 'string' ,'max:255'],
            'gitlab' => ['required' , 'string' ,'max:100'],
            'linkedin' => ['required' , 'string' ,'max:100'],
            'klas' => ['required', 'string', 'max:4'],

            // 
            // 
            // 

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {      

        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
            'opleiding' =>$data['opleiding'],
            'github' =>$data['github'],
            'gitlab' =>$data['gitlab'],
            'linkedin' =>$data['linkedin'],
            'klas'     =>$data['klas'],


        ]);
        $user->roles()->attach(\App\Role::where('name', 'user')->first());

        return $user;
    }
}
