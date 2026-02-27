<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'id_vendor',
        'category',
        'description',
        'image',
    ];

    /**
     * Get the vendor that owns the product.
     */
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'id_vendor'); // perhatikan foreign key
    }
    /**
     * The companies that provide this product.
     */
    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class, 'company_product')
            ->withTimestamps();
    }
}
