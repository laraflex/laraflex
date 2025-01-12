<?php
/**
 * Class Name: LaraflexServiceProvider
 * @author: Dimas Vidal
 */

namespace laraflex;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;


class LaraflexServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/Resources/Components', 'laraflex');
        $this->loadViewsFrom(__DIR__.'/Resources/Components/scriptjs', 'laraflexscript');
        Blade::anonymousComponentPath(__DIR__.'/Resources/components/ComponentParts', 'laraflex');

        /**
         * Opções de publish para instalação
         */

        $this->publishes([
                __DIR__.'/Resources/lang' => base_path('resources/lang'),
                __DIR__.'/Resources/Views' => base_path('resources/views'),
                //publishes View Composers, View Presenters, viewListeners and ResourceMediators
                __DIR__.'/App/ViewComposers' => base_path('App/ViewComposers'),
                __DIR__.'/App/ViewPresenters' => base_path('App/ViewPresenters'),
                __DIR__.'/App/ViewListeners' => base_path('App/ViewListeners'),
                __DIR__.'/App/ResourceMediators' => base_path('App/ResourceMediators'),
                //publishes Command and Stubs
                __DIR__.'/App/Console/Commands' => base_path('App/Console/Commands'),
                //publishes public files
                __DIR__.'/public/css' => base_path('public/css'),
                __DIR__.'/public/images/app' => base_path('public/local/images/app'),
                __DIR__.'/public/images/icons' => base_path('public/local/images/icons'),
                __DIR__.'/public/images/posts' => base_path('public/local/images/posts'),
                __DIR__.'/public/images/slides' => base_path('public/local/images/slides'),
                __DIR__.'/public/images/users' => base_path('public/local/images/users'),
                __DIR__.'/public/js/laraflex' => base_path('public/laraflex'),
                //publishes controllers
                __DIR__.'/App/Http/Controllers' => base_path('App/Http/Controllers'),
                //publish config
                __DIR__.'/config' => base_path('config'),


                ]);

    }
}
