@extends('layouts.main')

@section('title', 'View Projects')

@section('content')

    <ul>
        <li><a href="/projects/create">Create a New Project</a>
    </ul>

    <h1>Projects</h1>

    <ul>

    @foreach($projects as $project)

        <li>{{ $project->title }}</li>

    @endforeach

    </ul>

@endsection
