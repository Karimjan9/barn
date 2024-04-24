<?php

namespace App\Http\Controllers\Barn\Storekeeper\Items;

use App\Http\Controllers\Controller;
use App\Models\BodilyTypeModel;
use App\Models\ItemsModel;
use App\Models\ItemUnityModel;
use App\Models\SecondTypeOfItem;
use App\Models\TypeOfItem;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
   
    public function index()
    {
        
        $items=ItemsModel::with(['get_bodily','get_second','get_unity'])->paginate(10);
        // dd($items);
        return view('barn.storekeep.items_actions.index',compact('items'));
    }

 
    public function create()
    {
        $bodilys=BodilyTypeModel::all();

        $second_types=SecondTypeOfItem::all();
        $unitys=ItemUnityModel::all();
        // dd($second_types);
        return view('barn.storekeep.items_actions.create',compact('bodilys','second_types','unitys'));
    }

   
    public function store(Request $request)
    {
        $item_create=ItemsModel::create($request->all());

        return redirect()->route('storekeeper_role.items.index');
    }

  
    public function show($id)
    {
        
    }


    public function edit($id)
    {
        $item=ItemsModel::where('id',$id)->first();
        $bodilys=BodilyTypeModel::all();

        $second_types=SecondTypeOfItem::all();

        $unitys=ItemUnityModel::all();

        return view('barn.storekeep.items_actions.edit',compact('bodilys','item','second_types','unitys'));
    }

   
    public function update(Request $request,ItemsModel $item)
    {
        // dd($id);    
        $input = $request->all();
        $item->fill($input)->save();

        return redirect()->route('storekeeper_role.items.index');
    
    }

   
    public function destroy($id)
    {
        
    }

    public function get_second_types(Request $request){
        $responses=SecondTypeOfItem::where('type_of_item_id',$request->first_type)->get();

        return response()->json([
            'responses' => $responses,
        ]);
    }
}
