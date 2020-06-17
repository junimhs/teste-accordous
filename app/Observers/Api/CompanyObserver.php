<?php

namespace App\Observers\Api;

use App\Models\Company;
use Illuminate\Support\Str;

class CompanyObserver
{
    /**
     * Handle the company "creating" event.
     *
     * @param  \App\Models\Company  $company
     * @return void
     */
    public function creating(Company $company)
    {
        $company->url = Str::kebab($company->name);
    }
}
