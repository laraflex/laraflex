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
        View::composer('auth.login', 'App\ViewComposers\LoginConfigComposer');
        View::composer('auth.verify', 'App\ViewComposers\VerifyConfigComposer');
        View::composer('auth.register', 'App\ViewComposers\RegisterConfigComposer');
        View::composer('auth', 'App\ViewComposers\AuthConfigComposer');
        View::composer('home', 'App\ViewComposers\HomeConfigComposer');
        View::composer('auth.passwords.reset', 'App\ViewComposers\ResetConfigComposer');
        View::composer('auth.passwords.email', 'App\ViewComposers\EmailConfigComposer');
        View::composer('doc', 'App\ViewComposers\DocConfigComposer');

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
