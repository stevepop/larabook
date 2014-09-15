<?php namespace Larabook\Mailers;
use Larabook\Users\User;

class UserMailer extends Mailer {

    /**
     * Welcome message sent to new user
     *
     * @param User $user
     */
    public function sendWelcomeMessageTo(User $user)
    {
        $subject = "Welcome To Larabook";
        $view = 'emails.registration.confirm';

        return $this->sendTo($user, $subject, $view);
    }
} 