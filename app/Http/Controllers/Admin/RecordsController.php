<?php

namespace App\Http\Controllers\Admin;

use App\Diagnosis;
use App\Patients;
use Illuminate\Http\Request;
use App\Records;

class RecordsController extends Controller
{
    public function index()
    {
        $posts["Records"] = Records::all();
        $posts["Patients"] = Patients::all();
        $posts["Diagnosis"] = Diagnosis::all();

        return view('admin.patients.records.index', $posts);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
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

