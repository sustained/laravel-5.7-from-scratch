@extends('layouts.main')

@section('title', 'View Projects')

@section('content')

    <ul>
        <li><a href="/projects/create">Create a New Project</a>
    </ul>

    <hr />

    <h1>View All Projects</h1>

    <hr />

    <ul>

    @foreach($projects as $project)

        <li><a href="/projects/{{ $project->id }}">{{ $project->title }}</a></li>

    @endforeach

    </ul>

@endsection
