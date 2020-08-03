<?php
namespace App\ViewComposers;

use Illuminate\View\View;
use laraflex\ViewHelpers\Util;
use laraflex\ViewHelpers\Listeners\DependenciesListener;
use App\ViewPresenters\NavBarDefaultPresenter;
use App\ViewPresenters\ImageBarPresenter;
use App\ViewPresenters\SimpleFooterPresenter;
use App\viewPresenters\ImageBannerPresenter;

use Illuminate\Support\Facades\Auth;

class PublicConfigComposer
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
            'bgStyle' => ['border' => 'shadow'],
            'meta' => [
                ['name' => 'keywords', 'content' => 'laravel, desenvolvimento web, php'],
                ['name' => 'author', 'content' => 'Dimas Vidal'],
            ],
            'dependencies' => NULL,
            'components' => NULL,
            'headerComponents' => [
                NavBarDefaultPresenter::create()->toArray(),
                ImageBarPresenter::create()->toArray(),
            ],
            'footerComponents' => [
                SimpleFooterPresenter::create()->toArray(),
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
        $dependencies = DependenciesListener::create();
        $jsonTmp = json_encode($this->toArray());
        $objeto = json_decode($jsonTmp);
        if(Auth::check()){
            $user = Auth::user();
            $view->with('objectConfig', $objeto)->with('util', $this->util)->with('user', $user)->with('objectListener', $dependencies);
        }else{
            $view->with('objectConfig', $objeto)->with('util', $this->util)->with('objectListener', $dependencies);
        }
    }
}


