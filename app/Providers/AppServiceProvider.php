<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\Provider;
use App\Observers\Api\CompanyObserver;
use App\Observers\Api\ProviderObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Company::observe(CompanyObserver::class);
        Provider::observe(ProviderObserver::class);
    }
}
