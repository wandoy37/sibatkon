<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Material extends Model
{
    use HasFactory;

    protected $table = 'materials';
    protected $guarded = [];

    public function checklist(): BelongsTo
    {
        return $this->belongsTo(Checklist::class);
    }
}
