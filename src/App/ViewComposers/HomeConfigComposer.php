<?php
namespace App\ViewComposers;

use Illuminate\View\View;
use laraflex\ViewHelpers\Util;
use App\ViewListeners\DependenciesListener;
use App\ViewPresenters\NavBarDefaultPresenter;
use App\ViewPresenters\VerticalNavBarPresenter;
use App\ViewPresenters\ImagePanelPresenter;
use App\ViewPresenters\CarouselPresenter;
use App\ViewPresenters\SimpleFooterPresenter;
use App\ViewPresenters\BlogcardsExemplePresenter;
use Illuminate\Support\Facades\Auth;


class HomeConfigComposer
{
    protected $util;
    protected $secure;

    public function __construct()
    {
        $this->secure = false;
        $this->util = new Util($this->secure);
    }

    protected function toArray()
    {
        $borderStyle = config('laraflex.borderStyle.default');

        $var = [
            'title' => 'LaraFlex - View components and view pattern',
            //'contentClass' => 'container-fluid',
            //'onePage' => true,
            'bgStyle' => $borderStyle,
            'meta' => [
                ['name' => 'keywords', 'content' => 'laravel, desenvolvimento web, php'],
                ['name' => 'author', 'content' => 'Dimas Vidal'],
            ],
            'dependencies' => NULL,
            'components' => [
                BlogcardsExemplePresenter::create()->toArray(),
            ],
            'headerComponents' => [
                NavBarDefaultPresenter::create()->toArray(NULL, ['page' => 'home']),
                ImagePanelPresenter::create()->toArray(),
            ],
            'footerComponents' => [
                SimpleFooterPresenter::create()->toArray(),
            ],
        ];
        return $var;
    }
    /**
     * The border property sets the border types of the component.
     * As opções são: shadow, rounded, border e none.
     */

    public function compose(View $view)
    {
        $defaultConfig['jquery'] = config('laraflex.defaultconfig.jquery');
        $defaultConfig['pooperjs'] = config('laraflex.defaultconfig.pooperjs');
        $defaultConfig['bootstrapjs'] = config('laraflex.defaultconfig.bootstrapjs');
        $defaultConfig['bootstrapcss'] = config('laraflex.defaultconfig.bootstrapcss');
        //--------------------------------------------------------------//
        $dependencies = DependenciesListener::create();
        $jsonTmp = json_encode($this->toArray());
        $objeto = json_decode($jsonTmp);
        if(Auth::check()){
            $user = Auth::user();
            $view->with('objectConfig', $objeto)->with('defaultConfig', $defaultConfig)->with('util', $this->util)->with('user', $user)->with('objectListener', $dependencies);
        }else{
            $view->with('objectConfig', $objeto)->with('defaultConfig', $defaultConfig)->with('util', $this->util)->with('objectListener', $dependencies);
        }
    }
}

/**
 * Important: all ViewComposer classes must be registered with provider ComposerServiceProvider.
 */
