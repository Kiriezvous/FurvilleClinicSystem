<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Event;
use DB;

class EventController extends Controller
{
    public function index() {
        $data['events'] = Event::all();
        return view('admin.appointment.calendar.fullcalendar', $data);
    }

    public function show() {
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
            'start' => 'required|unique:events',
            'time' => 'required',
            'color' => 'required',
        ]);

//        $request->start = date('Y-m-d H:i',strtotime('17:00', strtotime($request->start)));
//        $count = Event::where('start', $request->start)->count();
        //dd($request->start);

        if($request->time == '9') {
            $request->start = date('Y-m-d H:i',strtotime('17:00', strtotime($request->start)));
            $count = Event::where('start', $request->start)->count();
            //dd($count);
            if($count < 3) {
                $request->time = date('Y-m-d H:i', strtotime('18:00', strtotime($request->start)));
            } else {
                return back()->with('error', 'The time slot is already taken.');
            }
        } elseif($request->time == '8') {
            $request->start = date('Y-m-d H:i', strtotime('16:00', strtotime($request->start)));
            $count = Event::where('start', $request->start)->count();
            if($count < 3) {
                $request->time = date('Y-m-d H:i', strtotime('17:00', strtotime($request->start)));
            } else {
                return back()->with('error', 'The time slot is already taken');
            }
        } elseif($request->time == '7') {
            $request->start = date('Y-m-d H:i', strtotime('15:00', strtotime($request->start)));
            $count = Event::where('start', $request->start)->count();
            if($count < 3) {
                $request->time = date('Y-m-d H:i', strtotime('16:00', strtotime($request->start)));
            } else {
                return back()->with('error', 'The time slot is already taken');
            }
        } elseif($request->time == '6') {
            $request->start = date('Y-m-d H:i', strtotime('14:00', strtotime($request->start)));
            $count = Event::where('start', $request->start)->count();
            if($count < 3) {
                $request->time = date('Y-m-d H:i', strtotime('15:00', strtotime($request->start)));
            } else {
                return back()->with('error', 'The time slot is already taken');
            }
        } elseif($request->time == '5') {
            $request->start = date('Y-m-d H:i', strtotime('13:00', strtotime($request->start)));
            $count = Event::where('start', $request->start)->count();
            if($count < 3) {
                $request->time = date('Y-m-d H:i', strtotime('14:00', strtotime($request->start)));
            } else {
                return back()->wtih('error', 'The time slot is already taken');
            }
        } elseif($request->time == '4') {
            $request->start = date('Y-m-d H:i', strtotime('12:00', strtotime($request->start)));
            $count = Event::where('start', $request->start)->count();
            if($count < 3) {
                $request->time = date('Y-m-d H:i', strtotime('13:00', strtotime($request->start)));
            } else {
                return back()->with('error', 'The time slot is already taken');
            }
        } elseif($request->time == '3') {
            $request->start = date('Y-m-d H:i', strtotime('11:00', strtotime($request->start)));
            $count = Event::where('start', $request->start)->count();
            if($count < 3) {
                $request->time = date('Y-m-d H:i', strtotime('12:00', strtotime($request->start)));
            } else {
                return back()->with('error', 'The time slot is already taken');
            }
        } elseif($request->time == '2') {
            $request->start = date('Y-m-d H:i', strtotime('10:00', strtotime($request->start)));
            $count = Event::where('start', $request->start)->count();
            if($count < 3) {
                $request->time = date('Y-m-d H:i', strtotime('11:00', strtotime($request->start)));
            } else {
                return back()->with('error', 'The time slot is already taken');
            }
        } elseif($request->time == '1') {
            $request->start = date('Y-m-d H:i', strtotime('09:00', strtotime($request->start)));
            $count = Event::where('start', $request->start)->count();
            if($count < 3) {
                $request->time = date('Y-m-d H:i', strtotime('10:00', strtotime($request->start)));
            } else {
                return back()->with('error', 'The time slot is already taken');
            }
        } else {
            return back()->with('error', 'There is an error in the entry please refresh');
        }

//        $x = date('Y-m-d H:i A', strtotime($request->start));
//        $storeOpen = date('Y-m-d H:i A',strtotime('09:00 AM',strtotime($request->start)));
//        $storeClose = date('Y-m-d H:i A',strtotime('10:00 PM',strtotime($request->start)));
//
//        if($request->start < $x)
//            return back()->with('error', 'The Date is invalid, please schedule from the current date and time');
//        else
//            if($x >= $storeClose || $x <= $storeOpen)
//                return back()->with('error', 'The store is closed. It opens 9 am to 10 pm.');
//            else
//                if($request->color == 'lightgreen')
//                    $request->end = date('Y-m-d H:i',strtotime('+1 hour',strtotime($request->start)));
//                elseif($request->color == 'lightblue')
//                    $request->end = date('Y-m-d H:i',strtotime('+1 hour +30 minutes',strtotime($request->start)));
//                elseif($request->color == 'yellow')
//                    $request->end = date('Y-m-d H:i', strtotime('+30 minutes', strtotime($request->start)));
//
//         if($request->time == '1') {
//             $x = date('Y-m-d H:i A', strtotime($request->start));
//         }  else {
//             $x = date('Y-m-d H:i A', strtotime($request->start));
//         }

        //Create the data
        $post = new Event;
        $post->title = $request->input('title');
        $post->start = $request->start;
        $post->end = $request->time;
        $post->color = $request->input('color');
        $post->save();


        //Redirect
        return back()->with('success', 'Appointment Created');
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
