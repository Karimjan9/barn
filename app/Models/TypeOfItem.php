<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfItem extends Model
{
    use HasFactory;
    protected $fillable=['name_of_type'];


    public function get_item(){
        return $this->hasMany(ItemsModel::class,'first','id'); 
    }
}


