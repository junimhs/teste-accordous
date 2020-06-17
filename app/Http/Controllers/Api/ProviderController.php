<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProviderRequest;
use App\Models\Company;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    private $company, $provider;

    public function __construct(Company $company, Provider $provider)
    {
        $this->company = $company;
        $this->provider = $provider;
    }

    public function index()
    {
        $providers = $this->provider->companyData()->get();

        return $providers;
    }

    public function store(ProviderRequest $request)
    {
        $company = $this->company->find(auth()->user()->company_id);

        if(!$company) {
            $json['error'] = "Company invalid.";
            return $json;
        }

        /**
         * Verify create provider with name
         */
        if($this->provider->companyData()->where('name', $request->name)->first()) {
            $json['error'] = "Provider already exist.";
            return $json;
        }

        /**
         * Verify create provider with email
         */
        if($this->provider->companyData()->where('email', $request->email)->first()) {
            $json['error'] = "Provider already exist.";
            return $json;
        }

        $provider = $company->providers()->create($request->all());

        /**
         * Go to e-mail
         */

        return $provider;
    }

    public function destroy($urlProvider)
    {
        $provider = $this->provider->companyData()->where('url', $urlProvider)->first();

        if(!$provider) {
            $json['error'] = "Provider invalid.";
            return $json;
        }

        $provider->delete();

        return response()->json(['message' => 'Supplier has been successfully deleted.']);
    }
}
