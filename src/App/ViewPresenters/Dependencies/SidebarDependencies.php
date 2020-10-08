<?php
namespace App\ViewPresenters\Dependencies;

use laraflex\Contracts\Dependencies;

class SidebarDependencies extends Dependencies
{
    public function toArray($data = NULL, array $config = NULL)
    {
        $var = [
            [
                'component' => 'NULL',
                'type' => 'link',
                'link' => 'https://use.fontawesome.com/releases/v5.0.13/css/all.css',
            ],
            [
                'component' => 'NULL',
                'type' => 'local',
                'link' => 'css/stylelight.css',
                //'link' => 'css/styledark.css',
            ],
            [
                'component' => 'sidebarjs',
                'type' => 'scriptjs',
            ],

        ];
        return $var;
    }

    static public function create(){
        return new SidebarDependencies();
    }
}
