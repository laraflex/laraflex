<?php
namespace laraflex\ViewHelpers;

class CodeEditor{

    /**
     * Permite adicionar código php ou javascript formatado em texto
     * Codifica tags php e javascript em codigo html
     * Adiciona barras invertida para banco de dados.
     */

    public function textEncode($str){
        $str = strtr($str,'\\','');

        $tmp = ['<?php', '<?', '?>', '<script',  '<script>', '</scrip'];
        foreach ($tmp as $key => $value) {
            $str = str_ireplace($value, htmlentities($value), $str);
        }
        $str = addslashes($str);
        $str = str_ireplace("@code", "<div class=\"border rounded mr-0 mt-3 mb-3 pl-2 pt-3 pr-2 pb-0 bg-light overflow-auto\"><div style=\"font-family:courier;\"><pre class=\"m-0 pb-3\" style=\"line-height: 1.4;\">", $str);
        $str = str_ireplace("@endcode", "</pre></div></div><br/>", $str);
        $str = str_ireplace('[code]', '<div class=\"border rounded mr-0 mr-lg-3 ml-3 ml-lg-5 px-3 px-lg-4 bg-light\" style=\"overflow:auto; line-height: 1.1;\"><pre>', $str);
        $str = str_ireplace('[endcode]', '</pre></div><br/>', $str);
        $str = str_replace('(@)', '@', $str);
        $str = str_replace('@', '&#64;', $str);
        return $str;
    }

    public function textDecode($str){
        $str = stripslashes($str);
        return $str;
    }

    static public function create(){
        return new CodeEditor();
    }
}
