<?php
namespace laraflex\ViewHelpers\Dependencies;

use laraflex\Contracts\Dependencies;

class PanelnavModalDependencies extends Dependencies
{
    public function toArray()
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
        return new PanelnavModalDependencies();
    }
}

