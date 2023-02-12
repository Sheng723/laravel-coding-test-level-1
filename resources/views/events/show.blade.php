@extends('layouts.event_layout')

@section('title')
    Show Event
@endsection

@section('content')
    <div class="container py-5">
        <div class="event-detail-table-container overflow-auto">
            <table class="table table-striped table-bordered" id="event-detail-table">
                <thead>
                    <tr class="text-center">
                        <th>Event Name</th>
                        <th>Event Slug</th>
                        <th>Event Start Date</th>
                        <th>Event End Date</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->slug }}</td>
                        <td>{{ $event->start_date }}</td>
                        <td>{{ $event->end_date }}</td>
                        <td>{{ $event->created_at }}</td>
                        <td>{{ $event->updated_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a class="btn btn-primary float-end" href="{{ route('dashboard') }}">Back</a>
    </div>
@endsection
