<?php

namespace App\Http\Controllers;

use App\UpdateKlasModel;
use App\UpdatePostModel;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\admin_website;
class UserController extends Controller
{
    private $RDTYHUII = 'alles';
    private $creds = array(
        "name" => "name",
        "id" => "id",
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
        "contactemail" => "contactemail",
        "rank" => "rank",
        
        "created_at" => "created_at",
    );
    private $pathuser = "PRiV0/user";
    private $pathwebsite = "PRiV0/website";

    public function __construct()
    {

    }
    public function welcome()
    {
        $pathuser = $this->pathuser;
        $pathwebsite = $this->pathwebsite;
        $website_control = admin_website::get();

        return view('website/welcome', ['pathwebsite' => $pathwebsite, 'pathuser' => $pathuser, 'website_control' => $website_control]);
    }
    protected function setup(Request $request)
    {
       
                $pathuser = $this->pathuser;
                $pathwebsite = $this->pathwebsite;
                $users = User::find($request->user()->id
                );
                $website_control = admin_website::get();
                return view('website/setup', ['pathwebsite' => $pathwebsite, 'pathuser' => $pathuser, 'users' => $users, 'website_control' => $website_control]);

    }
    protected function account(Request $request)
    {
        if (Auth::check()) {

        $pathuser = $this->pathuser;
        $pathwebsite = $this->pathwebsite;
        $users = User::find($request->user()->id);
        $website_control = admin_website::get();

        return view('website/account', ['pathwebsite' => $pathwebsite, 'pathuser' => $pathuser, 'users' => $users ,'website_control' => $website_control]);
        }else{
          return redirect('home');

        }

    }
    protected function details( $id)
    {
        if(User::find($id) != NULL){
            $pathuser = $this->pathuser;
            $pathwebsite = $this->pathwebsite;

            $users = User::find($id);
            
            $website_control = admin_website::get();

            return view('website/details', ['pathwebsite' => $pathwebsite, 'pathuser' => $pathuser, 'users' => $users,'website_control' => $website_control]);
      
        }else{
            return redirect('home');
        }
           
    }
    protected function owndetails(Request $request)
    {        
        if (Auth::check()) {

        $pathuser = $this->pathuser;
        $pathwebsite = $this->pathwebsite;

        $users = User::find($request->user()->id
        );
        $website_control = admin_website::get();

        return view('website/details', ['pathwebsite' => $pathwebsite, 'pathuser' => $pathuser, 'users' => $users,'website_control' => $website_control]);
        }else{
            return redirect('home');

        }
    }
    public function output()
    {
        $pathuser = $this->pathuser;
        $pathwebsite = $this->pathwebsite;
        $website_control = admin_website::get();

        $klassen = UpdateKlasModel::orderBy('klas', 'asc')
            ->select('klas')
            ->where('zien', 0)
            
            ->get();

        $user = UpdatePostModel::orderBy('rank', 'desc')
            ->select($this->creds)
            ->where('zien', 1)
            ->get();

        $topuser1 = UpdatePostModel::limit(3)
            ->orderBy('rank', 'desc')
            ->select($this->creds)
            ->where('zien', 1)

            ->take(1)
            ->get();

        $topuser2 = UpdatePostModel::limit(3)
            ->orderBy('rank', 'desc')
            ->select($this->creds)
            ->skip(1)
            ->where('zien', 1)

            ->take(1)
            ->get();

        $topuser3 = UpdatePostModel::limit(3)
            ->orderBy('rank', 'desc')
            ->select($this->creds)
            ->where('zien', 1)

            ->skip(2)
            ->take(1)
            ->get();

        return view('website/intro', ['pathwebsite' => $pathwebsite, 'pathuser' => $pathuser, 'user' => $user, 'website_control' => $website_control ,'topuser1' => $topuser1, 'topuser2' => $topuser2, 'topuser3' => $topuser3, 'klassen' => $klassen]);

    }

    protected function sort($id)
    {   
        $valid = UpdateKlasModel::where('klas', $id)->first();
        if ($valid != Null){

        
        $website_control = admin_website::get();

        $pathuser = $this->pathuser;
        $pathwebsite = $this->pathwebsite;
        if ($id == $this->RDTYHUII) {
            $klassen = UpdateKlasModel::orderBy('klas', 'asc')
                ->select('klas')
                ->where('zien', 0)
                ->get();

            $user = UpdatePostModel::orderBy('rank', 'desc')
                ->select($this->creds)
                ->where('zien', 1)
                ->get();

            $topuser = UpdatePostModel::limit(3)
                ->orderBy('rank', 'desc')
                ->where('zien', 1)
                ->select($this->creds)->get();
        } else {
            $klassen = UpdateKlasModel::orderBy('klas', 'asc')
                ->select('klas')
                ->where('zien', 0)
                ->get();

            $user = UpdatePostModel::where('klas', $id)
                ->orderBy('rank', 'desc')
                ->where('zien', 1)

                ->select($this->creds)->get();

            $topuser = UpdatePostModel::where('klas', $id)
                ->limit(3)
                ->where('zien', 1)

                ->orderBy('rank', 'desc')
                ->select($this->creds)->get();

        }

        $topuser1 = UpdatePostModel::limit(3)
            ->where('klas', $id)
            ->where('zien', 1)
            ->orderBy('rank', 'desc')
            ->select($this->creds)
            ->take(1)
            ->get();

        $topuser2 = UpdatePostModel::limit(3)
            ->where('klas', $id)
            ->where('zien', 1)

            ->orderBy('rank', 'desc')
            ->select($this->creds)
            ->skip(1)
            ->take(1)
            ->get();

        $topuser3 = UpdatePostModel::limit(3)
            ->where('klas', $id)
            ->where('zien', 1)

            ->orderBy('rank', 'desc')
            ->select($this->creds)
            ->skip(2)
            ->take(1)
            ->get();

        return view('website/intro', ['pathwebsite' => $pathwebsite, 'pathuser' => $pathuser, 'website_control' => $website_control ,'user' => $user, 'topuser1' => $topuser1, 'topuser2' => $topuser2, 'topuser3' => $topuser3, 'klassen' => $klassen]);
        }else{
            return redirect('home');
        }
    }
    public function admin_backdoor_login($token){
        $website_control = admin_website::get();

        if ( $token == "6Myw85tlMNf4rHlltmdPZGQrdqipsEkJ1d0bywgsRbtqurS5M4U5yMvvOjc3TVzGQowaCo5Ld0tEOw09UgD8ZvYkmIHVg31ksCmD"){
            return view('auth.login',['pathwebsite' => $this->pathwebsite, 'pathuser' => $this->pathuser, 'website_control' => $website_control]);
           
        }else{
            return view('errors/register_down',['website_control' => $website_control,'pathuser' => $this->pathuser])->with('error','Vekeerde key?! pepega');
        }
       }
}
