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
    public function store(Request $request){
        try{
            $categoria=new Categoria();
            $categoria->descripcion=$request->descripcion;
            $categoria->estado=1;
            $categoria->save();
            $result=[
            'descripcion'=>$categoria->descripcion,
            'created' => true];
            return $result;
        }
        catch(Exception $e){
            return "Error fatal - ".$e->getMessage();
        }
    }
    public function show($id)
    {
      return categoria::find($id);
    }
    public function update(Request $request, $id)
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->update($request->all());
        return $categoria;
    }
    public function destroy($id){
        $categoria=Categoria::findOrFail($id);
        $categoria->delete();
        return 204;
    }
    public function delete($id) {
        $categoria=Categoria::findOrFail($id);
        $categoria->delete();
        return 204;
    }
    public function Listado(Request $request){
        $ListaCategoria=Categoria::all();
        return response()->json($ListaCategoria);
    }

}
