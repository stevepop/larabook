<?php namespace Larabook\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Eloquent, Hash;
use Larabook\Registration\Events\UserHasRegistered;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator, PresentableTrait, FollowableTrait;

    /**
     * Fields that can be mass assigned
     */
    protected $fillable = ['username','email','password'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

    /**
     * Path to the presenter for a user
     * @var string
     */
    protected $presenter = 'Larabook\Users\UserPresenter';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    /**
     * Passwords must always be hashed
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * A user has many statuses
     *
     * @return mixed
     */
    public function statuses()
    {
        return $this->hasMany('Larabook\Statuses\Status')->latest();
    }

    /**
     * Register a new user
     *
     * @param $username
     * @param $email
     * @param $password
     * @return static
     */
    public static function register($username, $email, $password)
    {
        $user = new static(compact('username','email','password'));

        //raise an event
        $user->raise(new UserHasRegistered($user));

        return $user;
    }

    /**
     * Determine of the given user is the same
     * as the current one
     *
     * @param $user
     * @return mixed
     */
    public function is($user)
    {
        if (is_null($user)) return false;
        return $this->username == $user->username;
    }

}
