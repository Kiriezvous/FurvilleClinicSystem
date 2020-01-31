<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dogs;
use App\AnimalTypes;
use App\BreedCharacteristics;
use DB;

class DogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts["Dogs"] = Dogs::orderBy('id', 'desc')->paginate(10);
        $posts["animal_types"] = AnimalTypes::all();
        return view('animaltypes.dogs.index', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = AnimalTypes::all();
        return view('animaltypes.dogs.create')->with('categories', $category);
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
            'breed_name' => 'required',
            'breed_description' => 'required',
            'category' => 'required',
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
            $path = $request->file('image')->storeAs('public/assets/image/dogbreeds', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        //Create the data
        $post = new Dogs;
        $post->breed_name = $request->input('breed_name');
        $post->breed_description = $request->input('breed_description');
        $post->animal_type = $request->category;
        $post->image = $fileNameToStore;
        $post->save();
        

        //Redirect
        return redirect('/dogs')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Dogs::find($id);
        return view('animaltypes.dogs.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Dogs::find($id);
        $categories = AnimalTypes::all();

        // Check for correct user
        // if(auth()->user()->id !== $post->user_id){
        //     return redirect('/categories')->with('error', 'Unauthorized Page');
        // }

        // Return to the page
        return view('animaltypes.dogs.edit')->with('post', $post)->with('categories', $categories);
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
        // Gets the data being create by the User
        $this->validate($request, [
            'breed_name' => 'required',
            'breed_description' => 'required',
            'category' => 'required',
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
            $path = $request->file('image')->storeAs('public/assets/image/dogbreeds', $fileNameToStore);
            }
    

        //Create the Update data
        $post = Dogs::find($id);
        $post->breed_name = $request->input('breed_name');
        $post->breed_description = $request->input('breed_description');
        $post->animal_type = $request->category;
        if($request->hasFile('image')) {
            $post->image = $fileNameToStore;
        }
        $post->save();
        

        return redirect('/dogs')->with('success', 'Post Updated');
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
        $post = Dogs::find($id);

        // Check for correct user
        // if(auth()->user()->id !== $post->user_id){
        //     return redirect('/categories')->with('error', 'Unauthorized Page');
        // }

        //Image
        if($post->image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/assets/image/products/'.$post->image);
        }


        // Delete the specific post using the ID user from the database
        $post->delete();
        return redirect('/dogs')->with('success', 'Post Removed');
    }
}
