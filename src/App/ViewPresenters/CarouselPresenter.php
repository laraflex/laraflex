<?php
namespace App\ViewPresenters;

use laraflex\Contracts\Presenter;
//use laraflex\ViewHelpers\AccessControl;
//use laraflex\ViewHelpers\ModelPaginate;

class CarouselPresenter extends Presenter
{
    //use AccessControl, ModelPaginate;
    public function toArray($data = NULL, array $config = NULL)
        {
            $var = [
                'component' => 'carousel',
                'type' => 'header',
                'imageStorage' => true,
                'fontColor' => '#FFFFFF',
                //'position' => 'right', // Options: right, left, center
                //'fontColor' => '#202020',
                //'fontColor' => 'dark', // ou #000000
                'images' => [
                    'local/images/app/imagepanel7.jpg',
                    'local/images/app/imagepanel8.jpg',
                    'local/images/app/imagepanel9.jpg'
                ],

                'titles' => [
                    'Laraflex 1: View components and view pattern',
                    'Laraflex 2: View components and view pattern',
                    'Laraflex 3: View components and view pattern',
                ],

                'legends' => [
                    'Set of standards and component libraries for creating and managing responsive and adaptive web pages for the Laravel framework..',
                    'O Blade é o mecanismo de templates simples, mas poderoso, fornecido com o Laravel.',
                    'As visualizações que estendem o layout do Blade podem injetar conteúdo nas seções do layout usando diretivas.',
                ],

                'routes' => [
                    'saibamais1',
                    'saibamais2',
                    'saibamais3',
                ],

                'button' => true,

            ];
            return $var;
        }

    public static function create()
    {
        return new CarouselPresenter();
    }
}

?>
