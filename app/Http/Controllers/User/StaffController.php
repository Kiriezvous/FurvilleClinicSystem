<?php

namespace App\Http\Controllers\User;

use App\Exports\StaffExport;
use App\Http\Controllers\Controller;
use App\Imports\StaffImport;
use Illuminate\Http\Request;
use App\Staff;
use Image;
use DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

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
        $post = Staff::find($id);
        $post->name = $request->input('name');
        $post->email = $request->input('email');
        $post->password = Hash::make($post['password']);
        $post->image = $fileNameToStore;
        $post->save();

        //Redirect
        return redirect('/employees')->with('success', 'Post Created');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function Staffexport()
    {
        return Excel::download(new Staffexport, 'staffs.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function Staffimport()
    {
        Excel::import(new Staffimport, request()->file('file'));

        return back();
    }

}
