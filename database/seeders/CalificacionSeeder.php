<?php

namespace Database\Seeders;

use App\Models\Calificacion;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CalificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = 2;
        $post_id = 1;
        for ($i = 1; $i <= 30; $i++) {
            for ($j = 2; $j <= 7; $j++) {
                $contenido = (fake()->randomFloat(2, 1, 10) * 0.30);
                $organizacion_estatica = (fake()->randomFloat(2, 1, 10) * 0.25);
                $creatividad = (fake()->randomFloat(2, 1, 10) * 0.20);
                $tecnica = (fake()->randomFloat(2, 1, 10) * 0.25);
                Calificacion::create([
                    "contenido" => $contenido,
                    "organizacion_estatica" => $organizacion_estatica,
                    "creatividad" => $creatividad,
                    "tecnica" => $tecnica,
                    "total" => $contenido + $organizacion_estatica + $creatividad + $tecnica,
                    "post_id" => $i,
                    "user_id" => $j
                ]);
                Post::find($i)->update(['estado'=>1]);
            }
            # code...
        }
        /* $contenido=(fake()->randomFloat(2, 1, 10)*0.30);
        $organizacion_estatica=(fake()->randomFloat(2, 1, 10)*0.25);
        $creatividad=(fake()->randomFloat(2, 1, 10)*0.20);
        $tecnica=(fake()->randomFloat(2, 1, 10)*0.25);
        Calificacion::create([
            "contenido" => $contenido,
            "organizacion_estatica"=>$organizacion_estatica,
            "creatividad"=>$creatividad,
            "tecnica"=>$tecnica,
            "total"=>$contenido+$organizacion_estatica+$creatividad+$tecnica,
            "post_id"=>$post_id,
            "user_id"=>$id
        ]); */
    }
}
