<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeJobModel extends Model
{
    use HasFactory;
    
    protected $table = "type_of_job";
    protected $fillable = [
        'name',
   
    ];
}
