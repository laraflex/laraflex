<?php
namespace App\ViewPresenters;

use laraflex\Contracts\Presenter;
use laraflex\ViewHelpers\AccessControl;
use laraflex\ViewHelpers\ModelPaginate;

class SimpleFooterPresenter extends Presenter
{
    //use AccessControl, ModelPaginate;

    public function toArray($data = NULL)
    {

        $var = [
            'component' => 'simplefooter',
            'type' => 'footer',
            'image' => 'logo-option1.png',
            'imagePath' => 'images/app',
            'bgColor' => 'black',

            'label' => 'All rights reserved. © Laraflex. 2019',
            'socialNetworks' => [
                 'iconColor' => 'white', //'black', //'white', default value colorful
                 'facebook' => 'https://www.facebook.com/xxxxxx',
                 'twitter' => 'https://twitter.com/@xxxxxx',
                 'instagram' => 'https://www.instagram.com/xxxxxxx/',
                 'pinterest'  => 'https://br.pinterest.com/xxxxxx/',
                 'youtube' => 'https://www.youtube.com/channel/xxxxxxxx?view_as=public',
            ],
        ];

        return $var;
    }

    public static function create()
    {
        return new SimpleFooterPresenter();
    }
}
