<?php

namespace laraflex\ViewHelpers;

use Illuminate\Support\Str;

class Util
{
    protected $secure;
    /*
Destinada a preparar um link com o path e o complemento.
Retira a barra no final da propriedade route, caso tenha sido colocado.
*/
    public function __construct($secure = false)
    {
        $this->secure = $secure;
    }


    public function toRoute($route, $link = NULL)
    {
        $numChar = strlen($route);
        $x = $numChar - 1;
        $char = substr($route, $x, $numChar);
        if ($char == '/') {
            $route = substr($route, 0, $x);
        }
        if (!empty($link)){
            $route = $route . '/' . $link;
        }
        if ($this->secure){
            return secure_url($route);
        }else{
            return url($route);
        }
    }

    public function toImage($path,$image){
        return $this->toMedia($path,$image);
    }

    public function toMovie($path,$movie){
        return $this->toMedia($path,$movie);
    }

    public function toMedia($path, $media)
    {
        $numChar = strlen($path);
        $x = $numChar - 1;
        $char = substr($path, $x, $numChar);
        if ($char == '/') {
            $path = substr($path, 0, $x);
        }
        return url($path . '/' . $media);
    }

    public function toPath($path,$file){
        return $this->toMedia($path,$file);
    }

    public function toStyleBorder($border)
    {
        $style = '';
        if ($border == 'shadow') {
            $style .= 'border rounded shadow bg-white';
        } elseif ($border == 'rounded') {
            $style .= 'border rounded';
        } elseif ($border == 'border') {
            $style .= 'border';
        }

        return $style;
    }

    public function slug($str, $parameter){
        return Str::slug($str, $parameter);
    }

    /**
     * Função para gerar senhas aleatórias
     *
     * @author    Thiago Belem <contato@thiagobelem.net>
     *
     * @param integer $tamanho Tamanho da senha a ser gerada
     * @param boolean $maiusculas Se terá letras maiúsculas
     * @param boolean $numeros Se terá números
     * @param boolean $simbolos Se terá símbolos
     *
     * @return string A senha gerada
     */
    function toCode($tamanho = 5, $maiusculas = true, $numeros = true, $simbolos = false)
    {
        //$lmin = 'abcdefghijklmnopqrstuvwxyz';
        $lmai = 'ABCDEFGHJKLMNOPQRSTUVWXYZ';
        $num = '1234567890';
        $simb = '!@#$%*-';
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
}
