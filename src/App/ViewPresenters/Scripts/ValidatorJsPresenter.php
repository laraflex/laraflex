<?php
namespace App\ViewPresenters\Scripts;

use laraflex\Contracts\Presenter;

class ValidatorJsPresenter extends Presenter
{
    public function toArray ($data = NULL)
    {
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

    public static function create()
    {
        return new ValidatorJsPresenter();
    }
}
