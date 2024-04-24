<?php

namespace App\Http\Controllers\Barn\Kadr;

use App\Http\Controllers\Controller;
use App\Models\CareerUpdatedModel;
use App\Models\DepartamentUpdatedModel;
use Illuminate\Http\Request;

class CareerUpdateController extends Controller
{
  
    public function index()
    {
        $careers=CareerUpdatedModel::with(['get_dep'])->paginate(10);
        // dd($careers );
        return view('barn.career_update.index',compact('careers'));
    }

   
    public function create()
    {
        $departaments=DepartamentUpdatedModel::get();
        return view('barn.career_update.create',compact('departaments'));
    }

  
    public function store(Request $request)
    {   
        // dd($request);
        $career=CareerUpdatedModel::create($request->all());
        return to_route('kadr_role.career_update.index');
    }

   
    public function show($id)
    {
       
    }
   
    public function edit($id)
    {
        $career=CareerUpdatedModel::where('id','=',$id)->first();

        $departaments=DepartamentUpdatedModel::get();

        return view('barn.career_update.edit',compact('departaments','career'));
    }
    

   
    public function update(Request $request, $id)
    {
         
        $post = CareerUpdatedModel::find($id); 

        $post->fill($request->all())->save();
        
        return to_route('kadr_role.career_update.index');
    }

  
    public function destroy($id)
    {
        $post = CareerUpdatedModel::find($id); 

        $post->delete();

        return to_route('kadr_role.career_update.index');
    }
}
