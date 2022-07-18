<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BsdPersonal;
use App\Models\BsdServicio;
use Illuminate\Http\Request;
use App\Models\BsdVenta;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

// use PDF;

class ReportesController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:adminlte.reportes');
    }

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

    public function index_ventasConsultor(){
        $bsd_personal = BsdPersonal::where('estado', 1)->orderBy('nom_personal')->get();
        $personal = $bsd_personal->pluck('PersonalFullName', 'id');

        return view('admin.reportes.index_ventasConsultor', compact('personal'));
    }

    public function searchConsultor(Request $request) {
        $bsd_personal = BsdPersonal::where('estado', 1)->orderBy('nom_personal')->get();
        $personal = $bsd_personal->pluck('PersonalFullName', 'id');
      //  dd($request);

      $bsd_venta = null;
      if ( $request->fecha_registro == null) {
        $bsd_venta = BsdVenta::where('estado', 1)
        ->where('estado_venta', $request->estado_venta)
        ->where('bsd_personal_id',$request->personal)
        ->paginate(15);
      } else  {
        $bsd_venta = BsdVenta::where('estado', 1)
        ->where('estado_venta', $request->estado_venta)
        ->whereDate('fecha_registro', $request->fecha_registro)
        ->where('bsd_personal_id',$request->personal)
        ->paginate(15);
      }
      //dd($bsd_venta);
      return view('admin.reportes.index_ventasConsultor', compact('bsd_venta', 'request','personal'));
    }

    public function index_ventas(){
        $bsd_servicio = BsdServicio::where('estado', 1)->orderBy('nom_servicio')->get();
        //dd($bsd_servicio);
        $bsd_personal = BsdPersonal::where('estado', 1)->orderBy('nom_personal')->get();
        $personal = $bsd_personal->pluck('PersonalFullName', 'id');
        $servicios = [];
        foreach($bsd_servicio as $servicio){
            $servicios[] = [$servicio->id];
        }
        $personales = [];
        foreach($bsd_personal as $personal){
            $personales[] = [$personal->id];
        }
        //dd($personales);
        $total_servicio = [];
        foreach($personales as $id_personal){
            foreach($servicios as $id_servicio){
                $total_servicio[] = [DB::select('CALL sp_contarServicios(?,?)', [$id_servicio[0],$id_personal[0]])];
            }
        }
        dd($total_servicio);
        return view('admin.reportes.index_ventas', compact('personal'));
    }
}
