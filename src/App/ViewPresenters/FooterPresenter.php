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
            //'image' => 'logo-option1.png',
            'imagePath' => 'images/app/logo-option1.png',
            //'label' => 'Fale conosco',
            'route' => '#top',
            'bgColor' => 'marine',
            'bgImagePath' => 'images/components/imagepanel17.jpg',
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

            'socialNetworks' => [
                'iconColor' => 'white',
                'facebook' => 'https://www.facebook.com/dimas.f.vidal',
                'twitter' => 'https://twitter.com/@dimasvidal1',
                'instagram' => 'https://www.instagram.com/dimasfvidal/',
                'pinterest'  => 'https://br.pinterest.com/dimas0808/',
                'youtube' => 'https://www.youtube.com/channel/UCR2L1nIch00QW6PQFkUlcTQ?view_as=public',
            ],
        ];
        return $var;
    }

    public static function create()
    {
        return new FooterPresenter();
    }
}
