<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vendor extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'description',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'id_vendor'); // foreign key = id_vendor
    }
}
