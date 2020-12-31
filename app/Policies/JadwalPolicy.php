<?php

namespace App\Policies;

use App\Jadwal;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class JadwalPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */


    public function before($user, $ability)
    {
        if ($user->hasRole('pimpinan') || $user->hasRole('admin')) {
            return true;
        }
    }


    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Jadwal  $jadwal
     * @return mixed
     */
    public function view(User $user, Jadwal $jadwal)
    {
        return $user->id === $jadwal->user_id
            ? Response::allow()
            : Response::deny('You do not own this data.');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Jadwal  $jadwal
     * @return mixed
     */
    public function update(User $user, Jadwal $jadwal)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Jadwal  $jadwal
     * @return mixed
     */
    public function delete(User $user, Jadwal $jadwal)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Jadwal  $jadwal
     * @return mixed
     */
    public function restore(User $user, Jadwal $jadwal)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Jadwal  $jadwal
     * @return mixed
     */
    public function forceDelete(User $user, Jadwal $jadwal)
    {
        //
    }
}
