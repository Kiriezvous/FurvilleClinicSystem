<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gender;
use App\Measurements;
use App\BloodTypes;
use App\User;
use App\Pets;
use App\AnimalTypes;
use DB;

class PetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts["Pets"] = Pets::orderBy('id', 'desc')->paginate(10);
        $posts["User"] = User::all();
        $posts["Gender"] = Gender::all();
        $posts["BloodTypes"] = BloodTypes::all();
        $posts["Measurements"] = Measurements::all();
        $posts["AnimalTypes"] = AnimalTypes::all();
        return view('pets.index', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $gender = Gender::all();
        $blood_type = BloodTypes::all();
        $measurement= Measurements::all();
        $animaltype = AnimalTypes::all();
        return view('pets.create')->with('users', $user)
        ->with('genders', $gender)->with('blood_types', $blood_type)
        ->with('measurements', $measurement)->with('types', $animaltype);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        // Error Massage 
        $this->validate($request, [
            'animal type' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'bloodtype' => 'required',
            'weight' => 'required',
            'height' => 'required',
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
            $path = $request->file('image')->storeAs('public/assets/image/petprofile', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        //Store the data
        $post = new Pets;
        $post->animal_type = $request->animal_type;
        $post->name = $request->input('name');
        $post->gender_id = $request->gender;
        $post->bloodtype_id = $request->blood_type;
        $post->weight = $request->weight;
        $post->height = $request->height;
        $post->image = $fileNameToStore;
        $post->save();
        

        //Redirect
        return redirect('/pets')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Pets::find($id); //It should be the specific id only I think it can show the specific already
        return view('pets.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts["User"] = User::all();
        $posts["Gender"] = Gender::all();
        $posts["BloodTypes"] = BloodTypes::all();
        $posts["Measurements"] = Measurements::all();

        // Check for correct user
        // if(auth()->user()->id !== $post->user_id){
        //     return redirect('/categories')->with('error', 'Unauthorized Page');
        // }

        // Return to the page
        return view('pets.edit')->with('post', $post);
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
            'name' => 'required',
            'gender' => 'required',
            'bloodtype' => 'required',
            'measurement' => 'required',
        ]);
        
        // // Handle file Upload
        // if($request->hasFile('cover_image')){
        // // Get filename with the extension
        // $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        // // Get just filename
        // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // // Get just extension
        // $extension = $request->file('cover_image')->getClientOriginalExtension();
        // $fileNameToStore = $filename.'_'.time().'.'.$extension;
        // // Upload Image
        // $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        // }


        //Create the Update data
        $post = Pets::find($id);
        $post->name = $request->input('name');
        $post->gender_id = $request->gender;
        $post->bloodtype_id = $request->bloodtype;
        $post->measurement_id = $request->weight;
        $post->measurement_id = $request->height;
        $post->save();

        return redirect('/pets')->with('success', 'Post Updated');
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
        $post = Pets::find($id);

        // Check for correct user
        // if(auth()->user()->id !== $post->user_id){
        //     return redirect('/categories')->with('error', 'Unauthorized Page');
        // }

        //Image
        // if($post->cover_image != 'noimage.jpg'){
        //     // Delete Image
        //     Storage::delete('public/cover_images/'.$post->cover_image);
        // }

        // Delete the specific post using the ID user from the database
        $post->delete();
        return redirect('/pets')->with('success', 'Post Removed');
    }
}
