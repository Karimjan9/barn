<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiveItemModel extends Model
{
    use HasFactory;

    protected $table='give_item';

    protected $fillable=[
        'user_id',
        'item_id',
        'status',
        'dep_id',
        'repair_count',
        'repair_status',
        'repair_allow_status',
        'repair_allow_user'
        
    ];
    public function get_item(){
        return $this->belongsTo(ItemsModel::class,'item_id','id');
    }
    public function get_user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function get_departament_belong(){
        return $this->belongsTo(DepartmentKafedraModel::class,'dep_id','id');
    }
    public function get_departament_has_many()
    {
        return $this->hasmany(DepartmentKafedraModel::class,'id','dep_id');
    }

    public function get_allow_user(){
        return $this->belongsTo(User::class,'repair_allow_user','id');
    }
}
