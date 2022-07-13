<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\bsdEstadoLinea;
use App\Models\BsdTipoServicio;
use Illuminate\Http\Request;

class EstadoLineaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.estado_linea.index');
    }

    public function index()
    {
        return view('admin.estado_linea.index');
    }


    public function create()
    {
        $tiposervicios = BsdTipoServicio::pluck('nom_tipo_servicio', 'id');
        return view('admin.estado_linea.create', compact('tiposervicios'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'bsd_tipo_servicio_id' => 'required',
            'nombre_estado_linea' => 'required|string|max:120'
        ]);

        $estado_linea = BsdEstadoLinea::create($request->all() + ['usuario_reg' => auth()->user()->name]);

        return redirect()->route('admin.estado_linea.show', $estado_linea)->with('success','store');
    }


    public function show (BsdEstadoLinea $estado_linea)
    {
        return view('admin.estado_linea.show', compact('estado_linea'));
    }


    public function edit(BsdEstadoLinea $estado_linea)
    {
        $tiposervicios = BsdTipoServicio::pluck('nom_tipo_servicio', 'id');
        return view('admin.estado_linea.edit', compact('estado_linea', 'tiposervicios'));
    }

    public function update(Request $request, BsdEstadoLinea $estado_linea)
    {
        $request->validate([
            'bsd_tipo_servicio_id' => 'required',
            'nombre_estado_linea' => "required|string|max:120,$estado_linea->id",
            'precio' => "required|max:9999999|numeric",
        ]);

        $estado_linea->usuario_act = auth()->user()->name;

        $estado_linea->update($request->all());
        return redirect()->route('admin.estado_linea.show', $estado_linea)->with('success', 'update');
    }


    public function destroy(BsdEstadoLinea $estado_linea)
    {
        $estado_linea->delete();
        return redirect()->route('admin.estado_linea.indextrash')->with('success','destroy');
    }

    public function indextrash()
    {
        $bsd_estado_linea = BsdEstadoLinea::where('estado', 0)->get();
        return view('admin.estado_linea.indextrash', compact('bsd_estado_linea'));
    }


    public function destroyLogico(BsdEstadoLinea $estado_linea)
    {
        //dd($estado_linea);
        $estado_linea->estado = 0;
        $estado_linea->save();
        return redirect()->route('admin.estado_linea.index')->with('success','destroyLogico');
    }

    public function restauraEstadoLinea(BsdEstadoLinea $estado_linea)
    {
        $estado_linea->estado = 1;
        $estado_linea->save();
        return redirect()->route('admin.estado_linea.indextrash')->with('success','restaurar');
    }
}
