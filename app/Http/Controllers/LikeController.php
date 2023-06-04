<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Participante;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\HttpException;

class LikeController extends Controller
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
        if($usuario->rol!=='participante'){
            return response()->json(["
            error"=>"no autorizado"],403);
        }

        $like = Like::create([
            'participante_id'=>$request->participante_id,
            'post_id'=>$request->post_id,
        ]);
        return response()->json(['Se Coloco el like ','Post' => $like]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $usuario=Auth::guard('sanctum')->user();
        if($usuario->rol!=='participante'){
            return response()->json(["
            error"=>"no autorizado"],403);
        }

        $like = Like::find($id)->delete();
        return response()->json([
            'messages'=>'Se Elimino con exito','like'=>$like
        ]);


    }
}
