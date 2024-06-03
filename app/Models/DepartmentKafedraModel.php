<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentKafedraModel extends Model
{
    use HasFactory;

    protected $table = "department_kafedra";
    protected $fillable = [
        'name',
        'res_person',
        'building_id',
        'active_status',
    ];
    public function get_user(){
        return $this->belongsTo(User::class, 'res_person', 'id'); 
    }
    public function get_building(){
        return $this->belongsTo(BuildingModel::class, 'building_id', 'id'); 
    }

}
