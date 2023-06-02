<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public $rulesPost=array(

        'titulo' => 'required',
        'descripcion'=>'required|string|max:100',
        'lugar'=> 'required',
        'ciudad'=>'required',
        'fecha'=>'required|date',
        'imagen_id'=>'required',
        'categoria_id'=>'required',
        'participante_id'=>'required',
);
    public $mensajes=array(

        'titulo.required' => 'Se requiere un titulo.',
        'descripcion.required' => 'Se requiere una descripcion breve.',
        'descripcion.string' => 'Solo se acepta texto.',
        'descripcion.max' => 'Solo se permite 100 palabras.',
        'lugar.required' => 'Se requiere el lugar.',
        'ciudad.required'=>'Se requiere la ciudad',
        'fecha.required'=>'Se requiere la fecha',
        'fecha.date'=>'Se requiere una fecha de acuerdo al formato año/mes/dia.',
        'imagen_id.required'=>'Se requiere el id de imagen',
        'categoria_id.required'=>'Se requiere el id de la categoria',
        'participante_id.required'=>'Se requiere el id del participante',



    );
    public function index()
    {
        //
        $posts = Post::paginate(10);
        return response()->json(['Posts'=>$posts]);
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

        $validator= Validator::make($request->all(),$this->rulesPost,$this->mensajes);
        if($validator -> fails()){
            $messages=$validator->getMessageBag();
            return response()->json([
                'messages'=>$messages
            ],500);
        };



        $posts = Post::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'lugar' => $request->lugar,
            'ciudad' => $request->ciudad,
            'fecha' => $request->fecha,
            'estado' => $request->estado,
            'imagen_id' => $request->imagen_id,
            'categoria_id' => $request->categoria_id,
            'participante_id' =>$request->participante_id ,
        ]);

        return response()->json(['Se ingreso el Post con exito','Post' => $posts]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $post = Post::find($id)->delete();
        return response()->json([
            'messages'=>'Se Elimino con exito'
        ]);

    }
}
