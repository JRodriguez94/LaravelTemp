<?php

namespace App\Providers;

use Form;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('btnLinkBar', 'components.btn.link_bar', [
            'id', 'url', 'message', 'fa'
        ]);
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
