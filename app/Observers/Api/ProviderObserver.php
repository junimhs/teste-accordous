<?php

namespace App\Observers\Api;

use App\Models\Provider;
use Illuminate\Support\Str;

class ProviderObserver
{
    /**
     * Handle the provider "created" event.
     *
     * @param  \App\Models\Provider  $provider
     * @return void
     */
    public function creating(Provider $provider)
    {
        $provider->url = Str::kebab($provider->name);
        cache()->clear();
    }
}
