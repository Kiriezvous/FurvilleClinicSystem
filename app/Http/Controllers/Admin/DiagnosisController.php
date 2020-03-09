<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.patients.diagnosis.index', $posts);
    }

    public function store(Request $request)
    {
        // Gets the data being create by the User
        $this->validate($request, [
            'patient' => 'required',
            'diagnosis' => 'required',
            'doctor' => 'required',
            'complaints' => 'required',
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
        return redirect(route('diagnosis.index'))->with('success', 'New Diagnose Added');
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
