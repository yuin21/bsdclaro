<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BsdDetalleVenta;
use App\Models\BsdPersonal;


class DetalleVentaApiController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->get('term');

        $prevData = BsdDetalleVenta::join("bsd_venta", "bsd_venta.id", "=", "bsd_detalle_venta.bsd_venta_id")
            ->join("bsd_plan", "bsd_plan.id", "=", "bsd_detalle_venta.bsd_plan_id")
            ->join("bsd_servicio", "bsd_servicio.id", "=", "bsd_detalle_venta.bsd_servicio_id")
            ->join("bsd_tipo_servicio", "bsd_tipo_servicio.id", "=", "bsd_detalle_venta.bsd_tipo_servicio_id")
            ->selectRaw('bsd_detalle_venta.id, bsd_tipo_servicio.nom_tipo_servicio, bsd_servicio.nom_servicio, bsd_plan.nombre_plan,
            bsd_detalle_venta.precio_plan, bsd_detalle_venta.cantidad ,bsd_detalle_venta.fecha_activado, bsd_detalle_venta.estado_linea, 
            bsd_detalle_venta.cf_sin_igv, bsd_detalle_venta.cf_con_igv')
            ->where('bsd_detalle_venta.estado', 1)->where('bsd_venta.id',$search)
            ->get();

        // $prevDataNumeros = BsdDetalleVenta::join("bsd_numero_linea_nueva", "bsd_numero_linea_nueva.bsd_detalle_venta_id", "=", "bsd_detalle_venta.id")
        // ->selectRaw('bsd_detalle_venta.id as dv_id, bsd_numero_linea_nueva.numero_linea_nueva')
        // ->where('bsd_numero_linea_nueva.estado', 1)->where('bsd_detalle_venta.estado', 1)->get();

        // // $ventas = [];
        $detallesventas = collect([]);

        foreach ($prevData as $data) {
            $detalleventa[] = [
                'id' => $data->id,
                'label' => $data->nom_tipo_servicio,
                'tiposervicio' => $data->nom_tipo_servicio,
                'servicio' => $data->nom_servicio,
                'plan' => $data->nombre_plan,
                'precioplan' => $data->precio_plan,
                'cantidad' => $data->cantidad,
                'estadolinea' => $this->getEstado_Linea($data->estado_linea),
                'fechaactivado' => $data->fecha_activado,
                'cf_sin_igv' => number_format($data->cf_sin_igv, 2),
                'cf_con_igv' => number_format($data->cf_con_igv,2),
            ];
            $detallesventas->push($detalleventa);
        }

        return $detallesventas;
    }
    public function getEstado_Linea($estadolinea){
        switch($estadolinea){
            case "P":
                return "Pendientes de Instalación";
            case "C":
                return "Créditos";
            case "A":
                return "Activo";
            case "R":
                return "Áreas";
            case "":
                return "";
            default:
                return "No existen valores";
        }
    }
}
