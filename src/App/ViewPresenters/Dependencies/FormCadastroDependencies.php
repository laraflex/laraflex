<?php
namespace App\ViewPresenters\Dependencies;

use laraflex\Contracts\Dependencies;

class FormCadastroDependencies extends Dependencies
{
    public function toArray($data = NULL, array $config = NULL)
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
            // Exemplo não aplicado --------------------------------
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
            // Primeiro item --------------------------------
            [
            'fieldName' => 'nome',

                'rules'  =>[
                    [
                        'attribute' => 'required',
                        'value' => 'true',
                        'message' => 'O campo nome deve ser preenchido',
                    ],
                    [
                        'attribute' => 'minlength',
                        'value' => 10,
                        'message' => 'Este campo exige o mínimo de 10 caracteres',
                    ],
                ],
            ],
            // Segundo item --------------------------------
            [
            'fieldName' => 'email',
                'rules'  => [
                    [
                        'attribute' => 'required',
                        'value' => true,
                        'message' => 'O campo email deve ser preenchido',
                    ],
                    [
                        'attribute' => 'email',
                        'value' => true,
                        'message' => 'Você deve preencher com um email válido.',
                    ],
                ],
            ],
            // Terceiro item --------------------------------
            [
            'fieldName' => 'endereco',
                'rules'  => [
                    [
                        'attribute' => 'required',
                        'value' => 'true',
                        'message' => 'O campo nome endereço ser preenchido',
                    ],
                    [
                        'attribute' => 'minlength',
                        'value' => 10,
                        'message' => 'Este campo exige o mínimo de 10 caracteres',
                    ],
                ],

            ],
            // Quarto item --------------------------------
            [
            'fieldName' => 'cpf',
                'rules'  => [
                    [
                        'attribute' => 'required',
                        'value' => 'true',
                        'message' => 'O campo cpf deve ser preenchido',
                    ],

                ],

            ],
            // Quinto item --------------------------------
            [
            'fieldName' => 'descricao',
                'rules'  => [
                    [
                        'attribute' => 'required',
                        'value' => 'true',
                        'message' => 'O campo descrição deve ser preenchido',
                    ],
                    [
                        'attribute' => 'minlength',
                        'value' => 10,
                        'message' => 'Este campo exige o mínimo de 10 caracteres',
                    ],

                ],

            ],
            // Sexto item --------------------------------
            [
            'fieldName' => 'aceite',
                'rules'  => [
                    [
                        'attribute' => 'required',
                        'value' => 'true',
                        'message' => 'Você deve aceitar os termos de contrato',
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
