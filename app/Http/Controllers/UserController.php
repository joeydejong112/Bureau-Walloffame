<?php

namespace App\Http\Controllers;
use App\User;
use App\UpdateKlasModel;
use App\UpdatePostModel;

use Illuminate\Http\Request;

class UserController extends Controller
{
    private $RDTYHUII = 'alles';
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
        "contactemail" => "contactemail",
        "rank"      => "rank",
        "created_at" => "created_at"
    );
    private $pathuser = "PRiV0/user";
    private $pathwebsite = "PRiV0/website";
  

    public function welcome(){
        return view('welcome');
    }

    protected function account(Request $request){
        $pathuser = $this->pathuser;
        $pathwebsite = $this->pathwebsite;
        $users = User::find($request->user()->id
    );
      
        return view('account', ['pathwebsite' => $pathwebsite , 'pathuser' => $pathuser ,'users' => $users]);

    }
    protected function details($id){
        $pathuser = $this->pathuser;
        $pathwebsite = $this->pathwebsite;

        $users = User::find($id);
       
        return view('details', ['pathwebsite' => $pathwebsite , 'pathuser' => $pathuser ,'users' => $users]);

    }
    protected function owndetails(Request $request){
        $pathuser = $this->pathuser;
        $pathwebsite = $this->pathwebsite;

        $users = User::find($request->user()->id
    );
      
        return view('details', ['pathwebsite' => $pathwebsite ,'pathuser' => $pathuser ,'users' => $users]);

    }
  
    public function output(){
       $pathuser = $this->pathuser;
       $pathwebsite = $this->pathwebsite;

        $klassen = UpdateKlasModel::orderBy('klas','asc')
        ->select('klas')
        ->get();

        $user = UpdatePostModel::orderBy('rank' , 'desc')
        ->select($this->creds)->get();

        $topuser1 = UpdatePostModel::limit(3)
        ->orderBy('rank' , 'desc')
        ->select($this->creds)
        ->take(1)
        ->get();
        

        $topuser2 = UpdatePostModel::limit(3)
        ->orderBy('rank' , 'desc')
        ->select($this->creds)
        ->skip(1)
        ->take(1)
        ->get();

        $topuser3 = UpdatePostModel::limit(3)
        ->orderBy('rank' , 'desc')
        ->select($this->creds)
        ->skip(2)
        ->take(1)
        ->get();
      

   
      
       return view('intro', ['pathwebsite' => $pathwebsite ,'pathuser' => $pathuser , 'user' => $user ,'topuser1' => $topuser1 ,'topuser2' => $topuser2 , 'topuser3' => $topuser3 , 'klassen' => $klassen]);

    }
    
   
    protected function sort($id){
        $pathuser = $this->pathuser;
        $pathwebsite = $this->pathwebsite;
        if ($id == $this->RDTYHUII){
            $klassen = UpdateKlasModel::orderBy('klas','asc')
            ->select('klas')
            ->get();
    
            $user = UpdatePostModel::orderBy('rank' , 'desc')
            ->select($this->creds)->get();
    
            $topuser =UpdatePostModel::limit(3)
            ->orderBy('rank' , 'desc')
            ->select($this->creds)->get();
        }else{
            $klassen = UpdateKlasModel::orderBy('klas','asc')
            ->select('klas')
            ->get();

            $user = UpdatePostModel::where('klas',$id)
            ->orderBy('rank' , 'desc')
            ->select($this->creds)->get();

            $topuser = UpdatePostModel::where('klas',$id)
            ->limit(3)
            ->orderBy('rank' , 'desc')
            ->select($this->creds)->get();
                

        }
        
        $topuser1 = UpdatePostModel::limit(3)
        ->where('klas', $id)
        ->orderBy('rank' , 'desc')
        ->select($this->creds)
        ->take(1)
        ->get();
        

        $topuser2 = UpdatePostModel::limit(3)
        ->where('klas', $id)

        ->orderBy('rank' , 'desc')
        ->select($this->creds)
        ->skip(1)
        ->take(1)
        ->get();

        $topuser3 = UpdatePostModel::limit(3)
        ->where('klas', $id)
        ->orderBy('rank' , 'desc')
        ->select($this->creds)
        ->skip(2)
        ->take(1)
        ->get();

         return view('intro', ['pathwebsite' => $pathwebsite ,'pathuser' => $pathuser ,'user' => $user ,'topuser1' => $topuser1 ,'topuser2' => $topuser2 , 'topuser3' => $topuser3 , 'klassen' => $klassen]);


    }
}
