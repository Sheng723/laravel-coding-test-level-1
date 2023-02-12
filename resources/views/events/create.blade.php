@extends('layouts.event_layout')

@section('title')
    Create Event
@endsection

@section('content')
    <div class="container py-5">
        <h1 class="title">Create Event</h1>
        <form action="{{ route('events.store') }}" method="POST">
            @csrf
            @include('events.form')
        </form>
    </div>
@endsection