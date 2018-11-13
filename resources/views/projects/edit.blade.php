@extends('layouts.main')

@section('title', 'Edit Project')

@section('content')

    <h1>Edit a Project</h1>

    <hr />

    <form action="/projects/{{ $project->id }}" method="POST">
        @csrf

        @method('PATCH')

        <div>
            <input type="text" name="title" value="{{ $project->title }}" placeholder="Project Title" />
        </div>

        <div>
            <textarea name="description" cols="30" rows="10" placeholder="Project Description">{{ $project->description }}</textarea>
        </div>

        <div>
            <button class="edit" type="submit">Edit Project</button>
        </div>
    </form>

    <form action="/projects/{{ $project->id }}" method="POST">
        @csrf

        @method('DELETE')

        <div>
            <button class="delete" type="submit">Delete Project</button>
        </div>
    </form>
@endsection
