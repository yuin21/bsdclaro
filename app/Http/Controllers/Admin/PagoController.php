<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BsdPago;
use App\Models\BsdVenta;
use App\Models\BsdCuotaPersonal;
use App\Models\BsdDetallePago;
use App\Models\BsdDetalleVenta;
use App\Models\BsdTipoServicio;
use App\Models\BsdServicio;
use App\Models\BsdPlan;
use Illuminate\Http\Request;

class PagoController extends Controller
{

    public function index()
    {
        $bsd_pago = BsdPago::where('estado', 1)->paginate(15);
        return view('admin.pagos.index', compact('bsd_pago'));
    }

    public function create()
    {
        $ventas = BsdVenta::where('estado', 1)->get();
        $cuotaspersonal = BsdCuotaPersonal::where('estado', 1)->get();
        $detallesventas = BsdDetalleVenta::where('estado', 1)->get();

        return view('admin.pagos.create', compact('ventas', 'cuotaspersonal','detallesventas'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'bsd_cuota_personal_id' => 'required',
            'bsd_venta_id' => 'required',
            'porcentaje_comision' => 'required|numeric',
            'comision_consultor' => 'required|numeric',
            'estado_carpeta' => 'required',
            'pago_1er_recibo' => 'required',
            'pago_dace' => 'required',
            'abono_consultor' => 'required',
            //'total_pago' => 'required',
            'porcentaje_cump_dic' => 'required',
            'sum_total_ventas' => 'required',
            'sum_renta_total_ventas' => 'required',
            'sum_comision_bruta_dace' => 'required',
        ]);

        // datos de los detalle de pagos
        $ventas = $request->get('bsd_venta_id');
        $detalleventas = $request->get('detalleventa');
        $cuota = $request->get('cuotas');
        $comision_consultor = $request->get('ComisionConsultores');
        $sub_total = $request->get('SubTotales');

        $porcentaje_cump_dic = $request->get('porcentaje_cump_dic');
        $sum_total_ventas = $request->get('sum_total_ventas');
        $total_pago = $porcentaje_cump_dic*$sum_total_ventas;

        // 1. registrar pago
        $pago = BsdPago::create($request->all() + ['total_pago' => $total_pago]);
        // 2. registrar detalles de pago
        //dd($request);
        for ($i=0; $i < count($detalleventas); $i++) {
            $detallepago = new BsdDetallePago();
            $detallepago->bsd_pago_id = $pago->id;
            $detallepago->bsd_venta_id = $ventas;
            $detallepago->bsd_detalle_venta_id = $detalleventas[$i];
            $detallepago->cuota = $cuota[$i];
            $detallepago->comision_consultor = $comision_consultor[$i];
            $detallepago->sub_total = $sub_total[$i];
            $detallepago->save();
        }
        return redirect()->route('admin.pagos.show', $pago)->with('success','store');
    }

    public function show(BsdPago $pago)
    {
        return view('admin.pagos.show', compact('pago'));
    }

    public function edit(BsdPago $pago)
    {
        //
    }

    public function update(Request $request, BsdPago $bsdPago)
    {
        //
    }

    public function destroy(BsdPago $bsdPago)
    {
        //
    }
}
