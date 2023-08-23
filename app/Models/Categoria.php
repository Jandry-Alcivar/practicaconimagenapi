<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;
    public $timestamps=false;

    protected $table = 'categorias';

    protected $fillable = ['Nombre_Categoria'];

    public function Productos():HasMany
    {

        return $this->hasMany(Producto::class,'categoria_id');
    }

}
