<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Staff;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{

    public function index()
    {
        $listStaff = Staff::all();
        return view('admin.user.staff.index')->with('listStaff', $listStaff);
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
            $path = public_path('assets/images/staff/' . $fileNameToStore);

            # Create original image
            Image::make($request->file('image'))->save($path);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }


        //Create the data
        DB::table('staff')->insert([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'image' => 'noimage.jpg',
        ]);

        return redirect(route('employees.index'))->with('success', 'Account Created');
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
            $path = public_path('assets/images/staff/' . $fileNameToStore);

            # Create original image
            Image::make($request->file('image'))->save($path);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        //Create the data
        DB::table('staff')->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'image' => 'noimage.jpg',
        ]);

        return redirect(route('employees.index'))->with('success', 'Account Created');
    }

}
