<?php

namespace App\Http\Controllers\Barn\Storekeeper\Cargo;

use App\Models\CargoModel;
use Illuminate\Http\Request;
use App\Models\ProviderModel;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\Barn\Kadr\Cargo\CargoEditRequest;
use App\Http\Requests\Barn\Kadr\Cargo\CargoCreateRequest;

class CargoController extends Controller
{
   
    public function index()
    {
        $cargos=CargoModel::with('get_provider')->orderBy('created_at', 'DESC')->paginate(15);
        // dd($cargos);
        return view('barn.storekeep.cargo.index',compact('cargos'));
    }

    public function create()
    {

        $providers=ProviderModel::all();
        // dd($providers);
        return  view('barn.storekeep.cargo.create',compact('providers'));
    }

    
    public function store(CargoCreateRequest $request)
    {
        // dd(1);
        $filenameWithExt = $request->file('file_name')->getClientOriginalName();
  
        
        $put="public/files";
       
        $path = $request->file('file_name')->storeAs($put,$filenameWithExt);

        // dd($filenameWithExt);
        // $time=Carbon::now();
        $data=$request->all();
        // $data['name']=$data['name'].'_'."$time->day".'_'."$time->month".'_'."$time->year";
        // dd($data['name']);
        // dd($request->come_date); 
        $data['file_name']=$filenameWithExt;
        // dd($data['file_name']);    
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

   
    public function update(CargoEditRequest $request,CargoModel $cargo )
    {

        $filenameWithExt = $request->file('file_name')->getClientOriginalName();
        // dd($filenameWithExt);
        
        $put="public/files";
       
        $path = $request->file('file_name')->storeAs($put,$filenameWithExt);
    //    $time=Carbon::now();
       $input=$request->all();
       $input['file_name']=$filenameWithExt;
    //    $input['name']=$input['name'].'_'."$time->day".'_'."$time->month".'_'."$time->year";
       $cargo->fill($input)->save();
       return redirect()->route('storekeeper_role.cargo.index');
    }

    
    public function switch_cargo(Request $request)
    {
       $cargo=CargoModel::where('id','=',$request->id)->first();
       if ($cargo->active_status==1) {
            $cargo_update=CargoModel::find($request->id)->update(['active_status'=>0]);
       } else {
            $cargo_update=CargoModel::find($request->id)->update(['active_status'=>1]);
       }
        
       return response()->json([
        'responses' => 1,
    ]);
    }

    public function destroy($id){
        $cargo=CargoModel::find($id)->delete();
        return to_route('storekeeper_role.cargo.index');
    }

    
}
