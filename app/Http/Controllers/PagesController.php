<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Patients;
use App\PetType;
use App\Products;
use App\Doctor;
use App\Event;
use App\User;
use Cart;
use App\Services;


class PagesController extends Controller
{
    public function home() {
        $posts["Products"] = Products::inRandomOrder('id', 'desc')->paginate(6);
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
        $post["Client"] = User::all();
        return view('pages.appointment', $post);
    }

    public function gallery() {
        return view('pages.gallery');
    }

    public function shoppingcart() {
        $posts["Categories"] = Categories::all();
        $posts["Products"] = Products::all();

        return view('pages.shoppingcart', $posts);
    }

    public function contact(){
        return view('pages.contact');
    }

    public function thankyou(){
        return view('pages.thankyou');
    }
}
