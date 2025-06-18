<?php
namespace laraflex\ViewHelpers\Dependencies;

use laraflex\Contracts\Dependencies;

class carouselDependencies extends Dependencies
{
    public function toArray($data = NULL, array $config = NULL)
    {
        $var = [
            [
                'component' => 'NULL',
                'type' => 'local',
                'link' => 'css/carousel.css',
            ],

        ];
        return $var;
    }

    static public function create(){
        return new carouselDependencies();
    }
}
