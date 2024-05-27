<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemsModel extends Model
{
    use HasFactory;
    protected $table='items';
    protected $fillable=[
        'name',
        'bodily',
        'first',
        'second',
        'extant',
        'absent',
        'status',
        'description',
        'unity_id',
    ];

    public function get_bodily(){
        return $this->belongsTo(BodilyTypeModel::class,"bodily","id");
    }

    public function get_first(){
        return $this->belongsTo(TypeOfItem::class,'first','id');
    }

    public function get_second(){
        return $this->belongsTo(SecondTypeOfItem::class,'second','id');
    }

    public function get_unity(){
        return $this->belongsTo(ItemUnityModel::class,'unity_id','id');
    }
    public function get_prixod(){
        return $this->belongsTo(PrixodModel::class,'id','item_id');
    }
}


