<?php
namespace App\ViewPresenters;

use laraflex\Contracts\Presenter;

class ImagePanelPresenter extends Presenter
{

    public function toArray($data = NULL, array $config = NULL)
    {
        $var = [
            'component' => 'imagepanel',
            'type' => 'header',
            'title' => 'Venha para o paraíso',
            'imagePath' => 'local/images/app/imagepanel6.jpg',
            //'imagePath' => 'local/images/app/imagepanel15.png',
            'legend' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.',
            'btnLabel' => 'Saiba mais',
            'route' => 'saibamais',
            //'fontColor' => 'white',
            //'fontColor' => '#030c39',
            'fontColor' => '#000000',
            //'fontFamilyTitle' => 'Time new Roman',
            'extend' => true,
            //'imageClass' => 'none', //options 'container' and 'none' or 'NULL'
        ];
        return $var;
    }

    public static function create()
    {
        return new ImagePanelPresenter();
    }
}


