<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FileModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "file";

    protected $fillable = [
        'path_of_file',
        'folder_name',
        'new_name',
        'old_name',
        'exp',
        'user_id'
   
    ];
   
}
