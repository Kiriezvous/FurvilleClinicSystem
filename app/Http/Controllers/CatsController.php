<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cats;
use App\AnimalTypes;
use App\BreedCharacteristics;
use DB;

class CatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts["Cats"] = Cats::orderBy('id', 'desc')->paginate(10);
        $posts["animal_types"] = AnimalTypes::all();
        return view('animaltypes.cats.index', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = AnimalTypes::all();
        return view('animaltypes.cats.create')->with('categories', $category);
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
            $path = $request->file('image')->storeAs('public/assets/image/catbreeds', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }


        //Create the data
        $post = new Cats;
        $post->breed_name = $request->input('breed_name');
        $post->breed_description = $request->input('breed_description');
        $post->image = $fileNameToStore;
        $post->save();
        

        //Redirect
        return redirect('/cats')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Cats::find($id);
        return view('animaltypes.cats.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Cats::find($id);
        $categories = AnimalTypes::all();

        // Check for correct user
        // if(auth()->user()->id !== $post->user_id){
        //     return redirect('/categories')->with('error', 'Unauthorized Page');
        // }

        // Return to the page
        return view('animaltypes.cats.edit')->with('post', $post)->with('categories', $categories);
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
            $path = $request->file('image')->storeAs('public/assets/image/catbreeds', $fileNameToStore);
            }
    


        //Create the Update data
        $post = Cats::find($id);
        $post->breed_name = $request->input('breed_name');
        $post->breed_description = $request->input('breed_description');
        if($request->hasFile('image')) {
            $post->image = $fileNameToStore;
        }
        $post->save();
        

        return redirect('/cats')->with('success', 'Post Updated');
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
        $post = Cats::find($id);

        // Check for correct user
        // if(auth()->user()->id !== $post->user_id){
        //     return redirect('/categories')->with('error', 'Unauthorized Page');
        // }

        //Image
        if($post->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/assets/image/catbreeds/'.$post->image);
        }

        // Delete the specific post using the ID user from the database
        $post->delete();
        return redirect('/cats')->with('success', 'Post Removed');
    }
}
