<?php

namespace App\Models\Show;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    
}
