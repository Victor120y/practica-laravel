<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Listar todos los categorias
        $categorias = Categoria::select(
            "categorias.codigo",
            "categorias.nombre"
            
        )
        ->get();
        //dd($productso);
        //Mostra vista show.blade.php junto al listado de productos
        return view('/categoria/show')->with(['categorias'=>$categorias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('/categoria/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validad campos
        $data = request()->validate([
            'nombre'=> 'required',
            
        ]);

        //enviar insert
        Categoria::create($data);

        //Redireccionar
        return redirect('/categoria/show');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return view('categoria/update')->with(['categoria'=>$categoria]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        // Validar campos

        $data = request()->validate([
            'nombre'=> 'required',
            
        ]);


        // Reemplazamos datos anteriormente por los nuevos
        $categoria->nombre = $data['nombre'];
        $categoria->updated_at = now();

        // Enviar a guardar la actualizacion
        $categoria->save();

        //Redireccionar
        return redirect('/categoria/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Eliminar el producto con el id recibido
        Categoria::destroy($id);

        //Retornar una respuesta json return 
        response()->json(array('res'=>true));
    }
}
