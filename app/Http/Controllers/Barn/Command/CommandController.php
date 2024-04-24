<?php

namespace App\Http\Controllers\Barn\Command;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CommandModel;

class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if ($order_id==1) {
        //     $commands=CommandModel::where('order_id','=',$order_id)->paginate(10);
        //     return view('barn.kadr.command.index_for_dep',compact('commands'));
        // } else {
        //     $commands=CommandModel::with(['get_old_career','get_new_career','get_com_career_file'])->where('order_id','=',$order_id)->paginate(10);
        //     // dd($commands);
        //     return view('barn.kadr.command.index_for_career',compact('commands'));
        // }
        $commands=CommandModel::with(['get_old_job','get_new_job'])->paginate(10);
        // dd($commands);
        return view('barn.kadr.command.index_for_career',compact('commands'));
        // $commands=CommandModel::where('order_id','=',1)->paginate(10);
        // return view('barn.kadr.command.index',compact('commands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
