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
        // $event = [];

        // foreach($events as $row){
        //     $end = $row->end." 24:00:00";
        //     $event[] = Calendar::event( //Cant call cuz its on the package
        //         $row->title,
        //         true,
        //         new \DateTime($row->start),
        //         new \DateTimw($row->end),
        //         $row->id,
        //         [
        //             'color' => $row->color,
        //         ]
        //         );
        // }
        // $calendar = \Calendar::addEvents($event);
        // return view('admin.appointment.calendar.fullcalendar', compact('events', 'calendar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::all();
        return view('admin.appointment.calendar.create')->with('appointments', $events);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
