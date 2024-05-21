<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrixodModel extends Model
{
    use HasFactory;
    protected $table="prixod";


    protected $fillable=[
        'item_id',
        'cargo_id',
        'count_of_item',
        'cost_of_per',
        'curer_id',
        'currency_id',
        'currency_value',
    ];
    public function get_item_name(){
        return $this->belongsTo(ItemsModel::class, 'item_id', 'id'); 
    }

    public function get_cargo_name(){
        return $this->belongsTo(CargoModel::class, 'cargo_id', 'id'); 
    }

    public function get_currency(){
        return $this->belongsTo(CurrencyModel::class, 'currency_id', 'id'); 
    }
    
}
