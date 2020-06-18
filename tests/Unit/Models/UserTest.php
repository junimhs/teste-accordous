<?php

namespace Tests\Unit\Models;

use App\Models\Traits\Uuid;
use App\Models\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = new User();
    }

    public function testFillable()
    {
        $fillable = ['name', 'email', 'password'];
        $this->assertEquals($fillable, $this->user->getFillable());
    }

    public function testIfUseTraits()
    {
        $traits = [Notifiable::class,Uuid::class, HasApiTokens::class];
        $classesTraits = array_values(class_uses(User::class));
        $this->assertEquals($traits, $classesTraits);
    }

    public function testCats()
    {
        $cats = ['id' => 'string', 'email_verified_at' => 'datetime'];
        $this->assertEquals($cats, $this->user->getCasts());
    }

    public function testIncrementing()
    {
        $this->assertFalse($this->user->incrementing);
    }
}
