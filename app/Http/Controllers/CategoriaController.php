<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class CategoriaController extends Controller
{

    public function index()
    {
        $categoria=Categoria::all();
        return response()->json(['categorias'=> $categoria]);
    }

    public function store(Request $request)
    {
     $categoria=Categoria::create
     ([ 'Nombre_Categoria'=>$request->Nombre_Categoria]);
     return response()->json(['Se creo Sastifatoriamente']);
    }

    public function show($id)
    {
        $categoria=Categoria::find($id);
        return response()->json(['Categoria'=>$categoria]);
    }
    public function update(Request $request,$id)
    {
        $categoria=Categoria::find($id);
        $categoria->update(['Nombre_Categoria'=>$request->Nombre_Categoria]);
        return response()->json(['Se actualizo Sastifatoriamente']);
    }

    public function destroy($id)
    {
        $categoria=Categoria::find($id)->delete();
        return response()->json(['Se elemino Sastifatoriamente']);

    }
}
