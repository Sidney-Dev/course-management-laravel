<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class CoursePolicy
{

    public function before(User $user, $ability): bool|null
    {
        if($user->roles()->where('name', 'admin')->exists()) return true;

        return null;
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // return true;
        if(Auth::user()->roles()->where('name', 'admin')->exists()) return true;

        return null;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Course $course): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Course $course): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Course $course): bool
    {
        return $user->roles()->where('name', 'admin')->first()
        ? Response::allow() 
        : Response::deny('You do not own this event.');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Course $course): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Course $course): bool
    {
        //
    }
}
