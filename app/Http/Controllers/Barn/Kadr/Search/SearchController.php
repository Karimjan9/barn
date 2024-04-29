<?php

namespace App\Http\Controllers\Barn\Kadr\Search;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Barn\Kadr\Search\SearchRequest;

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

 public function search_item(Request $request){
    dd($request->search);
    dd(1);
 }
}
