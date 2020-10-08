<?php
namespace laraflex\ViewHelpers\Dependencies;

use laraflex\Contracts\Dependencies;

class PanelDependencies extends Dependencies
{
    public function toArray($data = NULL, array $config = NULL)
    {
        $var = [
            [
                'component' => 'NULL',
                'type' => 'link',
                'link' => 'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css',
            ],
            [
                'component' => 'slideshowjs',
                'type' => 'scriptjs',
                'arrowColor' => true,
                'lib' =>  'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js',
            ],
            [
                'component' => 'paneljs',
                'type' => 'scriptjs',
            ],
        ];
        return $var;
    }

    static public function create(){
        return new PanelDependencies();
    }
}
