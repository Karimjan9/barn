<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GetJobsModel extends Model
{

    use HasFactory;
    use SoftDeletes;
    protected $table = "get_jobs";
    protected $fillable = [
    "user_id",
    "dep_id",
    "career_id",
    'rate_job',
    'type_job'
    ];

    public function get_career() 
    {
        return $this->belongsTo(CareerModel::class, 'career_id', 'id');    
    }
    public function get_departament() 
    {
        return $this->belongsTo(DepartamentsModel::class, 'dep_id', 'id');    
    }

    public function get_rate() 
    {
        return $this->belongsTo(RateModel::class, 'rate_job', 'id');    
    }
    public function get_type() 
    {
        return $this->belongsTo(TypeJobModel::class, 'type_job', 'id');    
    }
}
