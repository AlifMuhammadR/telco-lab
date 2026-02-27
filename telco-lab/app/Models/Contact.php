<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'no_hp',
        'id_company',   // <- perhatikan nama kolom
        'jabatan',
        'description',
    ];

    /**
     * Relasi ke perusahaan (foreign key = id_company)
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'id_company');
    }
}
