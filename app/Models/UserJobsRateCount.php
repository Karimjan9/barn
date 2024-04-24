<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserJobsRateCount extends Model
{
    use HasFactory;

    
    protected $table = "user_jobs_rate_counter";


    protected $fillable = [
        'user_id',
        'main_type',
        'inside_type',
        'out_type',
        'status'
   
    ];
  
}
