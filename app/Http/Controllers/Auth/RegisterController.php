<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Arr;

use App\Http\Controllers\Controller;
use App\User;
use App\admin_website;
use App\UpdateKlasModel;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    protected $casts = [
    'role' => 'integer',
];
   
    public function showRegistrationForm()
{
    
$thumbs = admin_website::get() ;
$website_control = admin_website::get();
foreach ($thumbs as $thumbs) {
    
    if($thumbs->register == 1){
        $number = 1;
    }
    if($thumbs->register == 0){
        $number = 0;
     }
}
 
    if($number == 1){
           $klassen = UpdateKlasModel::orderBy('klas', 'asc')
    ->select('klas')
    ->where('zien', 0)
    ->get();    
    return view('auth.register', ['klassen' => $klassen,'website_control' => $website_control]);
    }else{
       return view('errors/register_down',['website_control' => $website_control])->with('error','Register staat momenteel uit!! ');;
    }
 

}

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/setup';

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
            'klas' => ['required', 'string', 'max:4']

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
        
            if ($data['github'] == NULL){

                $data['github'] = "#";

            }
            if($data['gitlab'] == NULL){

                $data['gitlab'] = "#";
            }
            if($data['linkedin'] == NULL){
                        
                $data['linkedin'] = "#";
            }


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
      $user->roles()->attach(\App\Role::where('name', 'setup')->first());
               
        return $user;
    }
}
