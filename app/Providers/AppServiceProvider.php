<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('admin.layouts.sidebar', 'App\Http\ViewComposers\Admin\LayoutViewComposer');
        view()->composer(['web.layouts.header','web.layouts.sidebar'], 'App\Http\ViewComposers\Web\LayoutViewComposer');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
