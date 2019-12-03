<?php
namespace App\ViewComposers;

use Illuminate\View\View;
use laraflex\ViewHelpers\Util;
use App\ViewPresenters\NavBarDefaultPresenter;
use App\ViewPresenters\ImageBarPresenter;
use App\ViewPresenters\Extra\LoginPresenter;

class LoginConfigComposer
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
            'headerClass' => 'container-fluid',
            'headerColor' => 'black',
            'bgStyle' => ['border' => 'shadow'],
            'dependencies' => NULL,
            'components' => [
                LoginPresenter::create()->toArray(),
            ],
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
        $jsonTmp = $this->toArray();
        $objeto = json_decode($jsonTmp);
        $view->with('objectConfig', $objeto)->with('util', $this->util);
    }
}
/**
 * Important: all ViewComposer classes must be registered with provider ComposerServiceProvider.
 */

