<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\ProjectTask;

class ProjectTasksController extends Controller
{
    public function update(Project $project, ProjectTask $task)
    {
        $task->update([
            'completed' => request()->has('completed')
        ]);

        return back();
    }
}
