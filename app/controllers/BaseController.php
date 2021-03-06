<?php

use Illuminate\Support\Facades\Auth;
use Laracasts\Commander\CommanderTrait;

class BaseController extends Controller {
    use CommanderTrait;

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}

        // share this variable across views
        View::share('currentUser', Auth::user());
        View::share('signedIn', Auth::user());

	}

}
