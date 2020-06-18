<?php

namespace Tests\Unit\Models;

use App\Models\Provider;
use App\Models\Traits\Uuid;
use PHPUnit\Framework\TestCase;

class ProviderTest extends TestCase
{
    private $provider;

    protected function setUp(): void
    {
        parent::setUp();
        $this->provider = new Provider();
    }

    public function testFillable()
    {
        $fillable = ['name','email','monthly_payment','status'];
        $this->assertEquals($fillable, $this->provider->getFillable());
    }

    public function testIfUseTraits()
    {
        $traits = [Uuid::class];
        $classesTraits = array_values(class_uses(Provider::class));
        $this->assertEquals($traits, $classesTraits);
    }

    public function testCats()
    {
        $cats = ['id' => 'string'];
        $this->assertEquals($cats, $this->provider->getCasts());
    }

    public function testIncrementing()
    {
        $this->assertFalse($this->provider->incrementing);
    }
}
