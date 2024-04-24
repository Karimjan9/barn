<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CareerFileModel extends Model
{
    use HasFactory;

    use HasFactory;
    
    use SoftDeletes;
    protected $table = "career_file";

    protected $fillable = [
        'path_of_file',
        'folder_name',
        'new_name',
        'old_name',
        'exp',
        'user_id'
   
    ];
   
}
