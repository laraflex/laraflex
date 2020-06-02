<?php
namespace App\ViewPresenters;

use laraflex\Contracts\Presenter;
use laraflex\ViewHelpers\AccessControl;

class NavBarDefaultPresenter extends Presenter
{
    use AccessControl;
    public function toArray($data = NULL)
    {
        $var = [
            'component' => 'navbar',
            'type' => 'header',
            'logo' => 'logo-option1.png',
            'imagePath' => 'images/app/',          
            'label' => 'LaraFlex',
            'route' => 'home',
            'showLogin' => true,
            'showRegister' => true,           
            'bgColor' => 'black', //'black', //'bordeaux', //'white', //'navyBlue',
            //'fixedmenu' => true,
            //'transparent' => true,
            'fadeTransparency' => true,
            //'menuEffect' => true,
            'items' => [
                [
                    'label' => 'home',
                    'route' => 'home',
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
