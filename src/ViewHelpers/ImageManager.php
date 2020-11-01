<?php
namespace laraflex\ViewHelpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ImageManager{
        protected $fileName = NULL;

        public function __construct($fileName = NULL){
            if (!empty($fileName)){
                $this->fileName = $fileName;
            }
        }

        /**
         * Método destinado a gerar um arquivo temporário a partir de imagem base64.
         * Mantem o tipo MIME original depois da conversão da base64.
         * Envia o arquivo temporário para a conversão para webp.
         * @param $base64ImageString - Imagem codificada em base64 com cabeçalho.
         * @param $pathFile - Diretório público onde imagens serão gravadas.
         * @class ImageManager
         */
        public function base64ResizeAndConvert($base64ImageString, $pathFile = 'local/images/posts', $width = 800, $typeNewFile = 'webp'){
            return base64ImageTemporaryToSave($base64ImageString, $pathFile, $width, $typeNewFile);
        }

        public function base64ImageTemporaryToSave($base64ImageString, $pathFile = 'local/images/posts', $width = 700, $typeNewFile = 'webp') {
            $splited = explode(',', substr( $base64ImageString , 5 ) , 2);
            $mime=$splited[0];
            $data=$splited[1];
            $mime_split_without_base64=explode(';', $mime,2);
            $mime_split=explode('/', $mime_split_without_base64[0],2);
            if(count($mime_split)==2)
            {
                $extension=$mime_split[1];
                if($extension=='jpeg'){
                    $extension='jpg';
                }
                if (!is_dir('local/images/tmp')){
                    mkdir('local/images/tmp', 0700);
                }
                $TmpPathFile = 'local/images/tmp/tmp.'.$extension;
            }
            file_put_contents( $TmpPathFile, base64_decode($data));
            $imgCompress = $this->saveImageConvert($TmpPathFile, $pathFile, $width, $typeNewFile);
            unlink($TmpPathFile); // Apaga arquivo temporário.
            return $imgCompress;
        }

        /**
         * Método destinado a converter e salvar o arquivo em um diretório público.
         * Por padrão, o arquivo será convertido para webp.
         * Elimina metadados originais do arquivo.
         * @param $sourece - Arquivo de imagem válido ou uma instancia de image GD2.
         * @param $destination - Diretório de destino.
         */

        public function saveImageConvert($source, $destination, $width = 700, $type = 'webp', $quality = NULL) {

            $info = getimagesize($source);

            if ($info['mime'] == 'image/jpeg'){
                $image = imagecreatefromjpeg($source);
            }elseif ($info['mime'] == 'image/gif'){
                $image = imagecreatefromgif($source);
            }elseif ($info['mime'] == 'image/png'){
                $image = imagecreatefrompng($source);
            }elseif ($info['mime'] == 'image/webp'){
                $image = imagecreatefromwebp($source);
            }elseif ($info['mime'] == 'image/bmp'){
                $image = imagecreatefrombmp($source);
            }elseif ($info['mime'] == 'image/xbm'){
                $image = imagecreatefromxbm($source);
            }elseif ($info['mime'] == 'image/bpm'){
                $image = imagecreatefrombpm($source);
            }else{
                return false;
            }
            $extension = strtolower($type);
            $arrayType = array('webp', 'png', 'jpeg', 'gif', 'jpg');
            if (!in_array($type, $arrayType)){
                $type = 'webp';
            }elseif($type == 'jpg'){
                $type = 'jpeg';
                $extension = 'jpg';
            }

            if (!empty($this->fileName)){
                $fileName = $this->fileName .'.'. $extension;
            }else{
                $fileName = 'img' . Str::random(13) . '.' . $extension;
            }


            // Precisa de inclusão de use Illuminate\Support\Str;
            if ($destination == NULL){
                if (!is_dir('local/images/tmp')){
                    mkdir('local/images/tmp');
                }
                $pathFile = 'local/images/tmp/tmp.img';
            }else{
                $destination = $string = Str::of($destination)->rtrim('/');
                if (!is_dir($destination)){
                    mkdir($destination, 0700);
                }
                $pathFile = $destination . '/' . $fileName;
            }
            $image = $this->resizeImage($image, $width);
            // Salva a imagem com o método de gd2.
            $imageMethod = 'image' . strtolower($type);
            // --------------------------------------------------
            // Controle temporário de sistema de arquivo
            //---------------------------------------------------
            if (!empty($quality)){
                $imageMethod($image, $pathFile, $quality);
            }else{
                $imageMethod($image, $pathFile);
            }
            return $pathFile;
        }

