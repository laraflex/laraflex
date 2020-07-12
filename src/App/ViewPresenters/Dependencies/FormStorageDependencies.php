<?php
namespace App\ViewPresenters\Dependencies;

use laraflex\Contracts\Dependencies;

class FormStorageDependencies extends Dependencies
{
    public function toArray()
    {
        $var = [

            [
                'component' => 'validator',
                'type' => 'scriptjs',
                'formName' => 'formaddfile',
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

    static public function create(){
        return new FormStorageDependencies();
    }
}
