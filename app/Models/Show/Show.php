<?php

namespace App\Models\Show;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Show extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'type',
        'date_aired',
        'status',
        'genere',
        'duration',
        'quality'
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    
}
