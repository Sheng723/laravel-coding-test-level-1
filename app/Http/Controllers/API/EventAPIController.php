<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\PatchEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;

class EventAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();

        if ($events->isEmpty()) {
            return response()->json(['error' => 'No event data found.'], 404);
        } else {
            return response()->json($events, 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CreateEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEventRequest $request)
    {
        $event = Event::create($request->all());

        if ($event) {
            return response()->json(['success' => 'Event data is stored successfully'], 200);
        } else {
            return response()->json(['error' => 'Fail to store event data. Please try again.'], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $selectedEvent = Event::find($id);

        if ($selectedEvent) {
            return response()->json($selectedEvent, 200);
        } else {
            return response()->json(['error' => 'Event data not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateEventRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, $id)
    {
        $selectedEvent = Event::find($id);

        if ($selectedEvent) {
            if ($selectedEvent['slug'] === $request->slug) {
                unset($request['slug']);
            }

            $selectedEvent->update($request->all());
        } else {
            $selectedEvent = Event::create($request->all());
        }

        return response()->json($selectedEvent, 200);
    }

    /**
     * Patch the specified resource in storage.
     *
     * @param  \Illuminate\Http\PatchEventRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function patch(PatchEventRequest $request, $id)
    {
        $selectedEvent = Event::find($id);

        if ($selectedEvent) {
            if ($selectedEvent['slug'] === $request->slug) {
                unset($request['slug']);
            }

            $selectedEvent->update($request->all());

            return response()->json($selectedEvent, 200);
        } else {
            return response()->json(['error' => 'Event data not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $selectedEvent = Event::find($id);

        if ($selectedEvent) {
            $selectedEvent->delete();

            return response()->json(['success' => 'Event data is deleted successfully'], 200);
        } else {
            return response()->json(['error' => 'Event data not found'], 404);
        }
    }

    public function getActiveEvents()
    {
        $events = Event::where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->get();

        if ($events->isEmpty()) {
            return response()->json(['error' => 'No active events found'], 404);
        } else {
            return response()->json($events, 200);
        }
    }
}
