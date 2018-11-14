<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function tasks()
    {
        return $this->hasMany(ProjectTask::class);
    }

    public function addTask($attributes)
    {
        // ProjectTask::create([
        //     'project_id' => $project->id,
        //     'description' => request('description')
        // ]);

        return $this->tasks()->create($attributes);
    }
}
