<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services;
use DB;

class PagesController extends Controller
{
    public function profile() {
        return view('pages.profile');
    }

    public function home() {
        $posts = Services::orderBy('id', 'desc')->paginate(3);
        return view('pages.home')->with('posts', $posts);
    }

    public function service() {
        return view('pages.service');
    }

    public function about() {
        return view('pages.about');
    }
}
