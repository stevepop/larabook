<?php

use Illuminate\Support\Facades\Auth;

class BaseController extends Controller {

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
	}

}
