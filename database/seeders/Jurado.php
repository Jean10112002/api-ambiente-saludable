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
            "nombre"=>"jurado1",
            "apellido"=>"jurado1apellido",
            "cedula"=>"1312412220",
            "email"=>"jurado1@hotmail.com",
            "password"=>bcrypt('jurado123'),
        "rol"=>"jurado"]);
        ModelsJurado::create([
            "nombre"=>"jurado2",
            "apellido"=>"jurado2apellido",
            "cedula"=>"13124122220",
            "email"=>"jurado2@hotmail.com",
            "password"=>bcrypt('jurado123'),
        "rol"=>"jurado"]);
        ModelsJurado::create([
            "nombre"=>"jurado3",
            "apellido"=>"jurado3apellido",
            "cedula"=>"131232220",
            "email"=>"jurado3@hotmail.com",
            "password"=>bcrypt('jurado123'),
        "rol"=>"jurado"]);
        ModelsJurado::create([
            "nombre"=>"jurado4",
            "apellido"=>"jurado4apellido",
            "cedula"=>"1312413044",
            "email"=>"jurado4@hotmail.com",
            "password"=>bcrypt('jurado123'),
        "rol"=>"jurado"]);
        ModelsJurado::create([
            "nombre"=>"jurado5",
            "apellido"=>"jurado5apellido",
            "cedula"=>"131245220",
            "email"=>"jurado5@hotmail.com",
            "password"=>bcrypt('jurado123'),
        "rol"=>"jurado"]);
        ModelsJurado::create([
            "nombre"=>"jurado6",
            "apellido"=>"jurado6apellido",
            "cedula"=>"1316220",
            "email"=>"jurado6@hotmail.com",
            "password"=>bcrypt('jurado123'),
        "rol"=>"jurado"]);
        ModelsJurado::create([
            "nombre"=>"participante",
            "apellido"=>"participante1",
            "cedula"=>"131622123123210",
            "email"=>"participante@hotmail.com",
            "password"=>bcrypt('participante123'),
        "rol"=>"participante"]);
    }
}
