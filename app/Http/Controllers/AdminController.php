<?php

namespace App\Http\Controllers;
use Redirect;

use Illuminate\Http\Request;
use App\UpdatePostModel;
use App\admin_website;
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
        $admin_control = admin_website::orderBy('id','asc')
        ->get();
        $users = UpdatePostModel::orderBy('id','asc')
        ->get();
        $klassen = UpdateKlasModel::orderBy('id','asc')
        
        ->get();
        
        return view('admin/admin',['pathuser' => $this->pathuser, 'users' => $users, 'klassen' => $klassen, 'admin_control' => $admin_control]);
        
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
    if($id == Auth::user()->id){
        return redirect()->route('admin');
    }else{
        UpdatePostModel::find($id)->delete();
        return redirect()->route('admin');     
     }
    
    

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
   public function update_admin_website(Request $request){
    admin_website::where('id', 1)->update([
        'login' => $request->login,
        'register' => $request->register
    ]);
    return redirect()->route('admin');

   }
  public function show_users($show, $id){
    if($show == 'show'){
        UpdatePostModel::where('id', $id)->update([
            'zien' => '1'
        ]);
        return redirect()->route('admin');

    }
    if($show == 'notshow'){
        UpdatePostModel::where('id', $id)->update([
            'zien' => '0'
        ]);
        return redirect()->route('admin');

    }

  }
}
