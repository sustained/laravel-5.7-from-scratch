<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = Project::where('author_id', auth()->id())->get();

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:3'],
            'description' => 'required'
        ]);

        $attributes['author_id'] = auth()->id();

        Project::create($attributes);

        return redirect('/projects');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:3'],
            'description' => 'required'
        ]);

        $project->update($attributes);

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect('/projects');
    }
}
