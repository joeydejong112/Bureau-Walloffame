<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UpdatePostModel;
use App\UpdateKlasModel;
class AdminController extends Controller
{
    private $pathuser = "PRiV0/user";
    private $pathwebsite = "PRiV0/website";

    public function __construct(){
        $this->middleware('auth');
      

    }
    public function admin_home (Request $request){

        $users = UpdatePostModel::orderBy('id','asc')
        ->get();
        $klassen = UpdateKlasModel::orderBy('id','asc')
        ->get();
        return view('admin',['pathuser' => $this->pathuser, 'users' => $users, 'klassen' => $klassen]);
    }
    public function sort_user($id){
        $sortuser = UpdatePostModel::find($id);
        return view('admin_user',['sortuser' => $sortuser, 'pathuser' => $this->pathuser]);

    }
    public function sort_klas($id){
        $klassen = UpdateKlasModel::find($id);
        
        return view('admin_klas',['klassen' => $klassen, 'pathuser' =>$this->pathuser]);
    }
   
}
