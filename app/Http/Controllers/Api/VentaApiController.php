<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BsdVenta;


class VentaApiController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->get('term');
        $searchfech = $request->get('fech');

        $prevDatas = BsdVenta::join("bsd_personal", "bsd_personal.id", "=", "bsd_venta.bsd_personal_id")
            ->join("bsd_cliente", "bsd_cliente.id", "=", "bsd_venta.bsd_cliente_id")
            ->selectRaw('bsd_personal.ape_paterno, bsd_personal.ape_materno, bsd_personal.nom_personal, CONCAT(bsd_personal.ape_paterno, " ", bsd_personal.ape_materno, " ", bsd_personal.nom_personal) as fullname, 
            bsd_personal.id as id_personal, bsd_venta.id, bsd_venta.estado_venta, bsd_venta.total, bsd_venta.sec, bsd_cliente.razon_social, bsd_cliente.ruc, Date_format(fecha_registro,"%Y-%m-%d") as fecha')
            ->where('bsd_venta.estado', 1)->where('bsd_personal.id',$search)
            ->get();

        $prevData = $prevDatas->where('fecha',$searchfech);
        //dd($prevData);
        // $ventas = [];
        $ventas = collect([]);

        foreach ($prevData as $data) {
            $venta[] = [
                'id' => $data->id,
                'label' => $data->fullname,
                'estadoventa' => $this->getEstado_Venta($data->estado_venta),
                'total' => number_format($data->total,2),
                'total_sin_igv' => round($data->total/ 1.18, 2),
                'razonsocial' => $data->razon_social,
                'ruc' => $data->ruc,
                'sec' => $data->sec,
            ];
            $ventas->push($venta);
        }

        return $ventas;
    }
    public function getEstado_Venta($estadoventa){
        switch($estadoventa){
            case "P":
                return "Pendiente";
            case "E":
                return "Enviado";
            case "C":
                return "Conforme";
            case "N":
                return "No Conforme";
            default:
                return "No existen valores";
        }
    }
}
