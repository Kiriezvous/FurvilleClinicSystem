<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
use App\Staff;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{

    public function index()
    {
        $listStaff = Staff::all();
        $listDoctor = Doctor::all();
        return view('admin.user.doctor.index')->with('listDoctor', $listDoctor)->with('listStaff', $listStaff);
    }

    public function store(Request $request)
    {
        // Gets the data being create by the User
        $this->validate($request, [
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
            $path = public_path('assets/images/doctors/' . $fileNameToStore);

            # Create original image
            Image::make($request->file('image'))->save($path);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }


        //Create the data
         DB::table('doctors')->insert([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'image' => 'noimage.jpg',
        ]);

        return redirect(route('doctors.index'))->with('success', 'Account Created');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $doctor = Doctor::find($id);

        $status = $doctor->status;

        if($status == 1){
            $doctor->status = '0';
            $doctor->save();
        }

        if($status == 0){
            $doctor->status = '1';
            $doctor->save();
        }

        // Return to the page
        return back()->withInput();
    }

    public function update(Request $request, $id)
    {
        // Gets the data being create by the User
        $this->validate($request, [
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
            $path = public_path('assets/images/doctors/' . $fileNameToStore);

            # Create original image
            Image::make($request->file('image'))->save($path);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        //Create the data
        DB::table('doctors')->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'image' => 'noimage.jpg',
        ]);

        return redirect(route('doctors.index'))->with('success', 'Account Created');
    }

    public function destroy($id)
    {
        // Looks for the post ID user from the database
        $post = Doctor::find($id);

        //Image
//        if($post->image != 'noimage.jpg'){
//            // Delete Image
//            Storage::delete('public/animaltypes/'.$post->image);
//        }

        // Delete the specific post using the ID user from the database
        $post->delete();

        return redirect(route('doctors.index'))->with('success', 'Post Removed');
    }

}
