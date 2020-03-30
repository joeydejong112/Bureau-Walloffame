<?php

namespace App\Http\Controllers\Auth;
use App\User;
use App\admin_website;
use App\UpdateKlasModel;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    public function showLinkRequestForm()
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
            return view('auth.passwords.email', ['klassen' => $klassen,'website_control' => $website_control]);  

            }else{
               return view('errors/register_down',['website_control' => $website_control])->with('error','Register staat momenteel uit!! ');;
            }
         
        
        
    }            
  use SendsPasswordResetEmails;
}
