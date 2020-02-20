<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class FullCalendarController extends Controller
{

    public function index() {
        $data['events'] = Event::all();
        return view('admin.appointment.calendar.fullcalendar', $data);
    }

    public function create() {
        $events = Event::all();
        return view('pages.appointment')->with('appointments', $events);
    }

    public function store(Request $request)
    {
        // Gets the data being create by the User
        $this->validate($request, [
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
            'color' => 'required',
        ]);


        //Create the data
        $post = new Event;
        $post->title = $request->input('title');
        $post->start = $request->input('start');
        $post->end = $request->input('end');
        $post->color = $request->input('color');
        $post->save();


        //Redirect
        return redirect('/online-appointment')->with('success', 'Post Created');
    }
}
