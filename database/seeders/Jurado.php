<?php

namespace Database\Seeders;

use App\Models\User as ModelsJurado;
use Illuminate\Database\Seeder;

class Jurado extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* ModelsJurado::create([
            "nombre"=>"",
            "apellido"=>"",
            "cedula"=>"",
            "email"=>"",
            "password"=>bcrypt('')
        ]);
        ModelsJurado::create([
            "nombre"=>"",
            "apellido"=>"",
            "cedula"=>"",
            "email"=>"",
            "password"=>bcrypt('')
        ]);
        ModelsJurado::create([
            "nombre"=>"",
            "apellido"=>"",
            "cedula"=>"",
            "email"=>"",
            "password"=>bcrypt('')
        ]);
        ModelsJurado::create([
            "nombre"=>"",
            "apellido"=>"",
            "cedula"=>"",
            "email"=>"",
            "password"=>bcrypt('')
        ]); */
        ModelsJurado::create([
            "nombre"=>"admin",
            "apellido"=>"admin",
            "cedula"=>"1313626440",
            "email"=>"admin@hotmail.com",
            "password"=>bcrypt('admin123'),
        "rol"=>"admin"]);
        ModelsJurado::create([
            "nombre"=>"jurado",
            "apellido"=>"juradoapellido",
            "cedula"=>"1312412220",
            "email"=>"jurado@hotmail.com",
            "password"=>bcrypt('jurado123'),
        "rol"=>"jurado"]);
    }
}
