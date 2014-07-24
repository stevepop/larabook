<?php namespace Larabook\Users;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter {

    /**
     * Present the link to the users gravatar
     *
     * @param int $size
     * @return string
     */
    public function gravatar($size = 30)
    {
        $email = md5($this->email);

        return "//www.gravatar.com/avatar/{$email}?s={$size}&d=//placekitten.com/{$size}/{$size}";
    }
}