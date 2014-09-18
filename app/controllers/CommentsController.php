<?php

use Illuminate\Support\Facades\Redirect;
use Larabook\Statuses\LeaveCommentOnStatusCommand;
use Laracasts\Commander\CommanderTrait;

class CommentsController extends \BaseController {

    use CommanderTrait;

	/**
	 * Leave a new comment
	 *
	 * @return Response
	 */
	public function store()
	{
		// Fetch the input
        $input = array_add(Input::get(), 'user_id', Auth::id());

        // Execute a command
        $this->execute(LeaveCommentOnStatusCommand::class, $input);

        // go back
        return Redirect::back();
	}
}