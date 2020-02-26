<?php

namespace App\Http\Controllers;

use App\Diagnosis;
use App\Doctor;
use App\Patients;
use Illuminate\Http\Request;

class DiagnosisController extends Controller
{

    public function index()
    {
        $posts["Patients"] = Patients::all();
        $posts["Doctors"] = Doctor::all();
        $posts["Diagnosis"] = Diagnosis::all();
        return view('patients.diagnosis.index', $posts);
    }

    public function store(Request $request)
    {
        // Gets the data being create by the User
        $this->validate($request, [
            'image' => 'image|nullable|max:1999'
        ]);

        //Create the data
        $post = new Diagnosis();
        $post->patient_id = $request->patient_id;
        $post->diagnosis = $request->diagnosis;
        $post->doctor_attended = $request->doctor_attended; //it gets the select name value in the request then passes to the post user_id
        $post->complaints = $request->complaints;
        $post->labresults = $request->labresults;
        $post->save();

        //Redirect
        return redirect('/diagnosis');
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
