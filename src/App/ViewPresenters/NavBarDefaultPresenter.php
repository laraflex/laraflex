<?php
namespace App\ViewPresenters;

use laraflex\Contracts\Presenter;
use laraflex\ViewHelpers\AccessControl;

class NavBarDefaultPresenter extends Presenter
{
    use AccessControl;
    public function toArray($data = NULL, array $config = NULL)
    {

        $var = [
            'component' => 'navbar',
            'type' => 'header',
            //'logoPath' => 'local/images/app/logo-option1.png',
            'logoPath' => 'local/images/app/logo.png',
            //'logoPath' => 'local/images/app/logo.png',
            'altLogo' => 'LaraFlex',
            'route' => 'home',
            'showLogin' => true,
            'showRegister' => true,
            'showUserPerfil' => true,
            'showSetting' => true,
            'theme' => 'dark', //dark,light,nave, white
            'showSearch' => true,
            'routerSearch' => 'search',
            'transparent' => true,
            'container' => true,
            'items' => [
                [
                    'label' => 'home',
                    'route' => '/',
                ],

            ],
        ];
        $var = $this->checkPermissions($var);
        return $var;
    }
    public static function create()
    {
        return new NavBarDefaultPresenter();
    }
}
