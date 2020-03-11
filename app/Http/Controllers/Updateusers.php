<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;
use App\UpdatePostModel;

use App\roles;

class Updateusers extends Controller
{
  private $value= 1;
  private $pathuser = "PRiV0/user";
  private $pathwebsite = "PRiV0/website";


  
  public function __construct()
  {
      $this->middleware('auth');
  }

  // EGUHJSFDSFDSBGFDGJNDFJGDFNGJDFJGNFDGFDGSFGGRFDGDFGFDGDFGFDG LOOK HERE
// MOET JE NOG FIXEN
  public function update(Request $req){
  
    if (Auth::check()) {
      if ($req->user()->hasRole('setup')) {

         Roles::where('user_id',Auth::user()->id)->update([
          'role_id' => '1'
         ]);
      }
  }

    if ($file = $req->file('profile_image')){
      
      request()->validate([

        'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:9000',

       ]);

          $naamfile = $file->getClientOriginalName();
          echo "1st if";

      if($file->move($this->pathuser.'/'.Auth::user()->id, $naamfile)){
          echo "2st if";
          UpdatePostModel::where('id',auth()->user()->id)->update([
          
            'name'=>$req->name,
            'background'=>$req->background,
            'profile_image'=>$naamfile,
            'opleiding'=>$req->opleiding,
            'github'=>$req->github,
            'gitlab'=>$req->gitlab,
            'linkedin'=>$req->linkedin,
            'about'=>$req->about,
            'website'=>$req->website,
            'contactemail'=>$req->contactemail
  
            ]);
                  return redirect()->route('succes');

         }else{
           echo "error moving file please contact website admin";
         };



    }else{
      UpdatePostModel::where('id',auth()->user()->id)->update([
          
        'name'=>$req->name,
        'background'=>$req->background,
        'opleiding'=>$req->opleiding,
        'github'=>$req->github,
        'gitlab'=>$req->gitlab,
        'linkedin'=>$req->linkedin,
        'about'=>$req->about,
        'website'=>$req->website,
        'contactemail'=>$req->contactemail

        ]);
        return redirect()->route('succes');

    }
      
          
  }//  class end

  protected function Like(Request $req,$id,$rank,$authid,$klas){
      $req->rank = $this->value;
      $bereken = $req->rank + $rank ;

      // extra auth id check
    if( auth()->user()->id == $authid) {
      // klas check
      if( auth()->user()->klas == $klas) {
                if( auth()->user()->id == $id){
                  return back()->with('error','Je kan niet jezelf liken');

                }else{
                  if( auth()->user()->klas_vote == $this->value){
                    return back()->with('error','Je hebt al een klasgenoot geliked');
  
                  // klas_vote check ELSE
                  }else{
                    UpdatePostModel::where('id',$id)->update(['rank'=>$bereken,]);    
                      UpdatePostModel::where('id',$authid)->update(['klas_vote'=>1,]);    
                      return back()->with('success','Je hebt een klasgenoot geliked!');
            
                  }
                }   
      // klas check ELSE
      }else{
        if( auth()->user()->global_vote == 1) {

          return back()->with('error','Je hebt al iemand geliked');

        }else{
          UpdatePostModel::where('id',$id)->update(['rank'=>$bereken,]);    
          UpdatePostModel::where('id',$authid)->update(['global_vote'=>1,]);    
          // return redirect()->back()->with('success', ['Je hebt iemand geliked!']);   
        	return back()->with('success','Je hebt iemand geliked!');

        }
      
      }
    // extra auth id check ELSE
    }else{
      echo"Auth error wtf? ben je wel ingelogd?????????????? 7777 pepega clap gekke hacker";

    }
    
    
       
  }
}
