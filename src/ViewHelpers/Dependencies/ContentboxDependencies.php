<?php
namespace laraflex\ViewHelpers\Dependencies;

use laraflex\Contracts\Dependencies;

class ContentboxDependencies extends Dependencies
{
    public function toArray($data = NULL, array $config = NULL)
    {
        $var = [
            [
                'component' => 'modaljs',
                'type' => 'scriptjs',
            ],

        ];
        return $var;
    }

    static public function create(){
        return new ContentboxDependencies();
    }
}
