<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Branch; // agregamos nestra clase del modelo Branch donde tenemos la informacion de marcas
use App\Models\Product;
use App\Models\Cliente;
class ReportController extends Controller
{
    public function reporteUno()
    {
        //Extraer todos los productos
        $data = Product::select(
            "productos.codigo",
            "productos.nombre",
            "productos.precio",
            "marcas.nombre as marca"
        )
        ->join("marcas", "marcas.codigo", "=", "productos.marca")
        ->get();
        //cargar vista del reporte con la data
        $pdf = Pdf::loadView('/reports/report1', compact('data'));
        return $pdf->stream('productos.pdf');
    }

    public function reporteCliente()
    {
        //Extraer todos los clientes
        $data = Cliente::select(
            "clientes.codigo",
            "clientes.nombre",
            "clientes.edad",
            "categorias.nombre as categoria"
        )
        ->join("categorias", "categorias.codigo", "=", "clientes.categoria")
        ->get();
        //cargar vista del reporte con la data
        $pdf = Pdf::loadView('/reports/cliente', compact('data'));
        return $pdf->stream('clientes.pdf');
    }
}
