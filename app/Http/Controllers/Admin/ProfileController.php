<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{
    public function index()
    {
        $post["Admin"] = Admin::all();
        return view('admin.profile.index', $post);
    }

    public function update(Request $request, $id) {
        // Gets the data being create by the User
        $this->validate($request, [
            'image' => 'image|nullable|max:1999',
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
        $post = Admin::find($id);
        if($request->hasFile('image')) {
            $post->image = $fileNameToStore;
        }
        $post->save();

        //Redirect
        return back()->with('success', 'Account Updated');
    }
}
