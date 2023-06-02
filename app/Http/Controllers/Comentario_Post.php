<?php

namespace App\Http\Controllers;

use App\Models\Comentario_Post as ComentarioModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Comentario_Post extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $usuario=Auth::guard('sanctum')->user();
        $comentario =ComentarioModel::create([
            'fecha'=>$request->fecha,
            'comentario_id'=>$request->comentario_id,
            'participante_id'=>$usuario->id,
            'post_id'=>$request->post_id,
        ]);
        return response()->json(['messages'=>'Se creo  con exito.','comentario'=> $comentario]);
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
