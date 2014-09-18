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
     * Get the feed for a user
     *
     * @param User $user
     * @return mixed
     */
    public function getFeedForUser(User $user)
    {
        $userIds = $user->followedUsers()->lists('followed_id');
        $userIds[] = $user->id;

        return Status::with('comments')->whereIn('user_id', $userIds)->latest()->get();
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

    public function leaveComment($userId, $statusId, $body)
    {
        $comment = Comment::leave($body, $statusId);

        User::findOrFail($userId)->comments()->save($comment);

        return $comment;
    }
} 