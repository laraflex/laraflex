<?php
namespace App\ViewPresenters;

use laraflex\Contracts\Presenter;

class ImagePanelPresenter extends Presenter
{

    public function toArray($data = NULL)
    {
        $var = [
            'component' => 'imagepanel',
            'type' => 'header',
            'textAlign' => 'right',
            'title' => 'General Title of Component',
            'image' => 'imagepanel1.jpg',
            'imagePath' => 'images/app',
            'title' => 'Laraflex view package',
            'text' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.',
            'btnLabel' => 'Saiba mais',
            'route' => 'saibamais',
            'fontColor' => 'white',
            'imageClass' => 'none',
        ];
        return $var;
    }

    public static function create()
    {
        return new ImagePanelPresenter();
    }
}


