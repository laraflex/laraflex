<?php
namespace laraflex\ViewHelpers\Dependencies;

trait SummernoteDependencies
{
    public function dependencies()
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
}
