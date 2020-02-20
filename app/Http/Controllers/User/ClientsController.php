<?php

namespace App\Http\Controllers\User;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\User;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = User::all();
        return view('user.customer.index')->with('client', $clients);
    }

    public function store(Request $request)
    {
        // Gets the data being create by the User
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
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
            $path = public_path('assets/images/customers/' . $fileNameToStore);

            # Create original image
            Image::make($request->file('image'))->save($path);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        //Create the data
        $post = new User;
        $post->name = $request->input('name');
        $post->email = $request->input('email');
        $post->password = Hash::make($post['password']);
        $post->image = $fileNameToStore;
        $post->save();

        //Redirect
        return redirect('/clients')->with('success', 'Post Created');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $client = User::find($id);

        $status = $client->status;

        if($status == 1){
            $client->status = '0';
            $client->save();
        }

        if($status == 0){
            $client->status = '1';
            $client->save();
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
            $path = public_path('assets/images/customers/' . $fileNameToStore);

            # Create original image
            Image::make($request->file('image'))->save($path);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        //Create the data
        $post = User::find($id);
        $post->name = $request->input('name');
        $post->email = $request->input('email');
        $post->password = Hash::make($post['password']);
        if($request->hasFile('image')) {
            $post->image = $fileNameToStore;
        }
        $post->save();

        //Redirect
        return redirect('/clients')->with('success', 'Post Created');
    }

    public function destroy($id)
    {
        //
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function Userexport()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function Userimport()
    {
        Excel::import(new UsersImport, request()->file('file'));

        return back();
    }
}
