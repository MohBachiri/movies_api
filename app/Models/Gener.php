<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gener extends Model
{
    use HasFactory;

    protected $table = 'geners';
    protected $fillable = ['title'];

}
