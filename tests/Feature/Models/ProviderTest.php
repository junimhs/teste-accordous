<?php

namespace Tests\Feature\Models;

use App\Models\Company;
use App\Models\Provider;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProviderTest extends TestCase
{
    use DatabaseMigrations;

    private $provider, $company;

    protected function setUp(): void
    {
        parent::setUp();
        $this->provider = new Provider();
        $this->company = new Company();
    }

    public function testList()
    {
        $company = $this->company->create([
            "name" => "Company 2",
            "url" => "company2",
            "phone" => "62982296414",
            "address" => "Rua J42",
            "cep" => "74952310",
            "cnpj" => "64012311000154"
        ]);

        $company->providers()->create([
            "name" => "Fornecedor 7",
            "email" => "fonercedor7@gmail.com",
            "monthly_payment" => 500.00
        ]);

        $providers = $this->provider->all();

        $this->assertCount(1, $providers);
    }

    public function testCreate()
    {
        $company = $this->company->create([
            "name" => "Company 2",
            "url" => "company2",
            "phone" => "62982296414",
            "address" => "Rua J42",
            "cep" => "74952310",
            "cnpj" => "64012311000154"
        ]);

        $provider = $company->providers()->create([
            "name" => "Fornecedor 7",
            "email" => "fonercedor7@gmail.com",
            "monthly_payment" => 500.00
        ]);

        $this->assertEquals("Fornecedor 7", $provider->name);
        $this->assertEquals($company->id, $provider->company_id);
    }

    public function testDelete()
    {
        $company = $this->company->create([
            "name" => "Company 2",
            "url" => "company2",
            "phone" => "62982296414",
            "address" => "Rua J42",
            "cep" => "74952310",
            "cnpj" => "64012311000154"
        ]);

        $provider = $company->providers()->create([
            "name" => "Fornecedor 7",
            "email" => "fonercedor7@gmail.com",
            "monthly_payment" => 500.00
        ]);

        // Verificando se criou
        $this->assertEquals("Fornecedor 7", $provider->name);

        // apagando
        $provider->delete();

        $providers = $this->provider->all();
        $this->assertCount(0, $providers);
    }
}
