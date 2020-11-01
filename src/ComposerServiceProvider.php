<?php

namespace laraflex;

use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */

    public function boot()
    {
        /**
         * recorded composer related to the pages
         */

        View::composer('public', 'App\ViewComposers\PublicConfigComposer');
        View::composer('admin', 'App\ViewComposers\AdminConfigComposer');
        View::composer('home', 'App\ViewComposers\HomeConfigComposer');
        View::composer('auth', 'App\ViewComposers\AuthConfigComposer');
        View::composer('doc', 'App\ViewComposers\DocConfigComposer');
        View::composer('dashboard', 'App\ViewComposers\DashboardConfigComposer');

        /**
         * composer recorded related to the components
         */
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
