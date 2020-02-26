<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Patients;
use App\Products;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        $data["Products"] = Products::all();
        $data["User"] = User::all();
        $data["Patients"] = Patients::all();
        return view('admin.dashboard.index', $data);
    }
}
