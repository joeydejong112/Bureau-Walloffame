<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UpdatePostModel;
use App\UpdateKlasModel;
use Auth;

class AdminController extends Controller
{
    private $pathuser = "PRiV0/user";
    private $pathwebsite = "PRiV0/website";

    public function __construct(){
        $this->middleware('auth');
        
      
      

    }
    public function admin_home (Request $request){
        if (Auth::check()) {
            if ($request->user()->hasRole('setup')) {
                return redirect('setup');
            }
        }
        $request->user()->checkRoles('admin');

        $users = UpdatePostModel::orderBy('id','asc')
        ->get();
        $klassen = UpdateKlasModel::orderBy('id','asc')
        ->get();
        return view('admin/admin',['pathuser' => $this->pathuser, 'users' => $users, 'klassen' => $klassen]);
        
    }
    public function sort_user(Request $request,$id){
        
        $request->user()->checkRoles('admin');

        $sortuser = UpdatePostModel::find($id);
        return view('admin/admin_user',['sortuser' => $sortuser, 'pathuser' => $this->pathuser]);

    }
    public function sort_klas(Request $request,$id){
        $request->user()->checkRoles('admin');

        $klassen = UpdateKlasModel::find($id);
        
        return view('admin/admin_klas',['klassen' => $klassen, 'pathuser' =>$this->pathuser]);
    }
   
}
