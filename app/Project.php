<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Project extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::created(function($project) {
            // Mail::to('sustained.dissonance+laravel@gmail.com')->send(
            //     new ProjectCreatedMail($project)
            // );
        });
    }

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

    public function owner()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
