<?php
namespace App\ViewPresenters\Dependencies;

use laraflex\Contracts\Dependencies;

class FormCadastroDependencies extends Dependencies
{
    public function toArray()
    {
        $var = [
            [
                'component' => 'mask',
                'type' => 'scriptjs',
                'lib' => 'https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js',
                'items' => $this->itemsMask(),
            ],
            /*
            [
                'component' => 'validator',
                'type' => 'scriptjs',
                'formName' => 'formCadastro',
                'lib' => 'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js',
                'items' => $this->itemsValidator(),
            ],
            */
        ];
        return $var;
    }

    protected function itemsMask(){
        $var = [
            // Primeiro item --------------------------------
            [
                'fieldName' => 'data',
                'mask' => '00/00/0000',
            ],
            // Segundo item --------------------------------
            [
                'fieldName' => 'cpf',
                'mask' => '000.000.000-00',
                'option' => 'reverse: true',
            ],
            // Terceiro item --------------------------------
            [
                'fieldName' => 'salario',
                'mask' => '000.000.000.000.000,00',
                'option' => 'reverse: true',
            ],
            // Quarto item ---------------------------------
            [
                'fieldName' => 'ip-address',
                'mask' => '00X.0XX.0XX.0XX',
                'translation' => 'X: {pattern: /[0-9]/, optional:true}',
            ],

        ];
        return $var;
    }

    protected function itemsValidator(){
        $var = [
            // Primeiro item --------------------------------
            [
            'fieldName' => 'nome',
                'rules'  =>[
                    [
                        'type' => 'required',
                        'value' => 'true',
                        'message' => 'O campo nome deve ser preenchido',
                    ],
                    [
                        'type' => 'minlength',
                        'value' => 5,
                        'message' => 'Este campo exige o mínimo de 5 caracteres',
                    ],
                ],
            ],
            // Segundo item --------------------------------
            [
            'fieldName' => 'email',
                'rules'  => [
                    [
                        'type' => 'required',
                        'value' => 'true',
                        'message' => 'O campo email deve ser preenchido',
                    ],
                    [
                        'type' => 'minlength',
                        'value' => 10,
                        'message' => 'Este campo exige o mínimo de 10 caracteres',
                    ],
                ],
            ],
            // Terceiro item --------------------------------
            [
            'fieldName' => 'endereco',
                'rules'  => [
                    [
                        'type' => 'required',
                        'value' => 'true',
                        'message' => 'O campo nome deve ser preenchido',
                    ],
                ],

            ],
        ];

        return $var;
    }

    static public function create(){
        return new FormCadastroDependencies();
    }
}
