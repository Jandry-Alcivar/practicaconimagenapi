<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProductoController extends Controller
{

    public function index()
    {
        $producto=Producto::with('Categoria')->get();
        return response()->json(['producto' => $producto]);

    }

    public function store(Request $request)
    {
        $file = request()->file('imagen');
        $obj = Cloudinary::upload($file->getRealPath(),['folder'=>'imagenesPractica']);
        $imagen_id = $obj->getPublicId();
        $url = $obj->getSecurePath();

    $producto=Producto::create([
        'nombreProducto'=>$request->nombreProducto,
        'precioProducto'=>$request->precioProducto,
        'imagenesId'=>$imagen_id,
        'imagenesRuc'=>$url,
        'categoria_id'=>$request->categoria_id
    ]);

    return response()->json(['Mensaje'=>'Creado Sastifatoriamente']);
    }
    public function show($id)
    {
        $producto=Producto::find($id);
        return response()->json(['Producto'=>$producto]);
    }
    public function update(Request $request,$id)
    {
        $imagenes = Producto::find($id);
        $url = $imagenes->imagenesRuc;
        $imagen_id = $imagenes->imagenesId;
        if($request->hasFile('imagen')){
            Cloudinary::destroy($imagen_id);
            $file = request()->file('imagen');
            $obj = Cloudinary::upload($file->getRealPath(),['folder'=>'imagenesPractica']);
            $url = $obj->getSecurePath();
            $public_id = $obj->getPublicId();
        }

        $imagenes->update([
            'nombreProducto'=>$request->nombreProducto,
            'precioProducto'=>$request->precioProducto,
            'imagenesId'=>$imagen_id,
            'imagenesRuc'=>$url,
            'categoria_id'=>$request->categoria_id
        ]);
            return response()->json(['Mensaje'=>'Actualizado Correctamente']);
    }

    public function destroy($id)
    {
        $imagen = Producto::find($id);
        $imagen_id = $imagen->imagenesId;
        Cloudinary::destroy($imagen_id);
        Producto::destroy($id);

        return response()->json([
            'messages'=>"Se elimino correctamente"
        ]);
    }
}
