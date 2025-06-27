<?php
namespace App\ViewPresenters;

use laraflex\Contracts\Presenter;
use laraflex\ViewHelpers\AccessControl;

class NavBarDefaultPresenter extends Presenter
{
    use AccessControl;
    public function toArray($data = NULL, array $config = NULL)
    {

        $fixedMenu = !empty($config['fixedMenu'])?$config['fixedMenu']:false;
        $transparent = !empty($config['transparent'])?$config['transparent']:false;
        $fadeTransparency = !empty($config['fadeTransparent'])?$config['fadeTransparent']:false;
        $menuEffect = !empty($config['menuEffect'])?$config['menuEffect']:false;
        $bgColor = 'black'; //'black', //'bordeaux', //'white', //'navyBlue',


        if (!empty($config['page'])){
            if ($config['page'] == 'home'){
                $fixedmenu = true;
                $transparent = true;
                $fadeTransparency = true;
                $menuEffect = false;
            }
        }

        $var = [
            'component' => 'navbar',
            'type' => 'header',
            //'logoPath' => 'local/images/app/logo-option1.png',
            'logoPath' => 'local/images/app/logo-b.png',
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
