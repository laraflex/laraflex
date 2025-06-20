<?php
namespace laraflex\ViewHelpers\Dependencies;

use laraflex\Contracts\Dependencies;
use Illuminate\Support\Facades\Config;

class SummernoteDependencies extends Dependencies
{
    public function toArray($data = NULL, array $config = NULL)
    {
        $valueJs = config('laraflex.summernote.cdnjs');
        $valueCss = config('laraflex.summernote.cdncss');
        //$valueJquery = config('laraflex.defaultconfig.jquery');

        $var = [
            [
                'component' => NULL,
                'type' => 'scriptjs',
                'lib' => config('laraflex.defaultconfig.jquery'),
            ],
            [
                'component' => 'summernotejs',
                'type' => 'scriptjs',
                'lib' => $valueJs,
                'insertImage' => true,
            ],
            [
                'component' => 'NULL',
                'type' => 'link',
                'link' => $valueCss,
            ],
        ];
        return $var;
    }


    static public function create(){
        return new SummernoteDependencies();
    }
}
