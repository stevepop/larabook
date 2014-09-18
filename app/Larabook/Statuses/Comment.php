<?php namespace Larabook\Statuses;


class Comment extends \Eloquent {
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'status_id', 'body'];

    /**
     * Comments belong to one user. Added user_id as second parameter
     * because default would have been owner_id which does not exist
     *
     * @return mixed
     */
    public function owner()
    {
        return $this->belongsTo('Larabook\Users\User','user_id');
    }

    public static function leave($body, $statusId)
    {
        return new static([
            'body' => $body,
            'status_id' => $statusId
        ]);
    }
} 