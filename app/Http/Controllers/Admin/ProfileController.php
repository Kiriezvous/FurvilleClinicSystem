<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Admin;


class ProfileController extends Controller
{
    public function index()
    {
        $post = Admin::all();
        return view('admin.profile.index', $post);
    }
}
