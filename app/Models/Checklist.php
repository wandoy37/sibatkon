<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Checklist extends Model
{
    use HasFactory;

    protected $table = 'checklists';
    protected $guarded = [];

    public function penerima(): BelongsTo
    {
        return $this->belongsTo(User::class, 'penerima_id');
    }

    public function formulir(): BelongsTo
    {
        return $this->belongsTo(Formulir::class);
    }

    public function materials(): HasMany
    {
        return $this->hasMany(Material::class);
    }
}
