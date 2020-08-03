<?php
namespace App\ViewComposers;

use Illuminate\View\View;
use laraflex\ViewHelpers\Util;
use laraflex\ViewHelpers\Listeners\DependenciesListener;
use App\ViewPresenters\Testes\SideBarAdminPresenter;
use App\ViewPresenters\SimpleFooterPresenter;
//use App\ViewPresenters\Testes\BackPanelPresenter;

use Illuminate\Support\Facades\Auth;

class DocConfigComposer
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
                SideBarAdminPresenter::create()->toArray(),
                //PanelnavModalPresenter::create()->toArray(),
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
