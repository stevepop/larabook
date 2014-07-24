<?php namespace Larabook\Statuses;

use Larabook\Users\User;

class StatusRepository {

    public function getAllForUser(User $user)
    {
        // eager load users and get latest statuses
        // latest() is alias for orderBy('created_at, desc')
        return $user->statuses()->with('user')->latest()->get();
    }

    /**
     * Save a new status for a user
     *
     * @param Status $status
     * @param $userId
     * @return mixed
     */
    public function save(Status $status, $userId)
    {
       return User::findOrFail($userId)
           ->statuses()
           ->save($status);
    }
} 