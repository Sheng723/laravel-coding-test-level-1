@extends('layouts.event_layout')

@section('title')
    Edit Event
@endsection

@section('content')
    <div class="container py-5">
        <h1 class="title">Edit Event</h1>
        <form action="{{ route('events.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('events.form')
        </form>
    </div>
@endsection