<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Categoria extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'categorias';
    protected $fillable =['nombre'];

    public function Post(): HasOne
    {
        return $this->hasOne(Post::class);
    }

}
