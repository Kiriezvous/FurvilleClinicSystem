<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loadEvents()
    {
        $events = Event::all();
        return response()->json($events);
    }

    public function create()
    {
        $events = Event::all();
        return view('admin.appointment.calendar.create')->with('appointments', $events);
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
        return redirect('/appointment')->with('success', 'Post Created');
    }

    public function show($id)
    {
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
