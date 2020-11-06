<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\HealthLog;
use App\Models\User;

class HealthLogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the health logs index page.
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
     * team's health logs.
     *
     * @param User $user
     * @param HealthLog $healthLog
     * @return bool
     */
    public function view(User $user, HealthLog $healthLog)
    {
        return $user->hasTeamPermission($user->currentTeam, 'read');
    }

    /**
     * Determine whether the user can create a health log
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
     * Determine whether the user can update a health log
     * for the current team.
     *
     * @param User $user
     * @param HealthLog $healthLog
     * @return bool
     */
    public function update(User $user, HealthLog $healthLog)
    {
        return $user->hasTeamPermission($user->currentTeam, 'update');
    }

    /**
     * Determine whether the user can delete a health log
     * for the current team.
     *
     * @param User $user
     * @param HealthLog $healthLog
     * @return bool
     */
    public function delete(User $user, HealthLog $healthLog)
    {
        return $user->hasTeamPermission($user->currentTeam, 'delete');
    }
}
