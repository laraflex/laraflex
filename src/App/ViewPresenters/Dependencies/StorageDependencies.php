<?php
namespace App\ViewPresenters\Dependencies;

use laraflex\Contracts\Dependencies;

class StorageDependencies extends Dependencies
{
    protected function itemsValidator(){
        $var = [
            // Primeiro item --------------------------------
            [
            'fieldName' => 'file',
                'rules'  =>[
                    [
                        'attribute' => 'extension',
                        'type' => 'string',
                        'value' => 'jpg|jpeg|png|pdf|doc|docx',
                        'message' => 'Este arquivo não é valido',
                    ],
                    [
                        'attribute' => 'required',
                        'value' => true,
                        'message' => 'Você deve selecionar um arquivo.'
                    ],
                ],
            ],
        ];

        return $var;
    }

    public function toArray()
    {
        $var = [
            [
                'component' => 'NULL',
                'type' => 'link',
                'link' => 'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css',
            ],
            [
                'component' => 'slideshowjs',
                'type' => 'scriptjs',
                'arrowColor' => true,
                'lib' =>  'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js',
            ],
            [
                'component' => 'storagejs',
                'type' => 'scriptjs',
            ],
            [
                'component' => 'validator',
                'type' => 'scriptjs',
                'formName' => 'addfile',
                'lib' => 'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js',
                'items' => $this->itemsValidator(),
            ],
            [
                'component' => NULL,
                'type' => 'scriptjs',
                'lib' => 'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js',
            ]

        ];
        return $var;
    }

    static public function create(){
        return new StorageDependencies();
    }
}
