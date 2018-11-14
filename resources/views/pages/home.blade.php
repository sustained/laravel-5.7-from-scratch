@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <h1>Home</h1>

    <p>Welcome home!</p>

    <p>Why not <a href="/contact">contact us</a>?</p>

    <h2>My Tasks</h2>

    <ul style="list-style-type: none;">

    @foreach($tasks as $task)

        <li><input type="checkbox" {{ $task['completed'] ? 'checked' : '' }} /> {{ $task['task'] }}</li>

    @endforeach

    </ul>

@endsection
