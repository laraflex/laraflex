<?php
namespace laraflex\Tools;

class CodeGenerator{

    static public function randomCode($tamanho = 5, $maiusculas = true, $numeros = true, $simbolos = true)
    {
        //$lmin = 'abcdefghijklmnopqrstuvwxyz';
        $lmai = 'ABCDEFGHJKLMNOPQRSTUVWXYZ';
        $num = '1234567890';
        $simb = '#$%*#$%*';
        $retorno = '';
        $caracteres = '';
        //$caracteres .= $lmin;
        if ($maiusculas) $caracteres .= $lmai;
        if ($numeros) $caracteres .= $num;
        if ($simbolos) $caracteres .= $simb;
        $len = strlen($caracteres);
        for ($n = 1; $n <= $tamanho; $n++) {
            $rand = mt_rand(1, $len);
            $retorno .= $caracteres[$rand - 1];
        }
        return $retorno;
    }

    static public function create()
    {
        return new CodeGenerator();
    }

    static public function codeEAN($digitos = 13){

        $num = '1234567890';
        $code = '';
        $caracteres = '';
        $len = strlen($num);
        for ($n = 1; $n <= $digitos; $n++) {
            $rand = mt_rand(1, $len);
            $code .= $caracteres[$rand - 1];
        }
        return $code;
    }
}
