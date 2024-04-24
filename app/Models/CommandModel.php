<?php

namespace App\Models;

use App\Models\User;
use App\Models\FileModel;
use App\Models\DepartamentsModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommandModel extends Model
{
    use HasFactory;
    protected $table = "command";

    protected $fillable = [
        'user_id',
        'old_job',
        'new_job',
        'file_id',
      

   
    ];


    public function get_old_job(){
        return $this->hasOne(GetJobsModel::class, 'id', 'old_job')->withTrashed();   
    }
    public function get_new_job(){
        return $this->hasOne(GetJobsModel::class, 'id', 'new_job')->withTrashed();   
    }
    public function get_user_name(){
        return $this->hasOne(User::class, 'id', 'user_id');   
    }
 
    public function get_old_dep(){
        return $this->hasOne(DepartamentsModel::class, 'id', 'old_dep');   
    }

    public function get_new_dep(){
        return $this->hasOne(DepartamentsModel::class, 'id', 'new_dep');   
    }

    public function get_com_file(){
        return $this->hasOne(FileModel::class, 'id', 'file_id');   
    }
    public function get_old_career(){
        return $this->hasOne(CareerModel::class, 'id', 'old_career');   
    }

    public function get_new_career(){
        return $this->hasOne(CareerModel::class, 'id', 'new_career');   
    }

    public function get_com_career_file(){
        return $this->hasOne(CareerFileModel::class, 'id', 'career_file');   
    }
}
