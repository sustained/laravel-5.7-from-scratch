@extends('layouts.main')

@section('title', 'Create Project')

@section('content')

    <h1>Create a Project</h1>

    <hr />

    @include('partials.errors')

    <form action="/projects" method="POST">
        @csrf

        <div>
            <input type="text" name="title" placeholder="Project Title" value="{{ old('title') }}" />
        </div>

        <div>
            <textarea name="description" cols="30" rows="10" placeholder="Project Description">{{ old('description') }}</textarea>
        </div>

        <div>
            <button class="create" type="submit">Create Project</button>
        </div>
    </form>
@endsection
