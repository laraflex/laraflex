<?php
namespace App\ViewPresenters\Scripts;

use laraflex\Contracts\Presenter;

class MaskCadastroJsPresenter extends Presenter
{
    public function toArray ($data = NULL)
    {
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

    public static function create()
    {
        return new MaskCadastroJsPresenter();
    }
}

