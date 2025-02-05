<?php
namespace App\ViewListeners;

use laraflex\Contracts\AbstractListener;

class DependenciesListener extends AbstractListener{

    protected function listeners(){
        $var = [
        'navbar' => 'laraflex\ViewHelpers\Dependencies\NavbarDependencies',
        'slidebar' => 'laraflex\ViewHelpers\Dependencies\SlidebarDependencies',
        'lightbox' => 'laraflex\ViewHelpers\Dependencies\LightboxDependencies',
        'panelxp' => 'laraflex\ViewHelpers\Dependencies\PanelDependencies',
        'panel' => 'laraflex\ViewHelpers\Dependencies\PanelDependencies',
        'mediacards' => 'laraflex\ViewHelpers\Dependencies\LightboxDependencies',
        'panelnavmodal' => 'laraflex\ViewHelpers\Dependencies\PanelnavModalDependencies',
        'formconfirm' => 'laraflex\ViewHelpers\Dependencies\FormConfirmDependencies',
        'imagecontrolpanel' => 'laraflex\ViewHelpers\Dependencies\ImageControlPanelDependencies',
        'sidebar' => 'App\ViewPresenters\Dependencies\SidebarDependencies',
        'storagemanager' => 'App\ViewPresenters\Dependencies\StorageDependencies',
        ];
        return $var;
    }

    static public function create(){
        return new DependenciesListener();
    }

}
