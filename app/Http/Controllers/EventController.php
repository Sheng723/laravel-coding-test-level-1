<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Mail\EventCreated;
use App\Models\Event;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::paginate(5);

        return view('events.index', [
            'events' => $events,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CreateEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEventRequest $request)
    {
        $event = Event::create($request->all());

        if ($event) {
            Mail::to('example@gmail.com')->queue(new EventCreated($event));
            flash('Event data is stored successfully')->success();
        } else {
            flash('Sorry! Please try again.')->error();
        }

        return redirect(route('events.index'));
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

        if (! $selectedEvent) {
            flash('Data not found! Please try again.')->error();

            return redirect(route('events.index'));
        }

        return view('events.show', [
            'event' => $selectedEvent,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $selectedEvent = Event::find($id);

        if (! $selectedEvent) {
            flash('Data not found! Please try again.')->error();

            return redirect(route('events.index'));
        }

        return view('events.edit', [
            'event' => $selectedEvent,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdateEventRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, $id)
    {
        $selectedEvent = Event::find($id);

        if ($selectedEvent) {
            $selectedEvent->update($request->all());
            flash('Event data is updated successfully')->success();
        } else {
            flash('Sorry! Please try again.')->error();
        }

        return redirect(route('events.index'));
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
            flash('Event data is deleted successfully')->success();
        } else {
            flash('Sorry! Please try again.')->error();
        }

        return redirect(route('events.index'));
    }
}