        /**
         * Retorna uma imagem redimencionada de forma proporcional
         * @param $source - Um arquivo de imagem válida ou uma instancia de image GD2.
         * @param $resizeWidth - Determina a largura para imagem (integer).
         * @param $resizeHeight - Opcional - Determina a altura para a imagem (integer).
         */

        public function resizeImage($source, $resizeWidth = 700, $resizeHeight = NULL){
            $widthx = imagesx($source);
            $heighty = imagesy($source);
            if ($widthx <= $resizeWidth){
                return $source;
            }
            if ($resizeHeight == NULL){
                $percent = $resizeWidth/$widthx;
                $resizeHeight = intval($heighty * $percent);
            }
            $imgResized = imagecreatetruecolor($resizeWidth, $resizeHeight);
            imagecopyresized($imgResized, $source, 0, 0, 0, 0, $resizeWidth, $resizeHeight, $widthx, $heighty);
            return $imgResized;
        }

        /**
         * Método destinado ao redimencionamento de imagens em porcentagem.
         * @param $source - Um arquivo de imagem válida.abnf
         * @param $percent - Um valoe inteiro sem o simbole % - Valor padrão: 50%
         */

        public function resizePercent($source, $percent = NULL){
            $width = imagesx($source);
            $height = imagesy($source);

            If (!empty($percent) && is_integer($percent)){
                $percent = $percent/100;
            }else{
                $percent = 0.5;
            }
            $widthResezed = intval($width * $percent);
            $heightResized = intval($height * $percent);
            $imgResized = imagecreatetruecolor($widthResezed, $heightResized);
            imagecopyresized($imgResized, $source, 0, 0, 0, 0, $widthResezed, $heightResized, $width, $height);
            return $imgResized;
        }

        public function Resize($imageFile, $width = 700, $quality = NULL){
            $image = $imageFile->path();
            $info = getimagesize($imageFile);
            if ($info['mime'] == 'image/png'){
                $extension = 'png';
            }elseif ($info['mime'] == 'image/jpeg'){
                $extension = 'jpg';
            }elseif ($info['mime'] == 'image/gif'){
                $extension = 'gif';
            }elseif ($info['mime'] == 'image/webp'){
                $extension = 'webp';
            }elseif ($info['mime'] == 'image/bmp'){
                $extension = 'bmp';
            }elseif ($info['mime'] == 'image/xbm'){
                $extension = 'xbm';
            }elseif ($info['mime'] == 'image/bpm'){
                $extension = 'bmp';
            }else{
                return false;
            }
            $tmpPathFile = 'local/images/tmp/';
            $fileName = $tmpPathFile . 'tmp.tmp';
            if (move_uploaded_file($image, $fileName)){
                $type = $extension;
                $imgResized = $this->saveImageConvert($fileName, NULL, $width, $type, $quality);
            }else{
                return false;
            }
            unlink($fileName);
            return $imgResized;
        }

        public function ResizeAndConvert($imageFile, $width = 700, $type = 'webp', $quality = NULL){
            $image = $imageFile->path();
            $tmpPathFile = 'local/images/tmp/';
            $fileName = $tmpPathFile . 'tmp.tmp';
            if (move_uploaded_file($image, $fileName)){
                $imgResized = $this->saveImageConvert($fileName, NULL, $width, $type, $quality);
            }else{
                return false;
            }
            unlink($fileName);
            return $imgResized;
        }

        static public function create($fileName = NULL){
            return new ImageManager($fileName);
        }
}
