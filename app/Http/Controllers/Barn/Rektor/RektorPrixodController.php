<?php

namespace App\Http\Controllers\Barn\Rektor;

use App\Models\CargoModel;
use App\Models\PrixodModel;
use Illuminate\Http\Request;
use App\Models\ProviderModel;
use App\Http\Controllers\Controller;

class RektorPrixodController extends Controller
{
  
    public function index()
    {
        $cargos=CargoModel::with(['child'])->orderBy('id', 'DESC')->paginate(40);
       
        $all_inf=[];
        foreach ($cargos as $key => $cargo) {
            dd($cargo); 
            $prixod_num=0;
            $prixod_cost=0;
            $inf=[];
            $prixod_curer=[];
            $prixod_currency_cost_all=0;

           
            foreach ($cargo->child as $key => $prixod) {
               
                  $prixod_num+=$prixod->count_of_item; 
                  $prixod_cost+=$prixod->cost_of_per*$prixod->count_of_item;
                  $prixod_curer=$prixod->get_provider->name?? "kiritilmagan";
                  dd($prixod->get_provider->name);
                  $prixod_currency_cost=$prixod->cost_of_per*$prixod->count_of_item*$prixod->currency_value;
                  $prixod_currency_cost_all=$prixod_currency_cost_all+$prixod_currency_cost;
            }
            $inf[]=$prixod_cost;
            $inf[]=$prixod_num;
            $inf[]=$prixod_curer;
            dd($prixod_curer);
            $inf[]=$prixod_currency_cost_all??0;
            $all_inf[]=$inf;
        }
            // dd(1);
        return view('barn.rektor.prixods.index',compact('cargos','all_inf'));
    }

 
  
 
    public function show($id)
    {
        $prixods=PrixodModel::with('get_currency')->where('cargo_id',$id)->paginate(40);

        return view('barn.rektor.prixods.show',compact('prixods'));
    }

  
    
}
