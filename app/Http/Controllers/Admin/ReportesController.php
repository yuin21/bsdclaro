<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BsdVenta;
use Barryvdh\DomPDF\Facade as PDF;
// use PDF;

class ReportesController extends Controller
{
    public function index_ventasDiarias(){
        return view('admin.reportes.index_ventasDiarias');
    }

    public function search(Request $request) {

      $bsd_venta = null;
      if ( $request->fecha_registro == null) {
        $bsd_venta = BsdVenta::where('estado', 1)
        ->where('estado_venta', $request->estado_venta)
        ->paginate(15);
      } else  {
        $bsd_venta = BsdVenta::where('estado', 1)
        ->where('estado_venta', $request->estado_venta)
        ->whereDate('fecha_registro', $request->fecha_registro)
        ->paginate(15);
      }
      
      return view('admin.reportes.index_ventasDiarias', compact('bsd_venta', 'request'));
    }

    public function generatePDF(BsdVenta $venta)
    {
        $pdf = PDF::loadView('admin.reportes.reportes.pdf_venta', compact('venta'));
        return $pdf->download('venta.pdf');       
    }
}
