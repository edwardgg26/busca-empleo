<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacante;
use Illuminate\Auth\Access\Response;

class VacantePolicy
{

    public function viewAny(User $user): bool
    {
        return $user->rol_id === 2;
    }

    public function create(User $user): bool
    {
        return $user->rol_id === 2;
    }

    public function show(User $user, Vacante $vacante): bool
    {
        return $user->id === $vacante->user_id;
    }


    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Vacante $vacante): bool
    {
        return $user->id === $vacante->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Vacante $vacante): bool
    {
        return $user->id === $vacante->user_id;
    }
}
