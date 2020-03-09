<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Categories;
Use RealRashid\SweetAlert\Facades\Alert;

class CategoriesController extends Controller
{
    public function index()
    {
        $posts = Categories::all();

        return view('admin.categories.index')->with('posts', $posts);
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

        Alert::success('Added Category', 'You successfully added a new category');

        //Redirect
        return redirect(route('categories.index'));
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

        Alert::success('Updated Category', 'You successfully updated the category');
        return redirect(route('categories.index'));
    }

    public function destroy($id)
    {
        // Looks for the post ID user from the database
        $posts = Categories::find($id);

        // Delete the specific post using the ID user from the database
        $posts->delete();

        Alert::success('Deleted Category', 'You successfully removed the category');
        return redirect(route('categories.index'));
    }

}
