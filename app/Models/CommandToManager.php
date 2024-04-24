<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandToManager extends Model
{
    use HasFactory;

    protected $table='command_to_manager';

    protected $fillable= [
        'ask_id',
        'status',
    ];

    protected $appends = ['user','second'];



    public function get_ask(){
        return $this->hasOne(UsersAskModel::class, 'id', 'ask_id');   
    }
}
