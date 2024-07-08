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

    public function bahan()
    {
        return $this->belongsTo(Bahan::class);
    }

    public function checklist(): HasMany
    {
        return $this->hasMany(Checklist::class, 'formulir_id');
    }

    // Mengaktifkan timestamps (created_at dan updated_at)
    public $timestamps = true;

    // Mengizinkan pengisian created_at secara manual
    public function setCreatedAt($value)
    {
        $this->attributes['created_at'] = $value;
    }
}
