<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }

    public function index()
    {
        $post["Client"] = User::all();
        return view('pages.appointment', $post);
    }

    public function create()
    {
        $events = Event::all();
        return view('pages.appointment')->with('appointments', $events);
    }

    public function store(Request $request)
    {
        // Gets the data being create by the User
        $this->validate($request, [
            'title' => 'required',
            'start' => 'required|unique:events',
            'end' => 'nullable',
            'color' => 'required',
        ]);

        $x = date('Y-m-d H:i A', strtotime($request->start));
        $storeOpen = date('Y-m-d H:i A',strtotime('09:00 AM',strtotime($request->start)));
        $storeClose = date('Y-m-d H:i A',strtotime('10:00 PM',strtotime($request->start)));

        if($request->start < $x)
            return back()->with('error', 'The Date is invalid, please schedule from the current date and time');
        else
            if($x >= $storeClose || $x < $storeOpen)
                return back()->with('error', 'The store is closed. It opens 9 am to 8 pm.');
            else
                if($request->color == 'lightgreen')
                    $request->end = date('Y-m-d H:i',strtotime('+1 hour',strtotime($request->start)));
                elseif($request->color == 'lightblue')
                    $request->end = date('Y-m-d H:i',strtotime('+1 hour +30 minutes',strtotime($request->start)));
                elseif($request->color == 'yellow')
                    $request->end = date('Y-m-d H:i', strtotime('+30 minutes', strtotime($request->start)));

        //Create the data
        $post = new Event;
        $post->title = $request->input('title');
        $post->start = $request->input('start');
        $post->end = $request->end;
        $post->color = $request->input('color');
        $post->save();

        //Redirect
        return back()->with('success', 'Reserved Created');
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
        // Gets the data being create by the User
        $this->validate($request, [
            'title' => 'required',
            'start' => 'required|unique:events',
            'end' => 'nullable',
            'color' => 'required',
        ]);

        if($request->start < date('Y-m-d H:i'))
            return back()->with('error', 'The Date is invalid, please schedule from the current date and time');
        else
            if($request->start >= date('Y-m-d H:i',strtotime(21)) || $request->start <= date('Y-m-d H:i',strtotime(8)))
                return back()->with('error', 'The store is closed. Its open 9 am to 8 pm.');
            else
                if($request->color == 'lightgreen')
                    $request->end = date('Y-m-d H:i',strtotime('+1 hour',strtotime($request->start)));
                elseif($request->color == 'lightblue')
                    $request->end = date('Y-m-d H:i',strtotime('+1 hour +30 minutes',strtotime($request->start)));
                elseif($request->color == 'yellow')
                    $request->end = date('Y-m-d H:i', strtotime('+30 minutes', strtotime($request->start)));

        //Create the data
        $post = Event::find($id);
        $post->title = $request->input('title');
        $post->start = $request->input('start');
        $post->end = $request->end;
        $post->color = $request->input('color');
        $post->save();

        //Redirect
        return back()->with('success', 'Reserved Updated');
    }

    public function destroy($id)
    {
        //
    }
}
