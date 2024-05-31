<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrixodModel extends Model
{
    use HasFactory;
    protected $table="prixod";

    // protected $casts = [
    //     'created_at' => 'datetime:d-m-Y ',
    // ];
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

    public function setCreated_AtAttribute( $value ) {
        $this->attributes['created_at'] = (new Carbon($value))->format('d/m/y');
      }

    public function get_cargo_name(){
        return $this->belongsTo(CargoModel::class, 'cargo_id', 'id'); 
    }

    public function get_currency(){
        return $this->belongsTo(CurrencyModel::class, 'currency_id', 'id'); 
    }
    public function get_provider(){
        return $this->belongsTo(ProviderModel::class, 'curer_id', 'id'); 
    }

    // public function cargo()
    // {
    //     return $this->belongsToMany(CargoModel::class);
    // }
    public function child()
    {
        return $this->hasmany(PrixodModel::class,'item_id','item_id');
    }
   
}
