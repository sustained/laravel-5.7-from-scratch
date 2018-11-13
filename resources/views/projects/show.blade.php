@extends('layouts.main')

@section('title', 'View Project')

@push('inline-styles')
ul#project-tasks {
    list-style-type: none;
}
li.completed label {
    text-decoration: line-through;
}
@endpush

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

        <ul id="project-tasks">

        @foreach($project->tasks as $task)

            <li class="{{ $task->completed ? 'completed' : ''}}">
                    <form action="/projects/{{ $project->id }}/tasks/{{ $task->id }}" method="POST">
                        @csrf

                        @method('PATCH')

                        <input type="checkbox" name="completed" id="task-checkbox-{{ $task->id }}" onChange="this.form.submit()"{{ $task->completed ? ' checked' : '' }} />

                        <label for="task-checkbox-{{ $task->id }}">{{ $task->description }}</label>
                    </form>
                </li>

        @endforeach

        </ul>

        <h4>Add Task</h4>

        <form action="" method="POST">
            <div>
                <input type="text" name="description" />
            </div>
        </form>

    @endif

@endsection
