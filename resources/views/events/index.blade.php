@extends('layouts.event_layout')

@section('title')
    Events
@endsection

@section('content')
    <div class="event-section container py-3">
        <h1 class="title pb-3">Events</h1>
        <a class="btn btn-primary mb-3" href="{{ route('events.create') }}">Create Event</a>
        <div class="events-table-container overflow-auto">
            <table class="table table-striped table-bordered" id="events-table">
                <thead>
                    <tr class="text-center">
                        <th>Event Name</th>
                        <th>Event Slug</th>
                        <th>Event Start Date</th>
                        <th>Event End Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr class="text-center">
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->slug }}</td>
                            <td>{{ $event->start_date }}</td>
                            <td>{{ $event->end_date }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button class="btn btn-success rounded mx-1"><a class="text-white" href="{{ route('events.show', $event->id) }}"><i class="bi bi-eye"></i></a></button>
                                    <button class="btn btn-warning rounded mx-1"><a class="text-white" href="{{ route('events.edit', $event->id) }}"><i class="bi bi-pencil-square"></i></a></button>
                                    <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger rounded mx-1"><a class="text-white" href="{{ route('events.destroy', $event->id) }}"><i class="bi bi-trash"></i></a></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>{{ $events->links() }}</div>
    </div>
@endsection
