<?php

namespace App\Http\Controllers\Barn\Kadr\Search;

use App\Models\User;
use App\Models\ItemsModel;
use App\Models\TypeOfItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Barn\Kadr\Search\SearchRequest;
use App\Http\Requests\Barn\Kadr\Search\ItemSearchRequest;
use App\Models\SecondTypeOfItem;

class SearchController extends Controller
{
 public function search(SearchRequest $request){
 
    $users=User::where('jshir','=',$request->search)->get();
    // dd($user==null);
    if (count($users)==0) {
        return redirect()->route('kadr_role.actions.create');
    } else {
      $search=1;  
     return view('barn.kadr.index',compact('users','search'));
    }
    

    
 }

 public function search_item(ItemSearchRequest $request){
    $items=ItemsModel::where('name','LIKE',"%$request->search%")->with(['get_bodily','get_second','get_unity'])->paginate(20);
    
    
    return view('barn.storekeep.items_actions.index',compact('items'));
 
 }

 public function prixod_search_items(Request $request){
    $items=ItemsModel::where('name','LIKE',"%$request->search%")->with('get_unity')->paginate(20);

    return view('barn.storekeep.item_serach.index',compact('items'));
}

public function selected_item_prixod($selected_id){
    $item=ItemsModel::where('id','=',$selected_id)->first();
    $types=TypeOfItem::where('id','=',$item->first)->first();

    $second=SecondTypeOfItem::where('id','=',$item->second)->first(); 
        
    return view('barn.storekeep.item_serach.index_2',compact('types','item','second'));
}
}
