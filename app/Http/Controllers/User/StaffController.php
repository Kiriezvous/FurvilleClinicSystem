<?php

namespace App\Http\Controllers\User;

use App\Doctor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Staff;
use DB;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{

    public function index()
    {
        $listStaff = Staff::all();
        return view('user.staff.index')->with('listStaff', $listStaff);
    }

    public function create()
    {
        return view('user.staff.index');
    }


    public function store(Request $request)
    {
        // Gets the data being create by the User
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'image' => 'image|nullable|max:1999',
        ]);

        // Handle file Upload
        if($request->hasFile('image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image')->storeAs('public/assets/image/users/staff', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }


        //Create the data
        $post = new Staff;
        $post->name = $request->input('name');
        $post->email = $request->input('email');
        $post->password = Hash::make($post['password']);
        $post->image = $fileNameToStore;
        $post->save();

        //Redirect
        return redirect('/employees')->with('success', 'Post Created');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $staff = Staff::find($id);

        $status = $staff->status;

        if($status == 1){
            $staff->status = '0';
            $staff->save();
        }

        if($status == 0){
            $staff->status = '1';
            $staff->save();
        }

        // Return to the page
        return back()->withInput();
    }


    public function update(Request $request, $id)
    {
        // Gets the data being create by the User
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'image' => 'image|nullable|max:1999',
        ]);


        // Handle file Upload
        if($request->hasFile('image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image')->storeAs('public/assets/image/users/staff', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        //Create the data
        $post = Staff::find($id);
        $post->name = $request->input('name');
        $post->email = $request->input('email');
        $post->password = Hash::make($post['password']);
        $post->image = $fileNameToStore;
        $post->save();

        //Redirect
        return redirect('/employees')->with('success', 'Post Created');
    }

}
