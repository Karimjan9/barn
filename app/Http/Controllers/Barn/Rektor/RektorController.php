<?php

namespace App\Http\Controllers\Barn\Rektor;

use App\Models\User;
use App\Models\ItemsModel;
use App\Models\TypeOfItem;
use Illuminate\Http\Request;
use App\Models\UsersAskModel;
use App\Models\BodilyTypeModel;
use App\Models\SecondTypeOfItem;
use App\Http\Controllers\Controller;
use App\Models\GiveItemModel;
use App\Models\OrderModel;
use App\Models\OrderToBarnModel;
use App\Models\PrixodModel;
use Illuminate\Support\Facades\Auth;

class RektorController extends Controller
{
    
    public function index()
    {
        $asks=UsersAskModel::orderBy('created_at', 'desc')->paginate(15);
        $filters=[];
        $filters[]="Hamma so'rovlar";
        $filters[]="Ruxsat berilgan so'rovlar";
        $filters[]="Rad etilgan so'rovlar";
        $filters[]="Belgilanmagan so'rovlar";
        json_encode($filters);
        // dd($asks);
        return view('barn.rektor.asks.index',compact('asks','filters'));
    }



    public function deny_application(Request $request,$id){

        $change=UsersAskModel::where('id',$id)->update(['status'=>2,'rektor_comment'=>$request->order_from_rector]);
      
        return to_route('rektor_role.rektor_actions.index');
    }

    public function accept_application(Request $request,$id){

        $change=UsersAskModel::where('id',$id)->update(['status'=>1,'rektor_comment'=>$request->order_from_rector]);
            
        return to_route('rektor_role.rektor_actions.index');

    }
     public function ajax_get_fill_app(Request $request){
        if ($request->fil_value==0) {
           $data=UsersAskModel::with(['get_user','get_first_type','get_second_type'])->orderBy('created_at', 'desc')->get();
        }else {
            if ($request->fil_value==3) {

                $data=UsersAskModel::with(['get_user','get_first_type','get_second_type'])->orderBy('created_at', 'desc')->where('status',0)->get();
            }elseif($request->fil_value<3){

                $data=UsersAskModel::with(['get_user','get_first_type','get_second_type'])->orderBy('created_at', 'desc')->where('status',$request->fil_value)->get();
            }
        }
        return response()->json([
            'responses'=>$data,
        ]);
     }

     public function show_items(){
        $all_items=ItemsModel::paginate(20);
        // dd($all_items);
        $firsts=TypeOfItem::get();
      
        $bodilys=BodilyTypeModel::get();
        return view('barn.rektor.items_show.index',compact('all_items','firsts','bodilys'));
     }
     public function ajax_get_without_bodily(Request $request){
        $items=ItemsModel::with(['get_first','get_second'])->where('first',$request->first_filter)->where('second',$request->second_filter)->get();
        return response()->json([
            'responses'=> $items,
        ]);
    }
     
     public function ajax_get_with_bodily(Request $request){
        $items=ItemsModel::with(['get_first','get_second'])->where('first',$request->first_filter)->where('second',$request->second_filter)->where('bodily',$request->bodily)->get();
        // $dd=[$request->bodily,$request->first_filter,$request->second_filter];
        return response()->json([
            'responses'=>$items
        ]);
     }
     public function ajax_get_second_types(Request $request ){
        $second=SecondTypeOfItem::where('type_of_item_id',$request->first_filter)->get();
        return response()->json([
            'responses'=>$second,
        ]);
     }

     public function show_statistic(){
        
        $id=Auth::user()->id;
        $user=User::find($id);
        $orders=OrderToBarnModel::get()->count();
        $prixods=PrixodModel::get();
        $sum=0;
        foreach ($prixods as $key => $value) {
            $sum=$sum+($value->cost_of_per*$value->count_of_item*$value->currency_value);
        }
        // dd($sum);
        
        $sum=number_format($sum,2,","," ");
        // dd($sum);
        $taked=GiveItemModel::where('status',2)->get()->count();
        $dis_taked=GiveItemModel::get()->count()==0 ? 1:GiveItemModel::get()->count();
        
        $protsent=(int)(($taked/$dis_taked)*100);
        $worker=User::where('level_id',6)->get()->count();
        $table_prixods=PrixodModel::with('get_item_name','get_cargo_name')->orderBy('id', 'DESC')->limit(10)->get()->unique('item_id');
        // dd($table_prixods);
        $array=[];
        $names=[];
        $first=TypeOfItem::with('get_item')->get();
        foreach ($first as $key => $value) {
            $array[]=$value->get_item->sum('extant');
            $names[]=$value->name_of_type;
        }
        $names_1=json_encode($names);
        // dd($names_1);
        // dd($first->get_item->sum('extant'));
        return view('barn.rektor.statistic.index',compact('user','orders','sum','protsent','worker','table_prixods','array','names','names_1','taked','dis_taked'));
     }

     function rektor_filter(Request $request){
       
        $sum=0;
       
        if (  $request->status==1) {
            $prixods=PrixodModel::whereHas('get_item_name', function ($query) {
                return $query->where('bodily', '=', 1);
            })->get();
           
            foreach ($prixods as $key => $value) {
                $sum=$sum+($value->cost_of_per*$value->count_of_item*$value->currency_value);
            }
        }elseif (  $request->status==2) {
            $prixods=PrixodModel::get();
            foreach ($prixods as $key => $value) {
                $sum=$sum+($value->cost_of_per*$value->count_of_item*$value->currency_value);
            }
        }elseif (  $request->status==3) {
            $prixods=PrixodModel::whereHas('get_item_name', function ($query) {
                return $query->where('bodily', '=', 2);
            })->get();
            foreach ($prixods as $key => $value) {
                $sum=$sum+($value->cost_of_per*$value->count_of_item*$value->currency_value);
            }
        }elseif (  $request->status==4) {
            $prixods=PrixodModel::whereHas('get_item_name', function ($query) {
                return $query->where('bodily', '=', 3);
            })->get();
            foreach ($prixods as $key => $value) {
                $sum=$sum+($value->cost_of_per*$value->count_of_item*$value->currency_value);
            }
        }
        $sum=number_format($sum,2,","," ");
        return response()->json(['data'=>$sum]);
     }
}
