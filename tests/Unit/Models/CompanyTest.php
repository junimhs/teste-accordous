<?php

namespace Tests\Unit\Models;

use App\Models\Company;
use App\Models\Traits\Uuid;
use PHPUnit\Framework\TestCase;

class CompanyTest extends TestCase
{
    private $company;

    protected function setUp(): void
    {
        parent::setUp();
        $this->company = new Company();
    }

    public function testFillable()
    {
        $fillable = ['name','phone','address','cep','cnpj'];
        $this->assertEquals($fillable, $this->company->getFillable());
    }

    public function testIfUseTraits()
    {
        $traits = [Uuid::class];
        $classesTraits = array_values(class_uses(Company::class));
        $this->assertEquals($traits, $classesTraits);
    }

    public function testCats()
    {
        $cats = ['id' => 'string'];
        $this->assertEquals($cats, $this->company->getCasts());
    }

    public function testIncrementing()
    {
        $this->assertFalse($this->company->incrementing);
    }
}
