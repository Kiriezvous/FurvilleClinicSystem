<?php

namespace App\Http\Controllers;

use App\Patients;
use App\Products;
use App\Doctor;
use App\Events;

use App\Services;
use DB;

class PagesController extends Controller
{
    public function profile() {
        return view('pages.profile');
    }

    public function home() {
        $posts["Products"] = Products::orderBy('id', 'desc')->paginate(6);
        $posts["Services"] = Services::orderBy('id', 'desc')->paginate(3);
        $posts["Doctors"] = Doctor::orderBy('id', 'desc')->paginate(3);
        $posts["Patients"] = Patients::orderBy('id', 'desc')->paginate(3);
        return view('pages.home', $posts);
    }

    public function service() {
        $posts["Services"] = Services::all();
        return view('pages.service', $posts);
    }

    public function about() {
        return view('pages.about');
    }

    public function appointment() {
        return view('pages.appointment');
    }

    public function gallery() {
        return view('pages.gallery');
    }

    public function shoppingcart() {
        return view('pages.shoppingcart');
    }

    public function contact(){
        return view('pages.contact');
}
}
