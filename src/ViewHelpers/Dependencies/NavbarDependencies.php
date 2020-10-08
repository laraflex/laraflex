<?php
namespace laraflex\ViewHelpers\Dependencies;

use laraflex\Contracts\Dependencies;

class NavbarDependencies extends Dependencies
{
    public function toArray($data = NULL, array $config = NULL)
    {
        $var = [
            [
                'component' => 'NULL',
                'type' => 'local',
                'link' => 'css/stylenavbar.css',
            ],
            [
                'component' => 'navbarjs',
                'type' => 'scriptjs',
            ],

        ];
        return $var;
    }

    static public function create(){
        return new NavbarDependencies();
    }
}
