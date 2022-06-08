<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BsdVenta;

class HomeController extends Controller
{
    public function index(){
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
        
        return view('admin.index', compact('year', 'lastYear', 'ventas_currentYear', 'ventas_lastYear'));
    }
}
