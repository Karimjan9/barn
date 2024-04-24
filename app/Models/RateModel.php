<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RateModel extends Model
{
    use HasFactory;

   protected $table = "rate_of_work";

   protected $fillable = [
    'rate',

];
}
