<?php

namespace App\Http\Controllers\Barn\Storekeeper\Prixod;

use App\Http\Controllers\Barn\Storekeeper\Items\ItemsController;
use App\Models\CargoModel;
use App\Models\ItemsModel;
use App\Models\TypeOfItem;
use App\Models\PrixodModel;
use Illuminate\Http\Request;
use App\Models\ProviderModel;
use App\Models\SecondTypeOfItem;
use App\Models\SecondUsersModel;
use App\Http\Controllers\Controller;
use App\Models\GiveItemModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PrixodController extends Controller
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

        return view('barn.storekeep.prixod.index',compact('cargos','all_inf'));
    }

   public function list_prixod()
   {
   
    $prixods = Session::get('prixods');
    // dd(Session::has('prixods'));   
    if(Session::has('prixods')){
        $lists=[];
        $prixods = Session::get('prixods');
        // dd($prixods);
      
        foreach ($prixods as $key => $prixod) {
            $obj=ItemsModel::whereIn('id',[$prixod['item']])->get();
            array_push($lists,$obj);
            // dd($obj);
        }
       

    }
    else {
        $prixods=[];
        $lists=[];
    }
    $curers=ProviderModel::all();
    $cargos=CargoModel::where('active_status','=',1)->get();
    return view('barn.storekeep.prixod.index_for_prixod',compact('prixods','curers','lists','cargos'));
   }

 


    public function create($prixods=null)
    {
        // $tovars=SecondTypeOfItem::all();
        // dd(1);
        $types=TypeOfItem::all();
      
        
        return view('barn.storekeep.prixod.create',compact('prixods','types'));
    }

  
    public function store(Request $request)
    {
        // dd($request->cost);
        $prixods=[];
        $data=['second'=>$request->second,'type'=>$request->type,'item'=>$request->item,'number'=>$request->number,'cost'=>$request->cost];
     
        if(Session::has('prixods')){
         
            $old = Session::get('prixods');
           
            array_push($old,$data);
            session(['prixods' => $old]);
        }
        else {
            array_push($prixods,$data);
            session(['prixods' => $prixods]);
        }
        return redirect()->route('storekeeper_role.prixod_list');
    }

  
    public function show($id)
    {
       
        $prixods=PrixodModel::where('cargo_id',$id)->paginate(15);

        return view('barn.storekeep.prixod.show',compact('prixods'));
        
    }

   
    public function edit($id)
    {
      
    $old = Session::get('prixods');
    // dd($old[$id]);
    $edit_prixod=$old[$id];
    $types=TypeOfItem::all();
    $seconds=SecondTypeOfItem::all();
    $items=ItemsModel::all();
    return view('barn.storekeep.prixod.edit',compact('edit_prixod','types','seconds','items','id'));

    }

   
    public function update(Request $request, $id)
    {
        $old = Session::get('prixods');

        $data=['second'=>$request->second,'type'=>$request->type,'item'=>$request->item,'number'=>$request->number,'cost'=>$request->cost];
        $old[$id]=$data;
        session(['prixods' => $old]);
        return to_route('storekeeper_role.prixod_list');
    }

  
    public function destroy($id)
    {
        $old = Session::get('prixods');
        $edit_prixod=$old[$id];
        unset($old[$id]);
        session(['prixods' => $old]);
        return to_route('storekeeper_role.prixod_list');
    }

    public function ajax_get_second_type(Request $request){
        $responses=SecondTypeOfItem::where('type_of_item_id',$request->type)->get();

        return response()->json([
            'responses' => $responses,
        ]);
    }
    
    public function ajax_get_item(Request $request){
        $responses=ItemsModel::where('second',$request->second)->get();

        return response()->json([
            'responses' =>  $responses,
        ]);
    }

    public function store_all(Request $request){
       
        $items=json_decode($request->lists);
        
        foreach (json_decode($request->prixods) as $key => $prixod) {
            $create=PrixodModel::create(['item_id'=>$prixod->item,'cargo_id'=>$request->cargo, 'count_of_item'=>$prixod->number, 'cost_of_per'=>$prixod->cost,'curer_id'=>$request->curer]);
            $get=ItemsModel::where('id',$items[$key][0]->id)->first();
          
            $update=ItemsModel::where('id',$items[$key][0]->id)->update(['extant'=>$get->extant+$prixod->number]);
            if ($get->bodily==1) {
                for ($i=0; $i < $prixod->number ; $i++) { 
                    GiveItemModel::create([ 'item_id'=>$prixod->item]);
                    if($i==3000){
                        echo("created 3000K");
                    }elseif ($i==6000) {
                        echo("created 6000K");
                    }elseif ($i==9000) {
                        echo("created 9000K");
                    }elseif ($i==12000) {
                        echo("created 12000K");
                    }
                
                }
            }
           
        }
        // dd(1);
        if(Session::has('prixods')){
            Session::forget('prixods');
            return to_route('storekeeper_role.prixod.index');
        }else{
            return to_route('storekeeper_role.prixod.index');
        }
      
    }
}
