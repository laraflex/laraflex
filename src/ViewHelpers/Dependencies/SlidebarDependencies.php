<?php
namespace laraflex\ViewHelpers\Dependencies;
use laraflex\Contracts\Dependencies;

class SlidebarDependencies extends Dependencies
{
    public function toArray($data = NULL, array $config = NULL)
    {
        $var = [
            [
                'component' => 'NULL',
                'type' => 'local',
                'link' => 'css/slidebar.css',
            ],
            [
                'component' => 'NULL',
                'type' => 'link',
                'link' => 'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css',
            ],
            [
                'component' => 'slidebarjs',
                'type' => 'scriptjs',
                'lib' => 'https://cdnjs.cloudflare.com/ajax/libs/lory.js/2.5.3/lory.js',
            ],
            [
                'component' => 'slideshowjs',
                'type' => 'scriptjs',
                'arrowColor' => true,
                'lib' => 'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js',
            ],

        ];


        return $var;
    }

    static public function create(){
        return new SlidebarDependencies();
    }
}
