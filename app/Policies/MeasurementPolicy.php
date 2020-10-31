<?php

namespace App\Policies;

use App\Models\Measurement;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MeasurementPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the measurements index page.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return $user->hasTeamPermission($user->currentTeam, 'read');
    }

    /**
     * Determine whether the user can view the current
     * team's measurements.
     *
     * @param User $user
     * @param Measurement  $measurement
     * @return bool
     */
    public function view(User $user, Measurement $measurement)
    {
        return $user->hasTeamPermission($user->currentTeam, 'read');
    }

    /**
     * Determine whether the user can create a measurement
     * for the current team.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user)
    {
        return $user->hasTeamPermission($user->currentTeam, 'create');
    }

    /**
     * Determine whether the user can update a measurement
     * for the current team.
     *
     * @param User $user
     * @param Measurement  $measurement
     * @return bool
     */
    public function update(User $user, Measurement $measurement)
    {
        return $user->hasTeamPermission($user->currentTeam, 'update');
    }

    /**
     * Determine whether the user can delete a measurement
     * for the current team.
     *
     * @param User $user
     * @param Measurement $measurement
     * @return bool
     */
    public function delete(User $user, Measurement $measurement)
    {
        return $user->hasTeamPermission($user->currentTeam, 'delete');
    }
}
