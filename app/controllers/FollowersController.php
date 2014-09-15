<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Larabook\Users\FollowUserCommand;
use Larabook\Users\UnfollowUserCommand;
use Laracasts\Flash\Flash;

class FollowersController extends \BaseController {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//  id of the user to follow
        // id of the authenticated user
        $input = array_add(Input::get(), 'userId',Auth::id());

        $this->execute(FollowUserCommand::class, $input);

        Flash::success('You are now followinig this user.');

        return Redirect::back();

	}


    /**
     * Unfollow a user
     *
     * @param $userIdToUnfollow
     * @return mixed
     */
    public function destroy($userIdToUnfollow)
	{
        $input = array_add(Input::get(), 'userId', Auth::id());

		$this->execute(UnfollowUserCommand::class, $input);

        Flash::success('You have now unfollowed this user.');

        return Redirect::back();
	}


}
