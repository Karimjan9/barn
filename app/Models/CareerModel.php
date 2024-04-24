<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerModel extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'career_name',
        'departament_id',
        'divide',
        'rate',
        'divide_status',
        'sum_rate',

    ];

    public function get_dep(){
        return $this->hasOne(DepartamentsModel::class, 'id', 'departament_id');   
    }
}
