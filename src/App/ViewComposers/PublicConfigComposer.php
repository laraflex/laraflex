<?php
namespace App\ViewComposers;

use Illuminate\View\View;
use laraflex\ViewHelpers\Util;
use laraflex\Resources\ObjectBootstrap;
use App\ViewPresenters\NavBarDefaultPresenter;
use App\ViewPresenters\ImageBarPresenter;
use App\ViewPresenters\FooterPresenter;
use App\viewPresenters\ImageBannerPresenter;

use Illuminate\Support\Facades\Auth;

class PublicConfigComposer
{
    protected $util;
    protected $secure;
    protected $bootstrap;

    public function __construct()
    {
        $this->secure = false;
        $this->util = new Util($this->secure);
        $this->bootstrap = ObjectBootstrap::create()->items();
    }

    protected function toArray()
    {
        $var = [
            'title' => 'LaraFlex - View components and view pattern',
            'headerClass' => 'container-fluid',
            'headerColor' => 'black',
            'fixedmenu' => false,
            'integratedImage' => false,
            'bgStyle' => ['border' => 'shadow'],
            'meta' => [
                ['name' => 'keywords', 'content' => 'finanças, mercado financeiro, Bovespa'],
                ['name' => 'author', 'content' => 'Dimas Vidal'],
            ],
            'dependencies' => NULL,
            'components' => [
                ImageBannerPresenter::create()->toArray(),
            ],
            'headerComponents' => [
                NavBarDefaultPresenter::create()->toArray(),
                ImageBarPresenter::create()->toArray(),
            ],
            'footerComponents' => [
                //FooterPresenter::create()->toArray(),
            ],
        ];
        return $var;
    }
    /**
     * A propriedade border estabelece os tipos de borda do componente.
     * As opções são: shadow, rounded, border e none.
     */
    public function compose(View $view)
    {
        $jsonTmp = json_encode($this->toArray());
        $objeto = json_decode($jsonTmp);
        if(Auth::check()){
            $user = Auth::user();
            $view->with('objectConfig', $objeto)->with('util', $this->util)->with('user', $user)->with('bootstrap', $this->bootstrap);
        }else{
            $view->with('objectConfig', $objeto)->with('util', $this->util)->with('bootstrap', $this->bootstrap);
        }
    }
}


