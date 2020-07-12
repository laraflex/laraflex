<?php
namespace laraflex\ViewHelpers;

use laraflex\ViewHelpers\Util;
use laraflex\ViewHelpers\ImageManager;

class CodeEditor{

    protected $path;
    protected $width;
    protected $mimeType;

    public function __construct($arrayConfig = array()){
        $atributes = ['path', 'width', 'mimeType'];
        $this->path = 'images/posts';
        $this->width = 700;
        $this->mimeType = 'webp';
        if(!empty($arrayConfig)){
            foreach ($arrayConfig as $key => $value){
                if (in_array($key, $atribute)){
                    $thi->$key = $value;
                }
            }
        }
    }

    public function editorEncode($str)
    {
        $tmp = ['<?php', '<?', '?>', '<script',  '<script>', '</scrip'];
        foreach ($tmp as $key => $value) {
            $str = str_ireplace($value, htmlentities($value), $str);
        }
        $str = $this->EditorConvertImageBase64($str);
        $str = addslashes($str);
        $str = str_ireplace('@code', '<div class=\"border rounded mr-0 mr-lg-4 px-3 px-lg-4 bg-light\" style=\"overflow:auto;\"><pre>', $str);
        $str = str_ireplace('@endcode', '</pre></div>', $str);
        $str = str_replace('@', '(@)', $str);
        return $str;
    }

    public function editorDecode($str){
        $str = stripslashes($str);
        return $str;
    }

    public function textEncode($str){
        $tmp = ['<?php', '<?', '?>', '<script',  '<script>', '</scrip'];
        foreach ($tmp as $key => $value) {
            $str = str_ireplace($value, htmlentities($value), $str);
        }
        $str = str_replace('@', '(@)', $str);
        $str = addslashes($str);
        $str = str_ireplace("@code", "<div class=\"border rounded mr-0 mt-3 mb-3 pl-2 pt-3 pr-2 pb-0 bg-light overflow-auto\"><div style=\"font-family:courier\"><pre class=\"m-0 pb-3\">", $str);
        $str = str_ireplace("@endcode", "</pre></div></div>", $str);
        return $str;
    }

    public function textDecode($str){
        $str = stripslashes($str);
        return $str;
    }

    public function dataDecode($str)
    {
        return stripslashes($str);
    }

    /**
     * Método destinado a varrer um texto oriundo de editor na busca de imagens base64.
     * Se identificado arquivo válido solicita a substituição do arquivo para oureo formato.
     * Faz uso dos métodos replaceBase64Image e replaceBase64ToSubstitute para isso.
     * @param $str - Texto proveniente de editor web
     * @param $typeNewFile - tipo Mime (extenção) para o novo arquivo.
     */

    public function EditorConvertImageBase64($str){
        $pngHead = '<img src="data:image/png;base64';
        $jpegHead = '<img src="data:image/jpeg;base64';
        $webpHead = '<img src="data:image/webp;base64';
        $bmpHead = '<img src="data:image/bmp;base64';
        $tiffHead = '<img src="data:image/tiff;base64';
        $header = compact('pngHead','jpegHead', 'webpHead', 'bmpHead', 'tiffHead');
        foreach ($header as $imageHeader){
            $count = substr_count($str, $imageHeader);
            if ($count >= 1){
                for($x = 1; $x <= $count; $x++){
                    $str = $this->replaceBase64Image($str, $imageHeader);
                }
            }
        }
        $tiffHeade = '<img src="data:image/tiff;base64';
        $gifHeade = '<img src="data:image/gif;base64';
        $iconHeade = '<img src="data:image/x-icon;base64';
        $svgHeade = '<img src="data:image/svg+xml;base64';
        $pipfHeade = '<img src="data:image/pip;base64';
        $pjpegHeade = '<img src="data:image/pjpeg;base64';
        $jfifHeade = '<img src="data:image/jfif;base64';
        $xbmHeade = '<img src="data:image/xbm;base64';
        $dibHeade = '<img src="data:image/dib;base64';
        $headReplaced = compact('tiffHeade', 'gifHeade', 'iconHeade', 'svgHeade', 'pipfHeade', 'pjpegHeade', 'jfifHeade', 'xbmHeade', 'dibHeade');
        foreach ($headReplaced as $imageHeader){
            $count = substr_count($str, $imageHeader);
            if ($count >= 1){
                for($x = 1; $x <= $count; $x++){
                    $str = $this->replaceBase64ToSubstitute($str, $imageHeader);
                }
            }
        }
        return $str;
    }

    /**
     * Método destinado a verificar, preparar e substituir uma imagem codificada em base64 por outro formato,
     * de um texto proveniente de um editor web. A substituiçãi é realizada na primeira imagem encontrada.
     * @param $str - Texto a ser verificado da necessidade da substituição.
     * @param $imageHeader - Cabeçalho dos tipos de imagens base64 a serem substituidas.
     * @class CodeEditor
     */

    private function replaceBase64Image($str, $imageHeader = '<img src="data:image/jpeg;base64'){
        $posInicial = stripos($str, $imageHeader);
        $posFinal = stripos($str, '>', $posInicial);
        $tamanho = $posFinal - $posInicial;
        $subStr = substr($str, $posInicial, $tamanho + 1);
        $posSec = stripos($str, 'data-filename', $posInicial);
        $tamanhoSec = $posSec - $posInicial - 32;
        $strImage = substr($str, $posInicial + 32, $tamanhoSec - 3);
        $path = $this->path;
        $width = $this->width;
        $typeNewFile = $this->mimeType;
        $path = ImageManager::create()->base64ImageTemporaryToSave($subStr, $path, $width, $typeNewFile);
        $srcImage = '<img src="'. Util::create()->toImage($path) . '" style="max-width:80%">';
        $str = str_replace($subStr, $srcImage, $str);
        return $str;
    }

    /**
     * Método destinado a substituir imagens base64 para tipos Mime não válido.
     * Substitui por uma imagem padrão do diretório 'images/app/replaceimage.jpg'.
     * @param $str - Texto proveniente de editor web.
     * @param $imageHeader - Tipos Mime inválidos.
     */

    private Function replaceBase64ToSubstitute($str, $imageHeader){
        $posInicial = stripos($str, $imageHeader);
        $posFinal = stripos($str, '>', $posInicial);
        $tamanho = $posFinal - $posInicial;
        $subStr = substr($str, $posInicial, $tamanho + 1);
        $path = 'images/app/replaceimage.jpg';
        $srcImage = '<img src="'. Util::create()->toImage($path) . '" style="max-width:80%">';
        $str = str_replace($subStr, $srcImage, $str);
        return $str;
    }

    static public function create($imageConfig = array()){
        return new CodeEditor($imageConfig);
    }

}
