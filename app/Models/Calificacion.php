<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Calificacion extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ='calificaciones';
    protected $fillable = ['total','contenido','organizacion_estatica','creatividad','tecnica','post_id','jurado_id'];

    public function Jurado(): BelongsTo
    {
        return $this->belongsTo(Jurado::class);
    }
    public function Post():BelongsTo{
        return $this->belongsTo(Post::class);
    }
}
