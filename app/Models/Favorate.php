<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorate extends Model
{
    use HasFactory;


    protected $table = 'favorates';
    protected $fillable = ['user_id','production_id'];
  
}
