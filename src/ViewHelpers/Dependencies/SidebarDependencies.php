<?php
namespace laraflex\ViewHelpers\Dependencies;

use laraflex\Contracts\Dependencies;

class SidebarDependencies extends Dependencies
{
    public function toArray($data = NULL, array $config = NULL)
    {

        $styleTheme = config('laraflex.sideBarstyle');
        if ($styleTheme == 'dark'){
            $linkStyle = 'css/styleblack.css';
        }else{
            $linkStyle = 'css/stylelight.css';
        }
        $var = [
            [
                'component' => NULL,
                'type' => 'scriptjs',
                'lib' => config('laraflex.defaultconfig.jquery'),
            ],
            [
                'component' => 'NULL',
                'type' => 'link',
                'link' => 'https://use.fontawesome.com/releases/v5.0.13/css/all.css',
            ],
            [
                'component' => 'NULL',
                'type' => 'local',
                'link' => $linkStyle,
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
