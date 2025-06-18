<?php
namespace laraflex\ViewHelpers\Dependencies;

use laraflex\Contracts\Dependencies;

class BloglistDependencies extends Dependencies
{
    public function toArray($data = NULL, array $config = NULL)
    {
        $var = [
            [
                'component' => 'NULL',
                'type' => 'local',
                'link' => 'css/bloglist.css',
            ],

        ];
        return $var;
    }

    static public function create(){
        return new BloglistDependencies();
    }
}
