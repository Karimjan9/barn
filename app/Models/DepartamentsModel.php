<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartamentsModel extends Model
{
    use HasFactory;
    protected $table = "departaments";
    protected $fillable = [
        'name',
        'parent_id',
        'parent_level',
   
    ];
    public function children()
    {
        return $this->hasMany(DepartamentsModel::class, 'parent_id', 'id');
    }
    
}
