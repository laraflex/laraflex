<?php
namespace App\ViewPresenters\Dependencies;

use laraflex\Contracts\Dependencies;
use Illuminate\Support\Facades\Config;

class SummernoteDependencies extends Dependencies
{
    public function toArray($data = NULL, array $config = NULL)
    {
        $valueJs = config('laraflex.summernote.cdnjs');
        $valueCss = config('laraflex.summernote.cdncss');

        $var = [
            [
                'component' => 'summernotejs',
                'type' => 'scriptjs',
                'lib' => $valueJs,
                //'lib' => 'https://cdnjs.cloudflare.com/ajax/libs/summernote/0.9.1/summernote-bs4.min.js',
                'insertImage' => true,
            ],
            [
                'component' => 'NULL',
                'type' => 'link',
                'link' => $valueCss,
                //'link' => 'https://cdnjs.cloudflare.com/ajax/libs/summernote/0.9.1/summernote-bs4.min.css',
            ],

        ];
        return $var;
    }

    static public function create(){
        return new SummernoteDependencies();
    }
}
