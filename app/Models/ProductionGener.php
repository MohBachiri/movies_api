<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionGener extends Model
{
    use HasFactory;
    protected $table = 'production_geners';
    protected $fillable = ['production_id','gener_id'];
    protected $primaryKey = ['production_id', 'gener_id'];
}
