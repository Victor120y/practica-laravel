<?php

namespace App\Http\Controllers;
use App\Models\Branch; // agregamos nestra clase del modelo Branch donde tenemos la informacion de marcas
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Listar todos los productos
        $productos = Product::select(
            "productos.codigo",
            "productos.nombre",
            "productos.precio",
            "marcas.nombre as marca"
        )
        ->join("marcas", "marcas.codigo", "=", "productos.marca")
        ->get();
        //dd($productso);
        //Mostra vista show.blade.php junto al listado de productos
        return view('/products/show')->with(['productos'=>$productos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Listar marcas para llenar select
        $marcas = Branch::all();

        // Mostra vista create.blade.php junto al listado de marcas
        return view('/products/create')->with(['marcas'=>$marcas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validad campos
        $data = request()->validate([
            'nombre'=> 'required',
            'precio'=> 'required',
            'marca'=> 'required'
        ]);

        //enviar insert
        Product::create($data);

        //Redireccionar
        return redirect('/products/show');

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
    public function edit(Product $product)
    {
        // Lsitar marcas para llenar select
        $marcas = Branch::all();

        //Mostrar vista update.blade.php junto al listado de marcas
        return view('products/update')->with(['producto'=>$product,'marcas'=>$marcas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Validar campos

        $data = request()->validate([
            'nombre'=> 'required',
            'precio'=> 'required',
            'marca'=> 'required'
        ]);


        // Reemplazamos datos anteriormente por los nuevos
        $product->nombre = $data['nombre'];
        $product->precio = $data['precio'];
        $product->marca = $data['marca'];
        $product->updated_at = now();

        // Enviar a guardar la actualizacion
        $product->save();

        //Redireccionar
        return redirect('/products/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    //public function destroy(string $id)
    public function destroy($id)
    {
        //Eliminar el producto con el id recibido
        Product::destroy($id);

        //Retornar una respuesta json return
        response()->json(array('res'=>true));
    }
}
