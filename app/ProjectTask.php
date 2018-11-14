<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTask extends Model
{
    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function setCompleted($completed = false)
    {
        $this->update(['completed' => $completed]);
    }

    public function toggleCompleted()
    {
        $this->setCompleted( ! $this->completed);
    }
}
