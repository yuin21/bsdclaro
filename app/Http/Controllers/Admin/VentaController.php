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

class VentaController extends Controller
{
    public function __construct()
    {
        // $this->middleware('can:admin.cuotas.index');
    }

    public function index()
    {
        $ventas = BsdVenta::paginate(15);
        return view('admin.ventas.index', compact('ventas'));
    }

    public function create()
    {
        $tiposservicio = BsdTipoServicio::where('estado', 1)->get();
        $planes = BsdPlan::where('estado', 1)->get();
        $servicios = BsdServicio::where('estado', 1)->get();
        return view('admin.ventas.create', compact('tiposservicio', 'planes', 'servicios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_contrato' => 'required',
            'bsd_personal_id' => 'required',
            'bsd_cliente_id'=> 'required',
            'tiposServicio' => 'required',
            'servicios' => 'required',
            'planes' => 'required',
            'precioplanes' => 'required',
            'cantidades' => 'required',
            'total' => 'required'
        ]);

        // datos de los detalle de venta
        $tiposServicio = $request->get('tiposServicio');
        $servicios = $request->get('servicios');
        $planes = $request->get('planes');
        $precioplanes = $request->get('precioplanes');
        $cantidades = $request->get('cantidades');
        $subtotales_igv = $request->get('subtotales_igv');
        $subtotales_sinigv = $request->get('subtotales_sinigv');
        $numerosLineasNuevas = $request->get('numerosLineasNuevas');

        // try {
        //     DB::beginTransaction();
            // 1. registrar venta
            $venta = BsdVenta::create($request->all());
            // 2. registrar detalles de venta
            for ($i=0; $i < count($tiposServicio); $i++) {
                $detalleventa = new BsdDetalleVenta();
                $detalleventa->bsd_venta_id = $venta->id;
                $detalleventa->bsd_plan_id = $planes[$i];
                $detalleventa->bsd_servicio_id = $servicios[$i];
                $detalleventa->bsd_tipo_servicio_id = $tiposServicio[$i];
                $detalleventa->cantidad = $cantidades[$i];
                $detalleventa->precio_plan = $precioplanes[$i];
                $detalleventa->cf_con_igv = $subtotales_igv[$i];
                $detalleventa->cf_sin_igv = $subtotales_sinigv[$i];
                $detalleventa->save();

                // 3. registrar numeros de linea nueva
                $numeros = explode(',', $numerosLineasNuevas[$i]);
                for ($j=0; $j < count($numeros); $j++) {
                    $numerolineanueva = new BsdNumeroLineaNueva();
                    $numerolineanueva->bsd_detalle_venta_id = $detalleventa->id;
                    $numerolineanueva->numero_linea_nueva = trim($numeros[$j]);
                    $numerolineanueva->save();
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
}
