<?php

namespace App\Http\Controllers;
use Redirect;

use Illuminate\Http\Request;
use App\UpdatePostModel;
use App\UpdateKlasModel;
use Auth;
use App\User;
use App\roles;

class AdminController extends Controller
{
    private $pathuser = "PRiV0/user";
    private $pathwebsite = "PRiV0/website";

    public function __construct(){
        $this->middleware('auth');
        
      
      

    }
    public function admin_home (){
       
        // $request->user()->checkRoles('admin');

        $users = UpdatePostModel::orderBy('id','asc')
        ->get();
        $klassen = UpdateKlasModel::orderBy('id','asc')
        ->get();
        
        return view('admin/admin',['pathuser' => $this->pathuser, 'users' => $users, 'klassen' => $klassen]);
        
    }
    public function sort_user($id){
        

        $sortuser = UpdatePostModel::find($id);
        return view('admin/admin_user',['sortuser' => $sortuser, 'pathuser' => $this->pathuser]);

    }
    public function sort_klas($id){

        $klassen = UpdateKlasModel::find($id);
        
        return view('admin/admin_klas',['klassen' => $klassen, 'pathuser' =>$this->pathuser]);
    }
    public function user_delete($id){
       $message = "tets";
      
    //    {{url('/admin/user/delete/'.$users->id)}}
      UpdatePostModel::find($id)->delete();
    }
   public function role_update($rank,$targetid){
        if ($rank == "user"){
            echo "User rank";
            $new = 1;

        } if ($rank == "setup"){
            echo "setup rank";
            $new = 3;

        } if ($rank == "admin"){
            echo "admin rank";
            $new = 2;

        }
        Roles::where('user_id' , $targetid)->update([
            'role_id' => $new
        ]);
        return redirect()->route('admin');

   }
   public function delete_klas($id){

    UpdateKlasModel::find($id)->delete();
    return redirect()->route('admin');

   }
   public function add_klas(Request $request){
    UpdateKlasModel::insert([
        'klas' => $request->klas,
        'zien' => $request->zien
    ]);
    return redirect()->route('admin');


   }
}
