<?php
namespace App\ViewPresenters;

use laraflex\Contracts\Presenter;

class ImageBarPresenter extends Presenter
{
    public function toArray($data = NULL)
    {
        $var = [
            'component' => 'imagebar',
            'type' => 'header',
            'route' => 'promocoes',
            'height' => '180px',
            'imagePath' => 'images/app/jpimagebar2g.jpg',
            'title' => 'Torne-se um especialista em Laraflex',
            'text' => 'Matricula-se já e garanta seu futuro.',
            'textAlign' => 'left',
            'fontColor' => 'white',
        ];
        return $var;
    }

    public static function create()
    {
        return new ImageBarPresenter();
    }
}






