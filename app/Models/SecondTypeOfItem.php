<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondTypeOfItem extends Model
{
    use HasFactory;

    protected $table='second_type_of_items';
    protected $fillable=[
        'name',
        'type_of_item_id'
    ];
    public function get_first_type(){
        return $this->belongsTo(TypeOfItem::class, 'type_of_item_id', 'id'); 
    }
}
