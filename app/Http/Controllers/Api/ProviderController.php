<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProviderRequest;
use App\Jobs\MailProviderJob;
use App\Models\Company;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    private $company, $provider, $time = 60 * 5;

    public function __construct(Company $company, Provider $provider)
    {
        $this->company = $company;
        $this->provider = $provider;
    }

    public function index()
    {
        $key = 'provider_' . auth()->id();
        return cache()->remember($key, $this->time, function() {
            return $this->provider->companyData()->get();
        });
    }

    public function store(ProviderRequest $request)
    {
        $company = $this->company->find(auth()->user()->company_id);

        if(!$company) {
            return ['error' => "Company invalid."];
        }

        /**
         * Verify create provider with name
         */
        if($this->provider->companyData()->where('name', $request->name)->first()) {
            return ['error' => "Provider already exist."];
        }

        /**
         * Verify create provider with email
         */
        if($this->provider->companyData()->where('email', $request->email)->first()) {
            return ['error' => "Provider already exist."];
        }

        $provider = $company->providers()->create($request->all());

        /**
         * Go to e-mail
         */
        MailProviderJob::dispatch($provider);

        return $provider;
    }

    public function destroy($urlProvider)
    {
        $provider = $this->provider->companyData()->where('url', $urlProvider)->delete();

        if(!$provider) {
            return ['error' => "Provider invalid."];
        }

        return ['message' => 'Supplier has been successfully deleted.'];
    }

    public function payment()
    {
        $key = 'provider_payment_' . auth()->id();
        return cache()->remember($key, $this->time, function() {
            $countPayment = $this->provider->companyData()->sum('monthly_payment');
            return ['total' => $countPayment];
        });
    }

    public function active($id)
    {
        $result = $this->provider->where('id', $id)->where('status', false)->update(['status' => true]);

        if($result) {
            return '<p>Parabens o fornecedor foi ativado com sucesso.</p>';
        }

        return '<p>Error, esse fornecedor ja esta ativado.</p>';

    }
}
