<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = [
        'episode',
        'show_id'
    ];

    public function show(): BelongsTo
    {
        return $this->belongsTo(Show::class);
    }
}
