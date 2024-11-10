<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;

class EventCalendarController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Event::whereDate('start', '>=', $request->start)
                         ->whereDate('end', '<=', $request->end)
                         ->get(['id', 'title', 'start', 'end']);
  
            return response()->json($data);
        }
  
        $events = Event::all(); 
        return view('layouts.calendar', compact('events'));
    }

    public function ajax(Request $request)
    {
        switch ($request->type) {
            case 'add':
                $event = Event::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;
  
            case 'update':
                $event = Event::find($request->id);
                if ($event) {
                    $event->update([
                        'title' => $request->title,
                        'start' => $request->start,
                        'end' => $request->end,
                    ]);

                    return response()->json($event);
                }
                break;
  
            case 'delete':
                $event = Event::find($request->id);
                if ($event) {
                    $event->delete();
                    return response()->json($event);
                }
                break;
  
            default:
                return response()->json(['error' => 'Invalid type'], 400);
                break;
        }
    }
}


























    
//     public function calendar(){
//         return view('layouts.full-calendar');
//     }



//     public function index()
//     {
//         // Retrieve events from the database
//         $events = Event::all();
//         return response()->json($events);
//     }

//     public function calendar(){
//         return view('layouts.calendar');
//     }

//     public function store(Request $request)
// {
//     $validatedData = $request->validate([
//         'title' => 'required|string|max:255',
//         'label' => 'required|string',
//         'start' => 'required|date',
//         'end' => 'required|date|after:start',
//         'location' => 'nullable|string|max:255',
//         'note' => 'nullable|string|max:255',
//     ]);

//     $event = Event::create($validatedData);

//     return response()->json($event);
// }


//     public function update(Request $request, $id)
//     {
//         $event = Event::findOrFail($id);
//         $event->update($request->validate([
//             'title' => 'required|string',
//             'label' => 'required|string',
//             'start' => 'required|date',
//             'end' => 'required|date|after:start',
//             'location' => 'nullable|string',
//             'note' => 'nullable|string',
//         ]));

//         return response()->json($event);
//     }

//     public function destroy($id)
//     {
//         $event = Event::findOrFail($id);
//         $event->delete();
//         return response()->json(['message' => 'Event deleted successfully']);
//     }
// }
