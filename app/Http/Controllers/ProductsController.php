<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Products;
use App\Categories;
use DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts["Products"] = Products::orderBy('id', 'desc')->paginate(10);
        $posts["Categories"] = Categories::all();
        return view('products.index', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Categories::all();
        return view('products.create')->with('categories', $category);
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
            'product_name' => 'required',
            'category' => 'required',
            'product_quantity' => 'required',
            'product_description' => 'required',
            'product_price' => 'required',
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
            $path = $request->file('image')->storeAs('public/assets/image/products', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        //Create the data
        $post = new Products;
        $post->product_name = $request->input('product_name');
        $post->category_id = $request->category;
        $post->product_quantity = $request->input('product_quantity');
        $post->product_description = $request->input('product_description');
        $post->product_price = $request->input('product_price');
        $post->image = $fileNameToStore;
        $post->save();
        

        //Redirect
        return redirect('/products')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Products::find($id);
        return view('products.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Products::find($id);
        $categories = Categories::all();

        // Check for correct user
        // if(auth()->user()->id !== $post->user_id){
        //     return redirect('/categories')->with('error', 'Unauthorized Page');
        // }

        // Return to the page
        return view('products.edit')->with('post', $post)->with('categories', $categories);
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
            'product_name' => 'required',
            'category' => 'required',
            'product_quantity' => 'required',
            'product_description' => 'required',
            'product_price' => 'required',
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
        $path = $request->file('image')->storeAs('public/assets/image/products', $fileNameToStore);
        }


        //Create the Update data
        $post = Products::find($id);
        $post->product_name = $request->input('product_name');
        $post->category_id = $request->category;
        $post->product_quantity = $request->input('product_quantity');
        $post->product_description = $request->input('product_description');
        $post->product_price = $request->input('product_price');
        if($request->hasFile('image')) {
            $post->image = $fileNameToStore;
        }
        $post->save();

        return redirect('/products')->with('success', 'Post Updated');
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
        $post = Products::find($id);

        // Check for correct user
        // if(auth()->user()->id !== $post->user_id){
        //     return redirect('/categories')->with('error', 'Unauthorized Page');
        // }

        //Image
        if($post->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/assets/image/products/'.$post->image);
        }

        // Delete the specific post using the ID user from the database
        $post->delete();
        return redirect('/products')->with('success', 'Post Removed');
    }
}
