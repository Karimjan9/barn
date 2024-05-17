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
        $cargos=CargoModel::orderBy('id', 'DESC')->paginate(15);
        // dd($cargos);
        $all_inf=[];
        foreach ($cargos as $key => $cargo) {
            $prixod_num=0;
            $prixod_cost=0;
            $inf=[];
            $prixod_curer=[];
            $prixods=PrixodModel::where('cargo_id',$cargo->id)->get();
            foreach ($prixods as $key => $prixod) {
                  $prixod_num+=$prixod->count_of_item; 
                  $prixod_cost+=$prixod->cost_of_per*$prixod->count_of_item;
                  $prixod_curer=ProviderModel::where('id',$prixod->curer_id)->first() ?? [];
             
            }
            $inf[]=$prixod_cost;
            $inf[]=$prixod_num;
            $inf[]=$prixod_curer;

            $all_inf[]=$inf;
        }
            // dd(1);
        return view('barn.rektor.prixods.index',compact('cargos','all_inf'));
    }

 
  
 
    public function show($id)
    {
        $prixods=PrixodModel::where('cargo_id',$id)->paginate(15);

        return view('barn.rektor.prixods.show',compact('prixods'));
    }

  
    
}
