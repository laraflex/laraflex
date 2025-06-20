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
                'component' => 'slidebarjs',
                'type' => 'scriptjs',
                'lib' => 'https://cdnjs.cloudflare.com/ajax/libs/lory.js/2.5.3/lory.js',
            ],
            [
                'component' => 'slideshowjs',
                'type' => 'scriptjs',
                'arrowColor' => true,
                'lib' => 'https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.5/dist/index.bundle.min.js',
            ],

        ];



        return $var;
    }

    static public function create(){
        return new SlidebarDependencies();
    }
}
