<?php

namespace laraflex;

use Illuminate\Support\ServiceProvider;

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
        $this->loadViewsFrom(__DIR__.'/Resources/Views/Components', 'laraflex');
        $this->loadViewsFrom(__DIR__.'/Resources/Views/Components/scriptjs', 'laraflexscript');
        //publishes resources
        $this->publishes([__DIR__.'/Resources/lang' => base_path('resources/lang'),]);
        $this->publishes([__DIR__.'/Resources/lang/pt' => base_path('resources/lang/pt'),]);
        $this->publishes([__DIR__.'/Resources/Views' => base_path('resources/views'),]);
        $this->publishes([__DIR__.'/Resources/Views/auth' => base_path('resources/views/auth'),]);
        $this->publishes([__DIR__.'/Resources/Views/auth/passwords' => base_path('resources/views/auth/passwords'),]);
        $this->publishes([__DIR__.'/Resources/Views/layouts' => base_path('resources/views/layouts'),]);
        $this->publishes([__DIR__.'/Resources/Views/layouts/functional' => base_path('resources/views/layouts/functional'),]);
        $this->publishes([__DIR__.'/Resources/Views/layouts/section' => base_path('resources/views/layouts/section'),]);
        //publishes View Composers, View Presenters and ResourceMediators
        $this->publishes([__DIR__.'/App/ViewComposers' => base_path('App/ViewComposers'),]);
        $this->publishes([__DIR__.'/App/ViewPresenters' => base_path('App/ViewPresenters'),]);
        $this->publishes([__DIR__.'/App/ResourceMediators' => base_path('App/ResourceMediators'),]);
        //publishes Command and Stubs
        $this->publishes([__DIR__.'/App/Console/Commands' => base_path('App/Console/Commands'),]);
        $this->publishes([__DIR__.'/App/Console/Commands/Stubs' => base_path('App/Console/Commands/Stubs'),]);
        //publishes public files
        $this->publishes([__DIR__.'/public/images/app' => base_path('public/images/app'),]);
        $this->publishes([__DIR__.'/public/images/icons' => base_path('public/images/icons'),]);
        $this->publishes([__DIR__.'/public/images/posts' => base_path('public/images/posts'),]);
        $this->publishes([__DIR__.'/public/images/slides' => base_path('public/images/slides'),]);
        $this->publishes([__DIR__.'/public/images/users' => base_path('public/images/users'),]);
    }
}
