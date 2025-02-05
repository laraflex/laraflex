<?php
namespace laraflex\ViewHelpers\Dependencies;

use laraflex\Contracts\Dependencies;

class ImageControlPanelDependencies extends Dependencies
{
    public function toArray($data = NULL, array $config = NULL)
    {
        $var = [
            [
                'component' => 'NULL',
                'type' => 'link',
                'link' => 'https://use.fontawesome.com/releases/v5.0.13/css/all.css',
            ],
        ];
        return $var;
    }

    static public function create(){
        return new ImageControlPanelDependencies();
    }
}
