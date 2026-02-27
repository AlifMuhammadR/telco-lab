<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Company extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'location',
        'description',
    ];

    /**
     * Relasi ke kontak (foreign key = id_company)
     */
    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class, 'id_company');
    }

    /**
     * Relasi many-to-many ke produk
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'company_product')
                    ->withTimestamps();
    }
}
