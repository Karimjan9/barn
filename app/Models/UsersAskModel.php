<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersAskModel extends Model
{
    use HasFactory;

    protected $table='users_ask';

    protected $fillable = [
        "user_id",
        'second_id',
        'number',
        'description',
        'type_id',
        'status',
        'rektor_comment',
        'ordered',
        
    ];
    protected $appends = [
        'must_type',
        'manager_status',
        
    ];

    public function  getManagerStatusAttribute()
    {
        $command=CommandToManager::where('ask_id',$this->id)->first();
        if ($command!=null) {
            if ( $command->status==0) {
                return 0;
            }elseif ( $command->status==1) {
                return 1;
            }
        } else {
            return 0;
        }
 
    }

    public function getMustTypeAttribute()
    {
        $item=ItemsModel::where('second',$this->second_id)->first();
        if ($item!=null) {
            if ( $item->extant-$item->absent==0) {
                return 0;
            }elseif ( $item->extant-$item->absent>0 && $item->extant-$item->absent<$this->number) {
                return 1;
            }elseif($item->extant-$item->absent>$this->number){
                return 2;
            }
        } else {
            return 0;
        }

    }
 

    public function get_first_type(){
        return $this->belongsTo(TypeOfItem::class, 'type_id', 'id'); 

    }

    public function get_second_type(){
        return $this->belongsTo(SecondTypeOfItem::class, 'second_id', 'id');

    }

    public function get_user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
