<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UpdatePostModel;
use App\UpdateklasModel;
class UpdateAdmin extends Controller
{
    private $pathuser = "PRiV0/user";
    private $pathwebsite = "PRiV0/website";
    public function __construct(){
        $this->middleware('auth');

    }
    public function adminupdateuser(Request $request){
        if ($file = $request->file('profile_image')){
      
            request()->validate([
      
              'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:9000',
      
             ]);
      
                $naamfile = $file->getClientOriginalName();
                echo "1st if";
      
            if($file->move($this->pathuser.'/'.$request->id, $naamfile)){
                echo "2st if";
                UpdatePostModel::where('id',$request->id)->update([
                
                  'name'=>$request->name,
                  'background'=>$request->background,
                  'profile_image'=>$naamfile,
                  'opleiding'=>$request->opleiding,
                  'github'=>$request->github,
                  'gitlab'=>$request->gitlab,
                  'linkedin'=>$request->linkedin,
                  'about'=>$request->about,
                  'website'=>$request->website,
                  'contactemail'=>$request->contactemail
        
                  ]);
                        return redirect()->route('succes');
      
               }else{
                 echo "error moving file please contact website admin";
               };
      
      
      
          }else{
            UpdatePostModel::where('id',$request->id)->update([
                
              'name'=>$request->name,
              'background'=>$request->background,
              'opleiding'=>$request->opleiding,
              'github'=>$request->github,
              'gitlab'=>$request->gitlab,
              'linkedin'=>$request->linkedin,
              'about'=>$request->about,
              'website'=>$request->website,
              'contactemail'=>$request->contactemail
      
              ]);
              return redirect()->route('admin');
      
          }

    }
    public function adminupdateklas(Request $request){
        UpdateKlasmodel::where('id',$request->oldid)->update([
                
            'id'=>$request->id,
            'klas'=>$request->klas,
            'zien'=>$request->zien
           
  
            ]);
            return redirect()->route('admin');

    }
}
