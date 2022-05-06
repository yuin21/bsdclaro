<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BsdCuota;
use Illuminate\Http\Request;

class CuotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.personal.index');
    }

    public function index()
    {
        return view('admin.cuotas.index');
    }

    public function create()
    {
        return view('admin.cuotas.create');
    }
   
    public function store(Request $request)
    {
        $request->validate([
            'tipo_consultor' => 'required|string|max:20',
            'tipo_venta' => 'required|string|max:20',
            'personal' => 'required|string|max:120',
            'cantidad_cuota' => 'required|numeric',
            'mes' => 'required|string|max:10',
            'año' => 'required|numeric|max:9999',
        ]);

        $cuota = BsdCuota::create($request->all());

        return redirect()->route('admin.cuotas.show', $cuota)->with('success','store'); 
    }

    public function show(BsdCuota $cuota)
    {
        return view('admin.cuotas.show', compact('cuota'));
    }

    public function edit(BsdCuota $cuota)
    {
        return view('admin.cuotas.edit', compact('cuota'));
    }

    public function update(Request $request, BsdCuota $cuota)
    {
        $request->validate([
            'tipo_consultor' => 'required|string|max:20',
            'tipo_venta' => 'required|string|max:20',
            'personal' => 'required|string|max:120',
            'cantidad_cuota' => 'required|numeric',
            'mes' => 'required|string|max:10',
            'año' => 'required|numeric|max:4',
        ]);

        $cuota->update($request->all());

        return redirect()->route('admin.cuotas.show', $cuota)->with('success', 'update');
    }

    public function destroy(BsdCuota $cuota)
    {
        $cuota->delete();
        return redirect()->route('admin.cuotas.indextrash')->with('success','destroy'); 
    }
    public function indextrash()
    {
        $bsd_cuota = BsdCuota::where('estado', 0)->get();
        return view('admin.cuotas.indextrash', compact('bsd_cuota'));
    }


    public function destroyLogico(BsdCuota $cuota)
    {
        $cuota->estado = 0;
        $cuota->save();
        return redirect()->route('admin.cuotas.index')->with('success','destroyLogico');       
    }

    public function restaurarCuotas(BsdCuota $cuota)
    {
        $cuota->estado = 1;
        $cuota->save();
        return redirect()->route('admin.cuotas.indextrash')->with('success','restaurar');       
    }
}
