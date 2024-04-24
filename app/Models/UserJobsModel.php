<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserJobsModel extends Model
{
    use HasFactory;

    protected $table = "user_jobs";
    protected $fillable = [
        'user_id',
       'career_id',
       'dep_id',
   
    ];

    public function user_career() 
    {
        return $this->belongsTo(CareerUpdatedModel::class, 'career_id','id');    
    }
    public function user_dep() 
    {
        return $this->belongsTo(DepartamentUpdatedModel::class, 'dep_id','id' );    
    }

};

   
