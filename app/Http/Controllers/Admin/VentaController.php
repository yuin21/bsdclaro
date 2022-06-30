<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BsdVenta;
use App\Models\BsdDetalleVenta;
use App\Models\BsdTipoServicio;
use App\Models\BsdPlan;
use App\Models\BsdServicio;
use App\Models\BsdNumeroLineaNueva;
use App\Models\BsdCliente;
use App\Models\BsdEstadoLinea;

class VentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.ventas.index');
    }

    public function index()
    {
        $bsd_venta = BsdVenta::where('estado', 1)->paginate(15);
        return view('admin.ventas.index', compact('bsd_venta'));
    }

    public function create()
    {
        $tiposservicio = BsdTipoServicio::where('estado', 1)->get();
        $planes = BsdPlan::where('estado', 1)->get();
        $servicios = BsdServicio::where('estado', 1)->get();
        $estadoslinea = BsdEstadoLinea::where('estado', 1)->get();
        return view('admin.ventas.create', compact('tiposservicio', 'planes', 'servicios', 'estadoslinea'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'tipo_contrato' => 'required|max:20',
            'bsd_personal_id' => 'required',
            'tiposServicio' => 'required',
            'servicios' => 'required',
            'planes' => 'required',
            'precioplanes' => 'required',
            'cantidades' => 'required',
            'equipoproducto' => 'required|max:30',
            'total' => 'required',
            'razon_social' => 'required',
            'sot' => 'nullable|numeric',
            'sec' => 'required|numeric',
            'observacion' => 'nullable|max:350',
            'salesforce' => 'required',
            'estado_venta' => 'required',
            'nro_oportunidad' => 'required|string|max:18',
            'solicitud'=>'max:50',
            'avance_oportunidad' => 'required',
            'nro_proyecto' => 'nullable|numeric'
            //'fecha_oportunidad_ganada'=>'required',
            //'fecha_conforme' => 'required',
            //'fecha_avance_oportunidad' => 'required'
        ]);
        //dd($request);

        // datos de los detalle de venta
        $tiposServicio = $request->get('tiposServicio');
        $servicios = $request->get('servicios');
        $planes = $request->get('planes');
        $precioplanes = $request->get('precioplanes');
        $cantidades = $request->get('cantidades');
        $equipoproducto = $request->get('equipoproducto');
        $subtotales_igv = $request->get('subtotales_igv');
        $subtotales_sinigv = $request->get('subtotales_sinigv');
        $numerosLineasNuevas = $request->get('numerosLineasNuevas');
        //Datos nulos de los detalles de venta
        $operador = $request->get('operador');
        $estado_linea = $request->get('estado_linea');
        $fecha_activado = $request->get('fechaactivado');
        //$fecha_liquidado = $request->get('fechaliquidado');
        //$status_100_por = $request->get('status_100_por');
        //$numero_proyecto = $request->get('numero_proyecto');
        //$fecha_instalacion = $request->get('fechainstalacion');
        $hora = $request->get('horas');

        // try {
        //     DB::beginTransaction();

            // 0. registra cliente
            // cuando no se encuentra en la BD se trae los datos de SUNAT: RUC y razon social
            if (!isset($request->bsd_cliente_id)) {
                $cliente= new BsdCliente();
                $cliente->ruc = $request->searchCliente; // searchCliente contiene el ruc del cliente
                $cliente->razon_social = $request->razon_social;
                $cliente->save();
                $request->merge(['bsd_cliente_id' => $cliente->id]);
            }
            // 1. registrar venta
            $venta = BsdVenta::create($request->all());
            // 2. registrar detalles de venta
            //dd($request);
            for ($i=0; $i < count($tiposServicio); $i++) {
                $detalleventa = new BsdDetalleVenta();
                $detalleventa->bsd_venta_id = $venta->id;
                $detalleventa->bsd_plan_id = $planes[$i];
                $detalleventa->bsd_servicio_id = $servicios[$i];
                $detalleventa->bsd_tipo_servicio_id = $tiposServicio[$i];
                $detalleventa->cantidad = $cantidades[$i];
                $detalleventa->equipo_producto = $equipoproducto[$i];
                $detalleventa->precio_plan = $precioplanes[$i];
                $detalleventa->cf_con_igv = $subtotales_igv[$i];
                $detalleventa->cf_sin_igv = $subtotales_sinigv[$i];
                // //campos nulos
                $detalleventa->operador = $operador[$i];
                $detalleventa->bsd_estado_linea_id = $estado_linea[$i];
                $detalleventa->fecha_activado = $fecha_activado[$i];
                //$detalleventa->fecha_liquidado = $fecha_liquidado[$i];
                //$detalleventa->status_100_por = $status_100_por[$i];
                //$detalleventa->numero_proyecto = $numero_proyecto[$i];
                //$detalleventa->fecha_instalacion = $fecha_instalacion[$i];
                $detalleventa->hora = $hora[$i];
                $detalleventa->save();

                // 3. registrar numeros de linea nueva
                $numeros = explode(',', $numerosLineasNuevas[$i]);
                //dd($numeros);
                for ($j=0; $j < count($numeros); $j++) {
                    if($numeros[$j] != '' || $numeros[$j] != null){
                    $numerolineanueva = new BsdNumeroLineaNueva();
                    $numerolineanueva->bsd_detalle_venta_id = $detalleventa->id;
                    $numerolineanueva->numero_linea_nueva = trim($numeros[$j]);
                    $numerolineanueva->save();
                    }
                }

            }
        //     DB::commit();
        // } catch (\Throwable $th) {
        //     DB::rollback();
        // }
        return redirect()->route('admin.ventas.show', $venta)->with('success','store');
    }

    public function show(BsdVenta $venta)
    {
        return view('admin.ventas.show', compact('venta'));
    }

    public function tracking(BsdVenta $venta)
    {
        return view('admin.ventas.tracking', compact('venta'));
    }

    public function trackingUpdate(Request $request, BsdVenta $venta) {
        $venta->nro_oportunidad = $request->nro_oportunidad;
        $venta->fecha_avance_oportunidad = $request->fecha_avance_oportunidad;
        $venta->fecha_oportunidad_ganada = $request->fecha_oportunidad_ganada;
        $venta->avance_oportunidad = $request->avance_oportunidad;
        $venta->fecha_entrega = $request->fecha_entrega;
        $venta->fecha_conforme = $request->fecha_conforme;
        $venta->estado_venta = $request->estado_venta;
        $venta->observacion = $request->observacion;

        $venta->save();
        return redirect()->route('admin.ventas.tracking', $venta)->with('success', 'update');
    }

    public function indextrash()
    {
        $bsd_venta = BsdVenta::where('estado', 0)->get();
        return view('admin.ventas.indextrash', compact('bsd_venta'));
    }


    public function destroyLogico(BsdVenta $ventas)
    {
        //dd($venta);
        $ventas->estado = 0;
        $ventas->save();
        return redirect()->route('admin.ventas.index')->with('success','destroyLogico');
    }

    public function restaurarVenta(BsdVenta $ventas)
    {
        $ventas->estado = 1;
        $ventas->save();
        return redirect()->route('admin.ventas.indextrash')->with('success','restaurar');
    }
}
