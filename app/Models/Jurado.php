<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Sanctum\HasApiTokens;

class Jurado extends Model
{
    use HasFactory;
    use HasApiTokens;
    public $timestamps = false;
    protected $table ='jurados';
    protected $fillable =['nombre','apellido','cedula','email','password'];

    public function Calificacion(): HasOne
    {
        return $this->hasOne(Calificacion::class);
    }
}
