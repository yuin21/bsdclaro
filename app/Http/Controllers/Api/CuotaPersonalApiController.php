<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BsdCuotaPersonal;


class CuotaPersonalApiController extends Controller
{
    public function search(Request $request)
    {
        $searchpersonal = $request->get('per');
        $searchmes = $request->get('mes');
        $searchaño = $request->get('año');

        $data = BsdCuotaPersonal::join("bsd_cuota", "bsd_cuota.id", "=", "bsd_cuota_personal.bsd_cuota_id")
            ->selectRaw('bsd_cuota_personal.id, bsd_cuota.cuota, bsd_cuota_personal.mes, bsd_cuota_personal.año')
            ->where('bsd_cuota_personal.estado', 1)->where('bsd_cuota_personal.bsd_personal_id',$searchpersonal)
            ->where('bsd_cuota_personal.mes', $searchmes)->where('bsd_cuota_personal.año',$searchaño)
            ->get();

        $cuotas[] = [
            'id' => $data[0]->id,
            'label' => $data[0]->mes,
            'cuota' => $data[0]->cuota,
            'mes' => $data[0]->mes,
            'año' => $data[0]->año
        ];

        return $cuotas;
    }
}
