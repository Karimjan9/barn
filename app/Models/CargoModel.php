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
    ];

    protected $casts = [
        'come_date' => 'datetime'
    ];


    public function get_provider(){
        return $this->hasOne(ProviderModel::class, 'id', 'sender_id');   
    }
}
