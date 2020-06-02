<?php
namespace App\ViewComposers;

use Illuminate\View\View;
use laraflex\ViewHelpers\Util;
use laraflex\ViewHelpers\Listeners\DependenciesListener;
use App\ViewPresenters\NavBarDefaultPresenter;
use App\ViewPresenters\ImageBarPresenter;

class RegisterConfigComposer
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
            'title' => 'Projeto LaraFlex',
            //'headerClass' => 'container',
            //'contentClass' => 'container-fluid',
            //'onePage' => true,
            'bgStyle' => ['border' => 'shadow'],
            'dependencies' => NULL,
            'components' => NULL,
            'headerComponents' => [
                NavBarDefaultPresenter::create()->toArray(),
                ImageBarPresenter::create()->toArray(),
             ],
        ];
        return json_encode($var);
    }
    /**
     * The border property sets the border types of the component.
     * As opções são: shadow, rounded, border e none.
     */

    public function compose(View $view)
    {
        $dependencies = DependenciesListener::create();
        $jsonTmp = $this->toArray();
        $objeto = json_decode($jsonTmp);
        $view->with('objectConfig', $objeto)->with('util', $this->util)->with('objectListener', $dependencies);
    }
}

/**
 * Important: all ViewComposer classes must be registered with provider ComposerServiceProvider.
 */


