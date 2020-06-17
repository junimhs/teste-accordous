<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserRequest;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $company;

    public function __construct(User $user, Company $company)
    {
        $this->company = $company;
    }

    public function store(UserRequest $request, $urlCompany)
    {
        $company = $this->company->where('url', $urlCompany)->first();

        if(!$company) {
            return ['error' => 'Company invalid.'];
        }

        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $user = $company->users()->create($data);

        return $user;
    }
}
