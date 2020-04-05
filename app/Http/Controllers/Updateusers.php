<?php

namespace App\Http\Controllers;

use App\roles;
use App\UpdatePostModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Redirect;

class Updateusers extends Controller
{
    private $value = 1;
    private $pathuser = "PRiV0/user";
    private $pathwebsite = "PRiV0/website";

    public function __construct()
    {
        $this->middleware('auth');
    }

    // EGUHJSFDSFDSBGFDGJNDFJGDFNGJDFJGNFDGFDGSFGGRFDGDFGFDGDFGFDG LOOK HERE
    // MOET JE NOG FIXEN

    public function update(Request $req)
    {
      //check for setup role
        if (Auth::check()) {
            if ($req->user()->hasRole('setup')) {

                Roles::where('user_id', Auth::user()->id)->update([
                    'role_id' => '1',
                ]);
                UpdatePostModel::where('id', auth()->user()->id)->update([
                    'zien' => 1,
                ]);
            }
        }
     //check of het leeg is
        if ($req->website == null) {
            $req->website = "#empty";
        }
        if ($req->github == null) {
            $req->github = "#empty";
        }
        if ($req->gitlab == null) {
            $req->gitlab = "#empty";
        }
        if ($req->linkedin == null) {
            $req->linkedin = "#empty";
        }

        if ($file = $req->file('profile_image')) {

            $this->validate($req, [

                'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            File::delete($this->pathuser . '/' . Auth::user()->id . '/' . Auth::user()->profile_image);

            $image = $req->file('profile_image');

            $image_name = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path($this->pathuser . '/' . Auth::user()->id);

            if (!File::isDirectory($destinationPath)) {

                File::makeDirectory($destinationPath, 0777, true, true);

            }

            $resize_image = Image::make($image->getRealPath());

            $resize_image->resize(640, 480, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);

            $destinationPath = public_path('/OriginalImage');

            $image->move($destinationPath, $image_name);
            File::delete('OriginalImage/' . $image_name);

            UpdatePostModel::where('id', Auth::user()->id)->update([

                'name' => $req->name,
                'background' => $req->background,
                'profile_image' => $image_name,
                'opleiding' => $req->opleiding,
                'github' => $req->github,
                'gitlab' => $req->gitlab,
                'linkedin' => $req->linkedin,
                'about' => $req->about,
                'website' => $req->website,
                'contactemail' => $req->contactemail,

            ]);
            return redirect()->route('succes');

        } else {
            UpdatePostModel::where('id', Auth::user()->id)->update([

                'name' => $req->name,
                'background' => $req->background,
                'opleiding' => $req->opleiding,
                'github' => $req->github,
                'gitlab' => $req->gitlab,
                'linkedin' => $req->linkedin,
                'about' => $req->about,
                'website' => $req->website,
                'contactemail' => $req->contactemail,

            ]);
            return redirect()->route('succes');

        }

    }

    protected function Like(Request $req, $id, $rank, $authid, $klas)
    {
        $req->rank = $this->value;
        $bereken = $req->rank + $rank;

        // extra auth id check
        if (auth()->user()->id == $authid) {
            // klas check
            if (auth()->user()->klas == $klas) {
                if (auth()->user()->id == $id) {
                    return back()->with('error', 'Je kan niet jezelf liken');

                } else {
                    if (auth()->user()->klas_vote == $this->value) {
                        return back()->with('error', 'Je hebt al een klasgenoot geliked');

                        // klas_vote check ELSE
                    } else {
                        UpdatePostModel::where('id', $id)->update(['rank' => $bereken]);
                        UpdatePostModel::where('id', $authid)->update(['klas_vote' => 1]);
                        return back()->with('success', 'Je hebt een klasgenoot geliked!');

                    }
                }
                // klas check ELSE
            } else {
                if (auth()->user()->global_vote == 1) {

                    return back()->with('error', 'Je hebt al iemand geliked');

                } else {
                    UpdatePostModel::where('id', $id)->update(['rank' => $bereken]);
                    UpdatePostModel::where('id', $authid)->update(['global_vote' => 1]);
                    // return redirect()->back()->with('success', ['Je hebt iemand geliked!']);
                    return back()->with('success', 'Je hebt iemand geliked!');

                }

            }
            // extra auth id check ELSE
        } else {
            echo "Auth error wtf? ben je wel ingelogd?????????????? 7777 pepega clap gekke hacker";

        }

    }
}
