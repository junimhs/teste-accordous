<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    private $repository;

    public function __construct(Company $company)
    {
        $this->repository = $company;
    }

    public function store(CompanyRequest $request)
    {
        $company = $this->repository->create($request->all());

        return $company;
    }
}
