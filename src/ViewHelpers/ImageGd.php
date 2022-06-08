<?php
namespace laraflex\ViewHelpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ImageGd{
        
        /**
         * Retorna uma imagem redimencionada de forma proporcional
         * @param $source - Um arquivo de imagem válida ou uma instancia de image GD2.
         * @param $resizeWidth - Determina a largura para imagem (integer).
         * @param $resizeHeight - Opcional - Determina a altura para a imagem (integer).
         */

        public function resizeImage($source, $resizeWidth = 700, $resizeHeight = NULL){
            $imagem = imagecreatefromjpeg($source);
            // Cria duas variáveis com a largura e altura da imagem
            list( $widthx, $heighty ) = getimagesize( $source );


            //$widthx = imagesx($source);
            //$heighty = imagesy($source);
            if ($widthx <= $resizeWidth){
                return $source;
            }
            if ($resizeHeight == NULL){
                $percent = $resizeWidth/$widthx;
                $resizeHeight = intval($heighty * $percent);
            }
            $imgResized = imagecreatetruecolor($resizeWidth, $resizeHeight);
            imagecopyresized($imgResized, $imagem, 0, 0, 0, 0, $resizeWidth, $resizeHeight, $widthx, $heighty);
            return $imgResized;
        }

        static public function create(){
            return new ImageGd();
        }

}