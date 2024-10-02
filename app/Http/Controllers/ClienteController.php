<?php

namespace App\Http\Controllers;
use App\Models\Categoria; // agregamos nestra clase del modelo Branch donde tenemos la informacion de categorias
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Listar todos los Clientes
        $clientes = Cliente::select(
            "clientes.codigo",
            "clientes.nombre",
            "clientes.edad",
            "categorias.nombre as categoria"
        )
        ->join("categorias", "categorias.codigo", "=", "clientes.categoria")
        ->get();
        //dd($productso);
        //Mostra vista show.blade.php junto al listado de clientes
        return view('/cliente/show')->with(['clientes'=>$clientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Listar categorias para llenar select
        $categorias = Categoria::all();

        // Mostra vista create.blade.php junto al listado de categorias
        return view('/cliente/create')->with(['categorias'=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validad campos
        $data = request()->validate([
            'nombre'=> 'required',
            'edad'=> 'required',
            'categoria'=> 'required'
        ]);

        //enviar insert
        Cliente::create($data);

        //Redireccionar
        return redirect('/cliente/show');
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
    public function edit(Cliente $cliente)
    {
        // Lsitar categorias para llenar select
        $categorias = Categoria::all();

        //Mostrar vista update.blade.php junto al listado de categorias
        return view('cliente/update')->with(['cliente'=>$cliente,'categorias'=>$categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        // Validar campos

        $data = request()->validate([
            'nombre'=> 'required',
            'edad'=> 'required',
            'categoria'=> 'required'
        ]);


        // Reemplazamos datos anteriormente por los nuevos
        $cliente->nombre = $data['nombre'];
        $cliente->edad = $data['edad'];
        $cliente->categoria = $data['categoria'];
        $cliente->updated_at = now();

        // Enviar a guardar la actualizacion
        $cliente->save();

        //Redireccionar
        return redirect('/cliente/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Eliminar el producto con el id recibido
        Cliente::destroy($id);

        //Retornar una respuesta json return
        response()->json(array('res'=>true));
    }
}
