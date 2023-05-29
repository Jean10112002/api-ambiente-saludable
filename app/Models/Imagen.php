<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Imagen extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'imagens';
    protected $fillable =['id_imagen','imagen_url','imagen'];


    public function Post(): HasOne
    {
        return $this->hasOne(Post::class);
    }
}

