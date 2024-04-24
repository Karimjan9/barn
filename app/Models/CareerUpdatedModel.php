<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerUpdatedModel extends Model
{
    use HasFactory;

    protected $table='career_updated';
    protected $fillable = [
     'name',
     'departament_id',
    ];

    public function get_dep(){
        return $this->hasOne(DepartamentUpdatedModel::class, 'id', 'departament_id');   
    }
}
