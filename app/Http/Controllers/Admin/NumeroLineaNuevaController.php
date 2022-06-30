<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\BsdNumero_linea_nueva;
use App\Models\BsdDetalleVenta;
use Illuminate\Http\Request;

class NumeroLineaNuevaController extends Controller
{
    public function __construct()
    {
        //$this->middleware('can:admin.personal.index');
    }

    public function index()
    {
        $bsd_numero_linea_nueva = BsdNumero_linea_nueva::where('estado', 1)->get();
        return view('admin.numero_linea_nueva.index',compact('bsd_numero_linea_nueva'));
    }

    public function create()
    {
        $detalle_venta= BsdDetalleVenta::pluck('operador','id');

        return view('admin.numero_linea_nueva.create',compact('detalle_venta'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'numero_linea_nueva' => 'required|string|max:13',
        ]);

        $numero_linea_nueva= BsdNumero_linea_nueva::create($request->all());

        return redirect()->route('admin.numero_linea_nueva.show', $numero_linea_nueva)->with('success','store');
    }

    public function show(BsdNumero_linea_nueva $numero_linea_nueva)
    {
        return view('admin.numero_linea_nueva.show', compact('numero_linea_nueva'));
    }

    public function edit(BsdNumero_linea_nueva $numero_linea_nueva)
    {
        return view('admin.numero_linea_nueva.edit', compact('numero_linea_nueva'));
    }

    public function update(Request $request, BsdNumero_linea_nueva $numero_linea_nueva)
    {
        $request->validate([
            'numero_linea_nueva' => 'required|string|max:13',
        ]);

        $numero_linea_nueva->update($request->all());
        return redirect()->route('admin.numero_linea_nueva.show', $numero_linea_nueva)->with('success', 'update');
    }

    public function indextrash()
    {
        $bsd_numero_linea_nueva= BsdNumero_linea_nueva::where('estado', 0)->get();
        return view('admin.numero_linea_nueva.indextrash', compact('bsd_numero_linea_nueva'));
    }


    public function destroyLogico(BsdNumero_linea_nueva $numero_linea_nueva)
    {
        $numero_linea_nueva->estado = 0;
        $numero_linea_nueva->save();
        return redirect()->route('admin.numero_linea_nueva.index')->with('success','destroyLogico');
    }

    public function destroy(BsdNumero_linea_nueva $numero_linea_nueva)
    {
        $numero_linea_nueva->delete();
        return redirect()->route('admin.numero_linea_nueva.indextrash')->with('success','destroy');
    }

    public function restaurarNumero(BsdNumero_linea_nueva $numero_linea_nueva)
    {
        $numero_linea_nueva->estado = 1;
        $numero_linea_nueva->save();
        return redirect()->route('admin.numero_linea_nueva.indextrash')->with('success','restaurar');
    }
}
