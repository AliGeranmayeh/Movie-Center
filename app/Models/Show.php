<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
    
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class , 'following_list');
    }
}
