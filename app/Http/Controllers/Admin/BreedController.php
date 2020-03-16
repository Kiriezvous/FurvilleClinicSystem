<?php

namespace App\Http\Controllers\Admin;

use App\Breed;
use App\PetType;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BreedController extends Controller
{
    public function index()
    {
        $posts["Breed"] = Breed::all();
        $posts["Animal"] = PetType::all();
        return view('admin.animal.breed.index', $posts);
    }

    public function store(Request $request)
    {

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
            $path = public_path('assets/images/' . $fileNameToStore);

            # Create original image
            Image::make($request->file('image'))->save($path);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        //Create the data
        $posts = new Breed;
        $posts->animal_type = $request->animaltype;
        $posts->name = $request->name;
        $posts->description = $request->description;
        $posts->image = $fileNameToStore;
        $posts->save();

        Alert::success('Added Breed', 'You successfully added a new breed');

        //Redirect
        return redirect(route('breeds.index'));
    }

    public function show($id)
    {

    }

    public function update(Request $request, $id)
    {
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
            $path = public_path('assets/images/' . $fileNameToStore);

            # Create original image
            Image::make($request->file('image'))->save($path);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        //Create the data
        $posts = Breed::find($id);
        $posts->animal_type = $request->animaltype;
        $posts->name = $request->name;
        $posts->description = $request->description;
        if($request->hasFile('image')) {
            $posts->image = $fileNameToStore;
        }
        $posts->save();

        Alert::success('Updated Breed', 'You successfully updated the breed');

        //Redirect
        return redirect(route('breeds.index'));
    }

    public function destroy($id)
    {
        // Looks for the post ID user from the database
        $posts = Breed::find($id);

        //Image
        if($posts->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/assets/image/breeds/'.$posts->image);
        }

        // Delete the specific post using the ID user from the database
        $posts->delete();

        Alert::success('Deleted Breed', 'You successfully deleted the breed');
        return redirect(route('breeds.index'));
    }

}
