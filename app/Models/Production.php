<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;
    protected $table = 'productions';
    protected $fillable = [
        'title',
        'trailePath',
        'posterPath',
        'releaseDate',
        'language',
        'voteCount',
        'voteAverage',
        'isSeries',
        'sesionCount',
    ];
}
