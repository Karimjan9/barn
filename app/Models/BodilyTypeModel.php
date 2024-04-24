<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BodilyTypeModel extends Model
{
    use HasFactory;

    protected $table='bodily_types';

    protected $fillable=[
        'name',
        'bodily'
    ];
}
