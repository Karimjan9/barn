<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderToBarnModel extends Model
{
    use HasFactory;
    protected $table = "order_to_barn";

    protected $fillable = [
        'item_id',
        'user_id',
        'number_of_item',
        'status',
        'ask_id',
        'givet_item_num',
        'give_status',

    ];
    
    public function get_item_name(){
        return $this->belongsTo(ItemsModel::class, 'item_id', 'id'); 
    }

   public function get_user_id(){
        return $this->belongsTo(User::class, 'user_id', 'id'); 
    }


}
