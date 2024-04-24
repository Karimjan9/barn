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
        'order_id',
        
    ];
    public function get_item(){
        return $this->belongsTo(ItemsModel::class,'item_id','id');
    }
    public function get_user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
