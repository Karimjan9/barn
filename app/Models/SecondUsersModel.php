<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondUsersModel extends Model
{
    use HasFactory;
    protected $table = "second_users";
    protected $fillable = [
        "user_id",
        "obektivka",
        "diplom",
        "user_img",
        "academic_title_id",
        "academic_degree_id",
        "percent"
      
    ];
}
