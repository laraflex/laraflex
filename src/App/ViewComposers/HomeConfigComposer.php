<?php
namespace App\ViewComposers;

use Illuminate\View\View;
use laraflex\ViewHelpers\Util;
use App\ViewPresenters\NavBarDefaultPresenter;
use App\ViewPresenters\VerticalNavBarPresenter;
use App\ViewPresenters\ImagePanelPresenter;
use App\ViewPresenters\CarouselPresenter;
use App\ViewPresenters\FooterPresenter;
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
        $var = [
            'title' => 'LaraFlex - View components and view pattern',
            'headerClass' => 'container-fluid',
            'headerColor' => 'black',
            'fixedmenu' => true,
            'integratedImage' => true,
            'bgStyle' => ['border' => 'shadow'],
            'meta' => [
                ['name' => 'keywords', 'content' => 'finanças, mercado financeiro, Bovespa'],
                ['name' => 'author', 'content' => 'Dimas Vidal'],
            ],
            'dependencies' => NULL,
            'components' => [
                BlogcardsExemplePresenter::create()->toArray(),
            ],
            'headerComponents' => [
                NavBarDefaultPresenter::create()->toArray(),
                ImagePanelPresenter::create()->toArray(),
            ],
            'footerComponents' => [
                FooterPresenter::create()->toArray(),
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
        $jsonTmp = json_encode($this->toArray());
        $objeto = json_decode($jsonTmp);
        if(Auth::check()){
            $user = Auth::user();
            $view->with('objectConfig', $objeto)->with('util', $this->util)->with('user', $user);
        }else{
            $view->with('objectConfig', $objeto)->with('util', $this->util);
        }
    }
}

/**
 * Important: all ViewComposer classes must be registered with provider ComposerServiceProvider.
 */

