<?php

namespace Database\Seeders;

use App\Models\Calificacion;
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
        $id=1;
        $post_id=1;
        $datos=[
            'id'=>$id,
            'post_id'=>$post_id
        ];
        // 4 calificaciones por cada post
        Calificacion::factory(30)->create($datos);
    }
}
