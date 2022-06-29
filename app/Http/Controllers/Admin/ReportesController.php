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

    public function indexGraficas(){
        $year = date("Y");
        $lastYear = $year - 1;
        //$ventas_currentYear = BsdVenta::select('id', 'total', 'fecha_registro')->whereYear('fecha_registro', $year)->get();
        $ventas_currentYear = BsdVenta::select('bsd_venta.id', 'total','bsd_venta.estado',  'fecha_registro', 'bsd_personal_id', 'nom_personal', 'ape_paterno', 'ape_materno')
            ->join('bsd_personal', 'bsd_venta.bsd_personal_id', '=', 'bsd_personal.id')
            ->where('bsd_venta.estado', 1)
            ->whereYear('fecha_registro', $year)->get();
        $ventas_lastYear = BsdVenta::select('bsd_venta.id', 'total','bsd_venta.estado', 'fecha_registro', 'bsd_personal_id', 'nom_personal', 'ape_paterno', 'ape_materno')
            ->join('bsd_personal', 'bsd_venta.bsd_personal_id', '=', 'bsd_personal.id')
            ->where('bsd_venta.estado', 1)
            ->whereYear('fecha_registro', $lastYear)->get();

        return view('admin.reportes.index_Graficas', compact('year', 'lastYear', 'ventas_currentYear', 'ventas_lastYear'));
    }
}
