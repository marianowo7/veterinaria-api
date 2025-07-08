<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Consulta;
use App\Models\User;

class ConsultaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Consulta  $consulta
     * @return bool
     */
    public function view(User $user, Consulta $consulta) {
        return $user->rol === 'veterinario'
        || $user->rol === 'admin'
        || $mascota->cuit_duenio === $user->cuit;
    }  
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Consulta $consulta) {
        return $consulta->mascota->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Consulta $consulta) {
        return $consulta->mascota->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Consulta $consulta): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Consulta $consulta): bool
    {
        return false;
    }
}
