<?php
namespace App\ViewPresenters;

use laraflex\Contracts\Presenter;

class FooterPresenter extends Presenter
{
    public function toArray($data = NULL)
    {
        $var = [
            'component' => 'footer',
            'type' => 'footer',
            'items' => [
                'Laraflex' => [
                    [
                        'label' => 'Templates',
                        'route' => '#',
                    ],
                    [
                        'label' => 'Components',
                        'route' => '#',
                    ],
                    [
                        'label' => 'Courses',
                        'route' => '#',
                    ],
                    [
                        'label' => 'Books',
                        'route' => '#',
                    ],

                ],
                'Community' => [
                    [
                        'label' => 'Forun',
                        'route' => '#',
                    ],
                    [
                        'label' => 'Members',
                        'route' => '#',
                    ],
                    [
                        'label' => 'Articles',
                        'route' => '#',
                    ],

                ],
                'Attendance' => [
                    [
                        'label' => 'Help Center',
                        'route' => '#',
                    ],
                    [
                        'label' => 'Contact us',
                        'route' => '#',
                    ],
                    [
                        'label' => 'Documentation',
                        'route' => '#',
                    ],
                    [
                        'label' => 'Posts',
                        'route' => '#',
                    ],
                ],
            ],
        ];
        return $var;
    }

    public static function create()
    {
        return new FooterPresenter();
    }
}
