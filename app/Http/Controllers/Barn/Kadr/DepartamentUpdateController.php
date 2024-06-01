<?php

namespace App\Http\Controllers\Barn\Kadr;

use App\Http\Controllers\Controller;
use App\Models\BuildingModel;
use App\Models\DepartamentUpdatedModel;
use App\Models\DepartmentKafedraModel;
use App\Models\User;
use Illuminate\Http\Request;

class DepartamentUpdateController extends Controller
{
   
    public function index()
    {
        $departaments=DepartmentKafedraModel::with(['get_user','get_building'])->get();
        // dd($departaments);
        return view('barn.departament_update.index',compact('departaments'));
    }

    
    public function create()
    {
        $users=User::where('level_id',6)->get();
        // dd($users);
        $buildings=BuildingModel::get();
        // dd($buildings);
        return view('barn.departament_update.create',compact('users','buildings'));
    }

    public function store(Request $request)
    {
        DepartmentKafedraModel::create($request->all());

        return to_route('kadr_role.department_update.index');
   
    }

    public function show($id)
    {
        
    }

  
    public function edit($id)
    {
        $departament=DepartamentUpdatedModel::where('id','=',$id)->first();
        // dd($departament);

        return view('barn.departament_update.edit',compact('departament'));
    }

 
    public function update(Request $request, $id)
    {
       
        $post = DepartamentUpdatedModel::find($id); 

        $post->fill($request->all())->save();
        
        return to_route('kadr_role.department_update.index');
        
    }

 
    public function destroy($id)
    {
        $post = DepartamentUpdatedModel::find($id); 

        $post->delete();

        return to_route('kadr_role.department_update.index');

    }
}
