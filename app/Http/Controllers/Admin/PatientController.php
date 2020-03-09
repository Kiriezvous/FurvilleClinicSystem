<?php

namespace App\Http\Controllers\Admin;

use App\Patients;
use App\User;
use App\BloodTypes;
use App\Breed;
use App\PetType;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;



class PatientController extends Controller
{
    public function index()
    {
        $posts["User"] = User::all();
        $posts["BloodTypes"] = BloodTypes::all();
        $posts["Breed"] = Breed::all();
        $posts["PetType"] = PetType::all();
        $posts["Patients"] = Patients::all();
        return view('admin.patients.index', $posts);
    }

    public function store(Request $request)
    {
        // Gets the data being create by the User
        $this->validate($request, [
            'animalType' => 'required',
            'pet_name' => 'required',
            'owner' => 'required',
            'gender' => 'required',
            'bloodType' => 'required',
            'weight' => 'required',
            'height' => 'required',
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
            $path = public_path('assets/images/patients/' . $fileNameToStore);

            # Create original image
            Image::make($request->file('image'))->save($path);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        //Create the data
        $post = new Patients();
        $post->pet_type = $request->animalType;
        $post->pet_name = $request->pet_name;
        $post->user_id = $request->owner; //it gets the select name value in the request then passes to the post user_id
        $post->gender = $request->gender;
        $post->blood_type = $request->bloodType;
        $post->weight = $request->weight;
        $post->height = $request->height;
        $post->image = $fileNameToStore;
        $post->save();


        //Redirect
        return redirect(route('patients.index'))->with('success', 'New Patient Created');
    }

    public function update(Request $request, $id)
    {

//        dd($request->all());
        // Gets the data being create by the User

        $this->validate($request, [
            'animalType' => 'required',
            'pet_name' => 'required',
            'owner' => 'required',
            'gender1' => 'required',
            'bloodType' => 'required',
            'weight' => 'required',
            'height' => 'required',
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
            $path = public_path('assets/images/patients/' . $fileNameToStore);

            # Create original image
            Image::make($request->file('image'))->save($path);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        //Store the data
        $post = Patients::find($id);
        $post->pet_type = $request->animalType;
        $post->pet_name = $request->pet_name;
        $post->user_id = $request->owner;
        $post->gender = $request->gender1;
        $post->blood_type = $request->bloodType;
        $post->weight = $request->weight;
        $post->height = $request->height;
        if($request->hasFile('image')) {
            $post->image = $fileNameToStore;
        }


        $post->save();

        //Redirect
        return redirect(route('patients.index'))->with('success', 'New Patient Updated');
    }

}
