@extends('layouts.main')

@section('title', 'View Project')

@section('content')

    <ul>
        <li><a href="/projects/{{ $project->id }}/edit">Edit Project</a>
    </ul>

    <hr />

    <h1>View Project</h1>

    <hr />

    <h2>{{ $project->title }}</h2>

    <p>{{ $project->description }}</p>

    @if($project->tasks->count())

        <hr />

        <h3>Tasks</h3>

        <ul>

        @foreach($project->tasks as $task)

            <li>{{ $task->description }}</li>

        @endforeach

        </ul>

    @endif

@endsection
