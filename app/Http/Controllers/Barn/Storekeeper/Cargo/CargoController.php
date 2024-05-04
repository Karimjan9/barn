<?php

namespace App\Http\Controllers\Barn\Storekeeper\Cargo;

use App\Http\Controllers\Controller;
use App\Models\CargoModel;
use App\Models\ProviderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CargoController extends Controller
{
   
    public function index()
    {
        $cargos=CargoModel::with('get_provider')->orderBy('created_at', 'DESC')->paginate(10);
        // dd($cargos);
        return view('barn.storekeep.cargo.index',compact('cargos'));
    }

    public function create()
    {

        $providers=ProviderModel::all();
        // dd($providers);
        return  view('barn.storekeep.cargo.create',compact('providers'));
    }

    
    public function store(Request $request)
    {

        // $time=Carbon::now();
        $data=$request->all();
        // $data['name']=$data['name'].'_'."$time->day".'_'."$time->month".'_'."$time->year";
        // dd($data['name']);
        // dd($request->come_date);     
        $item_create=CargoModel::create($data);

        return redirect()->route('storekeeper_role.cargo.index');  
    }

    
    public function show($id)
    {
        
    }

   
    public function edit($id)
    {
        $cargo=CargoModel::find($id);
        // $place=strpos($cargo->name, '_');
        // $cargo->name=substr($cargo->name,0,$place );
        // dd( $cargo->name);
        return view('barn.storekeep.cargo.edit',compact('cargo'));
    }

   
    public function update(Request $request,CargoModel $cargo )
    {
    //    $time=Carbon::now();
       $input=$request->all();
    //    $input['name']=$input['name'].'_'."$time->day".'_'."$time->month".'_'."$time->year";
       $cargo->fill($input)->save();
       return redirect()->route('storekeeper_role.cargo.index');
    }

    
    public function destroy($id)
    {
        
    }
}
