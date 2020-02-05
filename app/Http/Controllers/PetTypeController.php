<?php

namespace App\Http\Controllers;

use App\PetType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class PetTypeController extends Controller
{
    public function index()
    {
        $type = PetType::all();
        return view('animal.types.index')->with('animal', $type);
    }

    public function store(Request $request)
    {
        // Gets the data being create by the User
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|nullable|max:1999'
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
            $path = $request->file('image')->storeAs('public/assets/image/pettypes', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        //Create the data
        $posts = new PetType;
        $posts->name = $request->input('name');
        $posts->description = $request->input('description');
        $posts->image = $fileNameToStore;
        $posts->save();

        //Redirect
        return redirect('/types')->with('success', 'Post Created');
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        // Gets the data being create by the User
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|nullable|max:1999'
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
            $path = $request->file('image')->storeAs('public/assets/image/pettypes', $fileNameToStore);
        }

        //Create the Update data
        $posts = PetType::find($id);
        $posts->name = $request->input('name');
        $posts->description = $request->input('description');
        if($request->hasFile('image')) {
            $posts->image = $fileNameToStore;
        }
        $posts->save();

        return redirect('/types');
    }

    public function destroy($id)
    {
        // Looks for the post ID user from the database
        $post = PetType::find($id);

        //Image
        if($post->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/assets/image/products/'.$post->image);
        }

        // Delete the specific post using the ID user from the database
        $post->delete();
        return redirect('/types')->with('success', 'Post Removed');
    }
}
