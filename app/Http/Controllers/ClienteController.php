<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
      $ListaCliente=Cliente::where('estado','=','1')->get();
      return response()->json($ListaCliente);
    }
    public function store(Request $request){
        try{
            $cliente=new Cliente();
            $cliente->dni=$request->dni;
            $cliente->nombre=$request->nombre;
            $cliente->apellido=$request->apellido;
            $cliente->estado=1;
            $cliente->save();
            $result=[
            'dni'=>$cliente->dni,
            'nombre'=>$cliente->nombre,
            'apellido'=>$cliente->apellido,
            'created' => true];
            return $result;
        }
        catch(Exception $e){
            return "Error fatal - ".$e->getMessage();
        }
    }
    public function show($id)
    {
      return cliente::find($id);
    }
    public function update(Request $request, $id)
    {
        $cliente=Cliente::findOrFail($id);
        $cliente->update($request->all());
        return $cliente;
    }
    public function destroy($id){
        $cliente=Cliente::findOrFail($id);
        $cliente->delete();
        return 204;
    }
    public function delete($id) {
        $cliente=Cliente::findOrFail($id);
        $cliente->delete();
        return 204;
    }
    public function Listado(Request $request){
        $ListaCliente=Cliente::all();
        return response()->json($ListaCliente);
    }
}
