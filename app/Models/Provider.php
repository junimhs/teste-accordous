<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use Uuid;

    protected $fillable = [
        'name',
        'email',
        'monthly_payment',
        'status'
    ];

    protected $casts = [
        'id' => 'string'
    ];

    public $incrementing = false;

    /**
     * Get Company
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Scope
     */
    public function scopeCompanyData(Builder $query)
    {
        return $query->where('company_id', auth()->user()->company_id);
    }
}
