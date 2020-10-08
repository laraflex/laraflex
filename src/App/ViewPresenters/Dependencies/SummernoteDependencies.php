<?php
namespace App\ViewPresenters\Dependencies;

use laraflex\Contracts\Dependencies;

class SummernoteDependencies extends Dependencies
{
    public function toArray($data = NULL, array $config = NULL)
    {
        $var = [
            [
                'component' => 'summernotejs',
                'type' => 'scriptjs',
                'lib' => 'https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js',
                'insertImage' => true,
            ],
            [
                'component' => 'NULL',
                'type' => 'link',
                'link' => 'https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css',
            ],

        ];
        return $var;
    }

    static public function create(){
        return new SummernoteDependencies();
    }
}
