<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Larabook\Forms\SignInForm;

class SessionsController extends \BaseController {

    private $signInForm;

    function __construct(SignInForm $signInForm)
    {
        $this->signInForm = $signInForm;

        $this->beforeFilter('guest',['except'=>'destroy']);
    }


    /**
	 * Show the form for signing in.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}

    /**
     * Log in a Larabook user
     */
    public function store()
    {

        // validate the form, if invalid, then go back
        $formData = Input::only('email', 'password');
        $this->signInForm->validate($formData);

        //if valid, then try to sign in
        if(! Auth::attempt($formData)) {
            Flash::message('We were not able to sign you in. Please check your credentials and try again');
            return Redirect::back()->withInput();
        }

        Flash::message('Welcome back!');
        // redirect to statuses
        return Redirect::intended('statuses');

    }

	/**
	 * Log a User out of Larabook
	 *
	 * @return mixed
	 */
	public function destroy()
	{
		Auth::logout();

        Flash::message('You have now been logged out.');

        return Redirect::home();
	}


}
