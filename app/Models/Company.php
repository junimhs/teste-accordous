<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use Uuid;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'cep',
        'cnpj'
    ];

    protected $casts = [
        'id' => 'string'
    ];

    public $incrementing = false;

    /**
     * Get Users
     */

    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get Providers
     */

    public function providers()
    {
        return $this->hasMany(Provider::class);
    }
}
