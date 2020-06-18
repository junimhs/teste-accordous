<?php

namespace Tests\Feature\Models;

use App\Models\Company;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use DatabaseMigrations;

    private $company;

    protected function setUp(): void
    {
        parent::setUp();
        $this->company = new Company();
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

        $this->assertEquals("Company 2", $company->name);
        $this->assertEquals("company2", $company->url);
    }
}
