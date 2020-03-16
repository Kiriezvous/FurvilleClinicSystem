<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\User;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ClientsController extends Controller
{
    public function index()
    {
        $clients = User::all();
        return view('admin.user.customer.index')->with('client', $clients);
    }

    public function store(Request $request)
    {
        // Gets the data being create by the User
        $this->validate($request, [
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        $post = new User;
        $post->name = $request->input('name');
        $post->email = $request->input('email');
        $post->password = Hash::make($post['password']);
        $post->image = $fileNameToStore;
        $post->save();

        //Redirect
        return redirect(route('clients.index'))->with('success', 'Account Created');
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
        $post = User::find($id);
        if($request->hasFile('image')) {
            $post->image = $fileNameToStore;
        }
        $post->save();

        //Redirect
        return back()->with('success', 'Account Updated');
    }

    public function destroy($id)
    {
        //
    }

}
