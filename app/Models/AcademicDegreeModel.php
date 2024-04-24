<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicDegreeModel extends Model
{
    use HasFactory;
    protected $table = "academic_degree";
    protected $fillable = [
        'name'
    ] ;
}
