@extends('layouts.main')

@section('title', 'Create Project')

@push('inline-styles') /* css */

    form div {
        margin: 10px;
    }

@endpush

@section('content')

    <h1>Create a Project</h1>

    <form action="/projects" method="POST">
        @csrf

        <div>
            <input type="text" name="title" placeholder="Project Title" />
        </div>

        <div>
            <textarea name="description" cols="30" rows="10" placeholder="Project Description"></textarea>
        </div>

        <div>
            <button type="submit">Create Project</button>
        </div>
    </form>
@endsection
