<?php
namespace laraflex\Tools;

class EditorSupport{
    public function dataEncode($str)
    {
        $tmp = ["<?php", "<?","?>", "<script", "</scrip"];
        foreach ($tmp as $key => $value) {
            $str = str_ireplace($value, htmlentities($value), $str);
        }
        $str = str_ireplace("#code", "<div class=\"border rounded mr-0 mr-lg-4 p-3 p-lg-4 bg-light\"  style=\"overflow:auto;\">", $str);
        $str = str_ireplace("#endcode", "</div>", $str);

        $str = addslashes($str);
        return $str;
    }

    public function dataDecode($str)
    {
        return stripslashes($str);
    }



    static public function create()
    {
        return new EditorSupport();
    }
}
