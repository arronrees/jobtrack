<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;


class JobPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Job $job): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role === 'Superadmin' || $user->role === 'Admin' || $user->role === 'Editor' || $user->role === 'Author';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Job $job): bool
    {
        if ($user->role === 'Superadmin' || $user->role === 'Admin') {
            return true;
        }

        // owners can update
        if ($user->id === $job->user_id) {
            return true;
        }

        // editors can update authors and other editors jobs
        if ($user->role === 'Editor' && ($job->user->role === 'Author' || $job->user->role === 'Editor')) {
            return true;
        }

        return false;
    }
}
