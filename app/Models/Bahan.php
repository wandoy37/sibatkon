<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bahan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function formulirs(): HasMany
    {
        return $this->hasMany(Formulir::class);
    }

    public function getHargaRupiahAttribute()
    {
        return number_format($this->harga, 0, ',', '.');
    }
}
