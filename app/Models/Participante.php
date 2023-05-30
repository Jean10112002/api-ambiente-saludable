<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Participante extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'participantes';
    protected $fillable =['nombres','apellido','cedula','email','semestre','telefono'];

    public function Post(){
        return $this->hasMany(Post::class);
    }
    public function Cometario_Post(){
        return $this->hasMany(Cometario_Post::class);
    }
    public function Like(){
        return $this->hasMany(Like::class);
    }
}
