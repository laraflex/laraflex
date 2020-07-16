<?php
namespace laraflex\ViewHelpers;

class CodeEditor{

    /**
     * Permite adicionar código php ou javascript formatado em texto
     * Codifica tags php e javascript em codigo html
     * Adiciona barras invertida para banco de dados.
     */

    public function textEncode($str){
        $tmp = ['<?php', '<?', '?>', '<script',  '<script>', '</scrip'];
        foreach ($tmp as $key => $value) {
            $str = str_ireplace($value, htmlentities($value), $str);
        }
        $str = addslashes($str);
        $str = str_ireplace("@code", "<div class=\"border rounded mr-0 mt-3 mb-3 pl-2 pt-3 pr-2 pb-0 bg-light overflow-auto\"><div style=\"font-family:courier\"><pre class=\"m-0 pb-3\">", $str);
        $str = str_ireplace("@endcode", "</pre></div></div>", $str);
        $str = str_replace('@', '(@)', $str);
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
