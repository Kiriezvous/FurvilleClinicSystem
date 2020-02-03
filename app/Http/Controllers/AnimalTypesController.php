<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AnimalTypes;
use DB;

class AnimalTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = AnimalTypes::all();
        return view('animaltypes.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('animaltypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        // Gets the data being create by the User
        $this->validate($request, [
            'animal_type' => 'required',
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
            $path = $request->file('image')->storeAs('public/animaltypes', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        //Create the data
        $post = new AnimalTypes;
        $post->animal_type = $request->input('animal_type');
        $post->description = $request->input('description');
        $post->image = $fileNameToStore;
        $post->save();

        //Redirect
        return redirect('animal/types')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = AnimalTypes::find($id);
        return view('animaltypes.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = AnimalTypes::find($id);

        // Return to the page
        return view('animaltypes.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'animal_type' => 'required',
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
        $path = $request->file('image')->storeAs('public/animaltypes', $fileNameToStore);
        }

        //Update Post
        $post = AnimalTypes::find($id);
        $post->animal_type = $request->input('animal_type');
        $post->description = $request->input('description');
        if($request->hasFile('image')) {
            $post->image = $fileNameToStore;
        }
        $post->save();

        return redirect('/animal/types')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Looks for the post ID user from the database
        $post = AnimalTypes::find($id);

        //Image
        if($post->image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/animaltypes/'.$post->image);
        }

        // Delete the specific post using the ID user from the database
        $post->delete();
        return redirect('/animal/types')->with('success', 'Post Removed');
    }
}
