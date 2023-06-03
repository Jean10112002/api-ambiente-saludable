<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Validator;

class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public $rulesImagenes=array(

        'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:24000',
);
    public $mensajes=array(

        'imagen.required' => 'Se requiere una imagen.',
        'imagen.image' => 'Solo se permite imagenes.',
        'imagen.mimes' => 'Tipo de imagen no valido.',
        'imagen.max' => 'Esta imagen supero el tamaño de envio.',


    );
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
        $validator= Validator::make($request->all(),$this->rulesImagenes,$this->mensajes);
        if($validator -> fails()){
            $messages=$validator->getMessageBag();
            return response()->json([
                'messages'=>$messages
            ],500);
        }
        $file = request()->file('imagen');
        $obj = Cloudinary::upload($file->getRealPath(),['folder'=>'AmbienteSaludable']);
        $imagen_id = $obj->getPublicId();
        $url = $obj->getSecurePath();

        $imagen = Imagen::create([

            'imagen_url'=>$url,
            'id_imagen'=>$imagen_id,

        ]);
        return response()->json(['messages'=>'Se creo una la imagen con exito.','imagen'=> $imagen]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function show(Imagen $imagen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imagen $imagen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imagen $imagen)
    {
        //


    }
}
