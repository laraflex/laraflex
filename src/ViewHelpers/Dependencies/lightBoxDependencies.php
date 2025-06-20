<?php
namespace laraflex\ViewHelpers\Dependencies;

use laraflex\Contracts\Dependencies;

class LightBoxDependencies extends Dependencies
{
    public function toArray($data = NULL, array $config = NULL)
    {
        $var = [

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
        return new LightBoxDependencies();
    }
    /**
     * Version 1.0
     */
}
