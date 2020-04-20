<?php
namespace App\ViewComposers;

use Illuminate\View\View;
use laraflex\ViewHelpers\Util;
use laraflex\Resources\ObjectBootstrap;
use App\ViewPresenters\NavBarDefaultPresenter;
use App\ViewPresenters\ImageBarPresenter;
//use App\ViewPresenters\FooterPresenter;
use Illuminate\Support\Facades\Auth;

class EmailConfigComposer
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
            'title' => 'Projeto LaraFlex',
            'header' => ['navbar', 'imagebar'],
            'headerClass' => 'container-fluid',
            'headerColor' => 'black',
            'footer' => ['footer'],
            'bgStyle' => ['border' => 'shadow'],
            'meta' => [
                ['name' => 'keywords', 'content' => 'finanças, mercado financeiro, Bovespa'],
                ['name' => 'author', 'content' => 'Dimas Vidal'],
            ],
            'dependencies' => NULL,
            'components' => NULL,
            'headerComponents' => [
                NavBarDefaultPresenter::create()->toArray(),
                ImageBarPresenter::create()->toArray(),
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
            $view->with('objectConfig', $objeto)->with('util', $this->util)->with('user', $user)->with('bootstrap', $this->bootstrap);
        }else{
            $view->with('objectConfig', $objeto)->with('util', $this->util)->with('bootstrap', $this->bootstrap);
        }
    }
}

/**
 * Important: all ViewComposer classes must be registered with provider ComposerServiceProvider.
 */

