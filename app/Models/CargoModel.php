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
    ];

    protected $casts = [
        'come_date' => 'datetime'
    ];
}
