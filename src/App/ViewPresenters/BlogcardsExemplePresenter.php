<?php
namespace App\ViewPresenters;

use laraflex\Contracts\Presenter;

class BlogcardsExemplePresenter extends Presenter
{
    public function toArray($data = NULL)
    {
        $artigos = [
            [
                'id' => 8,
                'image' => 'img08.jpg',
                'title' => 'Visão geral do pacote Laraflex',
                'date' => '03/10/2015',
                'content' => 'The Passport service provider registers its own database migration directory with the framework, so you should migrate your database after installing the package. The Passport migrations will create the tables your application needs to store clients and access tokens: Next',
            ],
            [
                'id' => 7,
                'image' => 'img07.jpg',
                'title' => 'Bootstrap no Laravel',
                'date' => '15/02/2017',
                'content' => 'The Passport service provider registers its own database migration directory with the framework, so you should migrate your database after installing the package. The Passport migrations will create the tables your application needs to store clients and access tokens: Next',
            ],
            [
                'id' => 6,
                'image' => 'img06.jpg',
                'title' => 'Configurando o Migrate do Passaport',
                'date' => '15/02/2017',
                'content' => 'The Passport service provider registers its own database migration directory with the framework, so you should migrate your database after installing the package. The Passport migrations will create the tables your application needs to store clients and access tokens: Next',
            ],
            [
                'id' => 5,
                'image' => 'img05.jpg',
                'title' => 'O potencial do Passaport do Laravel',
                'date' => '10/08/2005',
                'content' => 'The Passport service provider registers its own database migration directory with the framework, so you should migrate your database after installing the package. The Passport migrations will create the tables your application needs to store clients and access tokens: Next',
            ],
            [
                'id' => 4,
                'image' => 'img04.jpg',
                'title' => 'Quarto artigo publicado',
                'date' => '25/05/2018',
                'content' => 'The Passport service provider registers its own database migration directory with the framework, so you should migrate your database after installing the package. The Passport migrations will create the tables your application needs to store clients and access tokens: Next',
            ],
            [
                'id' => 3,
                'image' => 'img03.jpg',
                'title' => 'Documentação resumida',
                'date' => '25/05/2018',
                'content' => 'The Passport service provider registers its own database migration directory with the framework, so you should migrate your database after installing the package. The Passport migrations will create the tables your application needs to store clients and access tokens: Next',
            ],
        ];


        $var = [
            'component' => 'blogcards',
                'type' => 'content',
                'title' => 'Últimas postagens no blog',
                'showItems' => ['image', 'title', 'date', 'abstract'],
                //'route' =>'artigo/show',
                //'readMore' => ['label' => 'Acesse todas as postagens do blog', 'route' => '#'],
                'imagePath' => 'images/posts',
                'items' => $artigos,

        ];
        return $var;
    }

    public static function create()
    {
        return new BlogcardsExemplePresenter();
    }
}
