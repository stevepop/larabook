<?php namespace Larabook\Mailers;

use Illuminate\Mail\Mailer as Mail;

/**
 * Generic class for Mail functions
 *
 * Class Mailer
 */
abstract class Mailer {

    /**
     * mailer instance
     * @var
     */
    private $mail;

    /**
     * @param Mail $mail
     */
    function __construct(Mail $mail)
    {
        $this->mail = $mail;
    }

    /**
     * @param $user
     * @param $subject
     * @param $view
     * @param $data
     */
    public function sendTo($user, $subject, $view, $data=[])
    {
        $this->mail->send($view, $data, function($message) use($user, $subject)
        {
            $message->to($user->email)->subject($subject);
        });
    }
} 