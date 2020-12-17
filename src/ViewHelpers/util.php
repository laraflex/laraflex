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

    static public function create(){
        return new Util();
    }

    public function domain () {
        $app_secure_url = env('APP_SECURE_URL');
        if ($this->secure && !empty($app_secure_url)){
            return $app_secure_url;
        }else{
            return env('APP_URL');
        }
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

    public function toImage($path,$image = NULL){
        return $this->toMedia($path,$image);
    }


    public function toMovie($path,$movie = NULL){
        return $this->toMedia($path,$movie);
    }

    public function toMedia($path, $media = NULL)
    {
        $numChar = strlen($path);
        $x = $numChar - 1;
        $char = substr($path, $x, $numChar);
        if ($char == '/') {
            $path = substr($path, 0, $x);
        }
        if (!empty($media)){
            $path = $path . '/' . $media;
        }
        if ($this->secure){
            return secure_url($path);
        }else{
            return url($path);
        }
    }

    public function toPath($path,$file = NUll){
        return $this->toMedia($path,$file);
    }

    function textEncode($str, $limit = 30){
        $arrayTmp = explode(" ", $str);
        $count = 0;
        $strTmp = "";
        foreach ($arrayTmp as $key => $value) {
            $count += strlen($value);
            if ($count <= $limit){
               $strTmp .= " " . $value;
            }
        }
        return ltrim($strTmp) . " ...";
    }

    public function toStyleBorder($border)
    {
        $style = '';
        if ($border == 'shadow') {
            $style .= 'border rounded shadow';
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

    public function socialNetworkUrl($socialNetework, $url){
        if (strtolower($socialNetework) == 'facebook'){
            if (stripos($url, 'https://www.facebook.com/') === false){
                $url = str_replace('#', '', $url);
                $url = str_replace('@', '', $url);
                return 'https://www.facebook.com/' . $url;
            }else{
                $url = str_replace('#', '', $url);
                $url = str_replace('@', '', $url);
                return $url;
            }
        }elseif (strtolower($socialNetework) == 'instagram'){
            if (stripos($url, 'https://www.instagram.com/') === false){
                $url = str_replace('#', '', $url);
                $url = str_replace('@', '', $url);
                return 'https://www.instagram.com/' . $url;
            }else{
                $url = str_replace('#', '', $url);
                $url = str_replace('@', '', $url);
                return $url;
            }
        }elseif (strtolower($socialNetework) == 'twitter'){
            if (stripos($url, 'https://twitter.com/') === false){

                $url = str_replace('#', '', $url);
                $url = str_replace('@', '', $url);

                return 'https://twitter.com/' . $url;
            }else{
                $url = str_replace('#', '', $url);
                $url = str_replace('@', '', $url);
                return $url;
            }

        }elseif (strtolower($socialNetework) == 'pinterest'){
            if (stripos($url, 'https://br.pinterest.com/') === false){

                $url = str_replace('#', '', $url);
                $url = str_replace('@', '', $url);

                return 'https://br.pinterest.com/' . $url;
            }else{
                $url = str_replace('#', '', $url);
                $url = str_replace('@', '', $url);
                return $url;
            }
        }elseif (strtolower($socialNetework) == 'youtube'){
            if (stripos($url, 'https://www.youtube.com/') === false){

                $url = str_replace('#', '', $url);
                $url = str_replace('@', '', $url);

                return 'https://www.youtube.com/' . $url;
            }else{
                $url = str_replace('#', '', $url);
                $url = str_replace('@', '', $url);
                return $url;
            }

        }else{
            return '';
        }

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

    function randomCode($tamanho = 13, $numeros = true, $maiusculas = false, $simbolos = false)
    {
        //$lmin = 'abcdefghijklmnopqrstuvwxyz';
        $lmai = 'ABCDEFGHJKLMNOPQRSTUVWXYZ';
        $num = '1234567890';
        $simb = '!@#$%*-';
        $retorno = '';
        $caracteres = '';
        //$caracteres .= $lmin;
        if ($numeros) $caracteres .= $num;
        if ($maiusculas) $caracteres .= $lmai;
        if ($simbolos) $caracteres .= $simb;
        $len = strlen($caracteres);
        for ($n = 1; $n <= $tamanho; $n++) {
            $rand = mt_rand(1, $len);
            $retorno .= $caracteres[$rand - 1];
        }
        return $retorno;
    }
    /**
     * Version 1.0
     */
}
