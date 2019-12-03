<?php
namespace App\ViewPresenters\Extra;

use laraflex\Contracts\Presenter;

class LoginPresenter extends Presenter
{

    public function toArray($data = NULL)
    {
        $var = [
            'component' => 'login',
            'type' => 'content',
            'title' => 'General Title of Component',
            'showRegister' => false,
        ];
        return $var;
    }

    public static function create()
    {
        return new LoginPresenter();
    }
}
