<?php

namespace App\Http\Controllers;

use App\Patients;
use App\PetProfile;
use App\PetType;
use Illuminate\Http\Request;
use App\User;
use Image;
use Illuminate\Support\Facades\Auth;

class PetProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $post["Patients"] = Patients::all();
        $post["PetType"] = PetType::all();
        $post["Users"] = User::all();
        $post["Pet"] = PetProfile::all();
        return view('pages.profile', $post);
    }

    public function store(Request $request)
    {


// Gets the data being create by the User
        $this->validate($request, [
            'name' => 'required',
            'owner' => 'required',
            'animal_type' => 'required',
            'breed' => 'required',
            'gender' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if($request->hasFile('image')){

            # Get filename with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();

            # Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            # Get just extension
            $extension = $request->file('image')->getClientOriginalExtension();

            # Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            # Upload Image
            $path = public_path('assets/images/' . $fileNameToStore);

            # Create original image
            Image::make($request->file('image'))->save($path);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        //Create the data
        $post = new PetProfile;
        $post->name = $request->name;
        $post->user_id = Auth::user()->id; //it gets the select name value in the request then passes to the post user_id
        $post->animal_type = $request->animal_type;
        $post->breed = $request->breed;
        $post->gender = $request->gender;
        $post->image = $fileNameToStore;

        $post->save();

        //Redirect
        return back()->with('success', 'New Pet Added');
    }

    public function show($id)
    {
        $post = PetProfile::find($id);

        return view('pages.profile', $post);
    }

    public function update(Request $request, $id)
    {
        //
    }

}
