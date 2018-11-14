<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Project;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Assert that a user owns a project.
     *
     * @return boolean
     */
    public function owns(User $user, Project $project)
    {
        return (int) $project->author_id === $user->id;
    }
}
