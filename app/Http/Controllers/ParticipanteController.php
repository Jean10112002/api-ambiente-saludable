<?php

namespace App\Http\Controllers;

use App\Models\Participante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $rulesParticipante=array(

        'id' => 'integer|exists:participantes,id',
        'cedula'=>'exists:participantes,cedula'
);
    public $mensajes=array(

        'id.integer' => 'Solo se aceptan numeros.',
        'id.exists' => 'Solo identificadores existentes.',
        'cedula.exists' => 'Solo cedulas existentes.',


    );
    public function index()
    {
        //
        $participante = Participante::all();
        return response()->json(['Participantes'=>$participante]);
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
     * @param  \App\Models\Participante  $participante
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $participante = Participante::with('Post','Post.Imagen','Post.Categoria')->find($id);
        if (!$participante) {
            return response()->json(['error' => 'Participante no encontrado'], 404);
        }

        return response()->json(['participante' => $participante]);

    }
    public function showByCedula(Request $request,$cedula)
    {
        //

        $participante = Participante::where('cedula', 'LIKE', '%' . $cedula . '%')->get();
        if ($participante->isEmpty()) {
            return response()->json(['error' => 'Ingrese un numero de cedula existente.'], 404);
        }

        return response()->json(['participante' => $participante]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Participante  $participante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participante $participante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participante  $participante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participante $participante)
    {
        //
    }
}
