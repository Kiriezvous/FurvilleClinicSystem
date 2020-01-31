<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dogs;
use App\Cats;
use App\AnimalTypes;
use App\BreedCharacteristics;
use DB;

class BreedCharacteristicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = BreedCharacteristics::orderBy('id', 'desc')->paginate(10);
        return view('animaltypes.characteristics.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('animaltypes.characteristics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Gets the data being create by the User
        $this->validate($request, [
            'characteristic' => 'required',
            'description' => 'required',
        ]);

        //Create the data
        $post = new BreedCharacteristics;
        $post->characteristic = $request->input('characteristic');
        $post->description = $request->input('description');
        $post->save();

        //Redirect
        return redirect('/characteristics')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = BreedCharacteristics::find($id);
        return view('animaltypes.characteristics.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = BreedCharacteristics::find($id);

        // Return to the page
        return view('animaltypes.characteristics.edit')->with('post', $post);
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
            'characteristic' => 'required',
            'description' => 'required',
        ]);

        //Create Post
        $post = BreedCharacteristics::find($id);
        $post->characteristic = $request->input('characteristic');
        $post->description = $request->input('description');
        $post->save();

        return redirect('/characteristics')->with('success', 'Post Updated');
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
        $post = BreedCharacteristics::find($id);


        // Delete the specific post using the ID user from the database
        $post->delete();
        return redirect('/characteristics')->with('success', 'Post Removed');
    }
}
