<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Products;
use App\Categories;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use Image;

class ProductsController extends Controller
{
    public function index()
    {
        $posts["Products"] = Products::all();
        $posts["Categories"] = Categories::all();
        return view('products.index', $posts);
    }

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

        //Handle File Upload
        if($request->hasFile('image')){

            # Get filename with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();

            # Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            # Get just extension
            $extension = $request->file('image')->getClientOriginalExtension();

            # Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            # Upload Image
            $path = public_path('assets/images/products/' . $fileNameToStore);

            # Create original image
            Image::make($request->file('image'))->save($path);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        //Create the data
        $post = new Products;
        $post->product_name = $request->product_name;
        $post->category_id = $request->category;
        $post->product_quantity = $request->product_quantity;
        $post->product_description = $request->product_description;
        $post->product_price = $request->product_price;
        $post->image = $fileNameToStore;
        $post->save();

        //Redirect
        return redirect('/products')->with('success', 'Post Created');
    }

    public function show($id)
    {
        $post = Products::find($id);
        return view('products.show')->with('post', $post);
    }

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

        //Handle File Upload
        if($request->hasFile('image')){

            # Get filename with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();

            # Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            # Get just extension
            $extension = $request->file('image')->getClientOriginalExtension();

            # Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            # Upload Image
            $path = public_path('assets/images/products/' . $fileNameToStore);

            # Create original image
            Image::make($request->file('image'))->save($path);
        } else {
            $fileNameToStore = 'noimage.jpg';
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

    public function destroy($id)
    {
        // Looks for the post ID user from the database
        $post = Products::find($id);

        //Image
        if($post->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('assets/image/products/'.$post->image);
        }

        // Delete the specific post using the ID user from the database
        $post->delete();
        return redirect('/products')->with('success', 'Post Removed');
    }

    public function Productsexport()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function Productsimport()
    {
        Excel::import(new ProductsImport, request()->file('file'));

        return back();
    }


}
