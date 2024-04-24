<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartamentUpdatedModel extends Model
{
    use HasFactory;

    protected $table = "departament_updated";
    protected $fillable = [
        'name',
    ];
}
