<?php
namespace laraflex\ViewHelpers;

Trait CodeEditor{

    public function editorEncode($str)
    {
        $tmp = ["<?php", "<?","?>", "<script", "</scrip"];
        foreach ($tmp as $key => $value) {
            $str = str_ireplace($value, htmlentities($value), $str);
        }
        $str = str_ireplace("@code", "<div class=\"border rounded mr-0 mr-lg-4 p-3 p-lg-4 bg-light\"> style=\"overflow:auto;\"><pre>", $str);
        $str = str_ireplace("@endcode", "</pre></div>", $str);
        return $str;
    }

    public function textEncode($str){
        $str = htmlentities($str);
        $str = str_ireplace("@code", "<div class=\"border rounded mr-0 mt-3 mb-3 pl-2 pt-3 pr-2 pb-0 bg-light overflow-auto\"><div style=\"font-family:courier\"><pre class=\"m-0 pb-3\">", $str);
        $str = str_ireplace("@endcode", "</pre></div></div>", $str);
        return $str;
    }

    public function textDecode($str){
        $code = '<div class="border rounded mr-0 mt-3 mb-3 pl-2 pt-3 pr-2 pb-0 bg-light overflow-auto"><div style="font-family:courier"><pre class="m-0 pb-3">';
        $endCode = '</pre></div></div>';
        $str = str_ireplace($code, "@code", $str) . '\n';
        $str = str_ireplace($endCode,"@endcode", $str) . '\n';
        $str = html_entity_decode($str, ENT_QUOTES);

        return $str;
    }

    public function dataDecode($str)
    {
        return stripslashes($str);
    }

}
