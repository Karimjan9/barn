<?php

namespace App\Http\Controllers\Barn\Kadr\Search;

use App\Models\User;
use App\Models\ItemsModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Barn\Kadr\Search\SearchRequest;
use App\Http\Requests\Barn\Kadr\Search\ItemSearchRequest;

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
    $items=ItemsModel::where('name','LIKE',"%$request->search%")->with(['get_bodily','get_second','get_unity'])->paginate(20);;
   //  dd($items);
    
    // dd($items);
    return view('barn.storekeep.items_actions.index',compact('items'));
 
 }
}
