<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
      $ListaCategoria=Categoria::where('estado','=','1')->get();
      return response()->json($ListaCategoria);
    }

}
