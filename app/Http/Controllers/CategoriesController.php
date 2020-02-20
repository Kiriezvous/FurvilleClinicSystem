<?php

namespace App\Http\Controllers;

use App\Exports\CategoriesExport;
use App\Imports\CategoriesImport;
use Illuminate\Http\Request;
use App\Categories;
use DB;
use Maatwebsite\Excel\Facades\Excel;

class CategoriesController extends Controller
{
    public function index()
    {
        $posts = Categories::all();
        return view('categories.index')->with('posts', $posts);
    }

    public function store(Request $request)
    {
        // Gets the data being create by the User
        $this->validate($request, [
            'category_type' => 'required',
            'description' => 'required'
        ]);

        //Create the data
        $posts = new Categories;
        $posts->category_type = $request->input('category_type');
        $posts->description = $request->input('description');
        $posts->save();

        //Redirect
        return redirect('/categories')->with('success', 'Post Created');
    }

    public function show($id)
    {
        $posts = Categories::find($id);
        return view('categories.index')->with('post', $posts);
    }

    public function edit($id)
    {
        $posts = Categories::find($id);

        // Return to the page
        return view('categories.index')->with('editCategory', $posts);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_type' => 'required',
            'description' => 'required'
        ]);


        //Create Post
        $posts = Categories::find($id);
        $posts->category_type = $request->input('category_type');
        $posts->description = $request->input('description');
        $posts->save();

        return redirect('/categories')->with('success', 'Post Updated');
    }

    public function destroy($id)
    {
        // Looks for the post ID user from the database
        $posts = Categories::find($id);

        // Delete the specific post using the ID user from the database
        $posts->delete();
        return redirect('/categories')->with('success', 'Post Removed');
    }

    public function Categoriesexport()
    {
        return Excel::download(new CategoriesExport, 'categories.xlsx');
    }

    public function Categoriesimport()
    {
        Excel::import(new CategoriesImport, request()->file('file'));

        return back();
    }
}
