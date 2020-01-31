<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services;
use DB;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Services::orderBy('id', 'desc')->paginate(10);
        return view('services.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
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
            'service_name' => 'required',
            'service_description' => 'required',
            'service_price' => 'required',
        ]);

        // Handle file Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        //Create the data
        $post = new Services;
        $post->service_name = $request->input('service_name');
        $post->service_description = $request->input('service_description');
        $post->service_price = $request->input('service_price');
        $post->save();

        //Redirect
        return redirect('/services')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Services::find($id);
        return view('services.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Services::find($id);

        // Check for correct user
        // if(auth()->user()->id !== $post->user_id){
        //     return redirect('/categories')->with('error', 'Unauthorized Page');
        // }

        // Return to the page
        return view('services.edit')->with('post', $post);
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
            'service_name' => 'required',
            'service_description' => 'required',
            'service_price' => 'required',
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


        //Update Post
        $post = Services::find($id);
        $post->service_name = $request->input('service_name');
        $post->service_description = $request->input('service_description');
        $post->service_price = $request->input('service_price');
        $post->save();

        return redirect('/services')->with('success', 'Post Updated');
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
        $post = Services::find($id);

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
        return redirect('/services')->with('success', 'Post Removed');
    }
}
