<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Formulir extends Model
{
    use HasFactory;

    protected $table = 'formulirs';
    protected $guarded = [];

    public function bahan(): BelongsTo
    {
        return $this->belongsTo(Bahan::class);
    }

    public function checklist(): HasMany
    {
        return $this->hasMany(Checklist::class);
    }
}
