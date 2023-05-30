<?php

namespace Database\Seeders;

use App\Models\Participante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class CsvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $excelFile = public_path('seeds/data.xlsx'); // Ruta al archivo Excel

        $spreadsheet = IOFactory::load($excelFile);
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();
        array_shift($rows);
        foreach ($rows as $row){
            Participante::create([
                "nombres"=>$row[1],
                "cedula"=>$row[2],
                "email"=>$row[3],
                "semestre"=>$row[4],
                "telefono"=>$row[6],
            ]);
        }
    }
}
