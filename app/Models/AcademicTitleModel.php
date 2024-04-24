<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicTitleModel extends Model
{
    use HasFactory;
    protected $table = "academic_title";
    protected $fillable = [
        'name'
    ] ;
}
