<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class HomeController extends Controller
{
    private $creds = array(
        "name" => "name",
        "id"    => "id",
        'email' => "email",
        "background" => "background",
        "profile_image" => "profile_image",
        "opleiding" => "opleiding",
        "github" => "github",
        "gitlab" => "gitlab",
        "linkedin" => "linkedin",
        "klas" => "klas",
        "about" => "about",
        "website" => "website",
        "contactemail" => "contactemail"
    );
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
   
 
    public function account(Request $request){
        $request->user()->checkRoles('guest');

            return view('/account');
    }
    
    
    
}
