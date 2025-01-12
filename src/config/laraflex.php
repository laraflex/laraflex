<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default values for layout blade
    |--------------------------------------------------------------------------
    |
    */
    'defaultconfig' => [
        'bootstrapcss' => '"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"',
        'jquery' => '"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.slim.js" integrity="sha512-docBEeq28CCaXCXN7cINkyQs0pRszdQsVBFWUd+pLNlEk3LDlSDDtN7i1H+nTB8tshJPQHS0yu0GW9YGFd/CRg==" crossorigin="anonymous" referrerpolicy="no-referrer"',
        'pooperjs' => '"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"',
        'bootstrapjs' => '"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"',
    ],

    /*
    |--------------------------------------------------------------------------
    | Default values for Summernote
    |--------------------------------------------------------------------------
    |
    */
    'summernote' => [
        'imagePath' => 'local/images/posts',
        'width' => 1100,
        'extension' => 'webp',
        'quality' => NULL,
        'cdnjs' => 'https://cdnjs.cloudflare.com/ajax/libs/summernote/0.9.1/summernote-bs4.min.js',
        'cdncss' => 'https://cdnjs.cloudflare.com/ajax/libs/summernote/0.9.1/summernote-bs4.min.css',
    ],

];
