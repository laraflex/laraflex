<?php
namespace laraflex\ViewHelpers\Listeners;

use laraflex\Contracts\AbstractListener;

class DependenciesListener extends AbstractListener{

    protected function listeners(){
        $var = [
        'navbar' => 'laraflex\ViewHelpers\Dependencies\NavbarDependencies',
        'slidebar' => 'laraflex\ViewHelpers\Dependencies\SlidebarDependencies',
        'lightbox' => 'laraflex\ViewHelpers\Dependencies\LightboxDependencies',
        'panelxp' => 'laraflex\ViewHelpers\Dependencies\LightboxDependencies',
        'panel' => 'laraflex\ViewHelpers\Dependencies\LightboxDependencies',
        'mediacards' => 'laraflex\ViewHelpers\Dependencies\LightboxDependencies',
        'storagemanager' => 'laraflex\ViewHelpers\Dependencies\StorageDependencies',
        'sidebar' => 'laraflex\ViewHelpers\Dependencies\SidebarDependencies',
        'panelnavmodal' => 'laraflex\ViewHelpers\Dependencies\PanelnavModalDependencies',
        'formconfirm' => 'laraflex\ViewHelpers\Dependencies\FormConfirmDependencies',
        ];
        return $var;
    }

    static public function create(){
        return new DependenciesListener();
    }

}
