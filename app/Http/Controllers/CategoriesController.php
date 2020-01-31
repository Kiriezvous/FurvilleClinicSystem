<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Categories::orderBy('id', 'desc')->paginate(10);
        return view('categories.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            'category_type' => 'required',
            'description' => 'required'
        ]);

        //Create the data
        $post = new Categories;
        $post->category_type = $request->input('category_type');
        $post->description = $request->input('description');
        $post->save();

        //Redirect
        return redirect('/categories')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Categories::find($id);
        return view('categories.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Categories::find($id);

        // Return to the page
        return view('categories.edit')->with('post', $post);
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
            'category_type' => 'required',
            'description' => 'required'
        ]);
        

        //Create Post
        $post = Categories::find($id);
        $post->category_type = $request->input('category_type');
        $post->description = $request->input('description');
        $post->save();

        return redirect('/categories')->with('success', 'Post Updated');
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
        $post = Categories::find($id);

        // Delete the specific post using the ID user from the database
        $post->delete();
        return redirect('/categories')->with('success', 'Post Removed');
    }
}
