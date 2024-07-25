<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoModel extends Model
{
    use HasFactory;
    protected $table="cargo";

    protected $fillable=[
       'name',
       'description',
       'all_cost',
       'sender_id',
       'come_date',
       'active_status',
       'file_contract',
       'file_faktura',
    ];

    protected $casts = [
        'come_date' => 'datetime'
    ];


    public function get_provider(){
        return $this->hasOne(ProviderModel::class, 'id', 'sender_id');   
    }

    public function get_prixods(){
        return $this->hasOne(PrixodModel::class,'id', 'cargo_id');   
    }



        // public function prixod()
        // {
        //     return $this->belongsToMany(PrixodModel::class);
        // }

        public function child()
        {
            return $this->hasmany(PrixodModel::class,'cargo_id','id');
        }
}
