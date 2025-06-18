<?php

//use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default values for layout blade
    |--------------------------------------------------------------------------
    |
    */

    'borderStyle' => [
        'default' => ['border' => 'shadow'],
        //'default' => ['border' => 'border'],
        'docStyle' => ['border' => 'border'],
    /*
    * Options ========================================================
        'default' => ['border' => 'rounded'],
        'default' => ['border' => 'shadow'],
        'default' => ['border' => 'border'],
        'default' => ['border' => 'none'],
    * ================================================================
    */
    ],

    'defaultconfig' => [
        'bootstrapcss' => 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous',
        'pooperjs' => 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous',
        //'bootstrapjs' => 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous',
        'bootstrapjs' => 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">',
        'jquery' => 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js',
        'transparentTheme' => true,
    ],

    'sideBarstyle' => 'light', //options: dark, light
    //'contentClass' => 'container-fluid',

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
