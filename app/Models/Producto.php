<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $table = 'productos';

    protected $fillable =
    [
        'nombreProducto',
        'precioProducto',
        'imagenesId',
        'imagenesRuc',
        'categoria_id'
    ];

    public function Categoria():BelongsTo
    {
        return $this->belongsTo(Categoria::class,'categoria_id');
    }




}
