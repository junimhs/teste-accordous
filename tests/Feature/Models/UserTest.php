<?php

namespace Tests\Feature\Models;

use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    private $user, $company;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = new User();
        $this->company = new Company();
    }

    public function testCreateUser()
    {
        $company = $this->company->create([
            "name" => "Company 2",
            "url" => "company2",
            "phone" => "62982296414",
            "address" => "Rua J42",
            "cep" => "74952310",
            "cnpj" => "64012311000154"
        ]);

        $user = $company->users()->create([
            "name" => "Luis Henrique",
            "email" => "luis@gmail.com",
            "password" => bcrypt("junior")
        ]);

        $this->assertEquals("Luis Henrique", $user->name);
        $this->assertEquals($company->id, $user->company_id);
        $this->assertTrue(Hash::check("junior", $user->password));
    }
}
