<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services;
use DB;

class ServicesController extends Controller
{

    public function index()
    {
        $posts = Services::orderBy('id', 'desc')->paginate(10);
        return view('services.index')->with('posts', $posts);
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        //dd($request);
        // Gets the data being create by the User
        $this->validate($request, [
            'service_name' => 'required',
            'service_description' => 'required',
            'service_type' => 'required',
            'service_price' => 'required',
        ]);


        //Create the data
        $post = new Services;
        $post->service_name = $request->service_name;
        $post->service_description = $request->service_description;
        $post->service_type = $request->service_type;
        $post->service_price = $request->service_price;
        $post->save();

        //Redirect
        return redirect('/services')->with('success', 'Post Created');
    }

    public function show($id)
    {
        $post = Services::find($id);
        return view('services.show')->with('post', $post);
    }

    public function edit($id)
    {
        $post = Services::find($id);

        // Return to the page
        return view('services.edit')->with('post', $post);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'service_name' => 'required',
            'service_description' => 'required',
            'service_price' => 'required',
        ]);

        //Update Post
        $post = Services::find($id);
        $post->service_name = $request->service_name;
        $post->service_description = $request->service_description;
        $post->service_type = $request->service_type;
        $post->service_price = $request->service_price;
        $post->save();

        return redirect('/services')->with('success', 'Post Updated');
    }

    public function destroy($id)
    {
        // Looks for the post ID user from the database
        $post = Services::find($id);

        // Delete the specific post using the ID user from the database
        $post->delete();
        return redirect('/services')->with('success', 'Post Removed');
    }
}
