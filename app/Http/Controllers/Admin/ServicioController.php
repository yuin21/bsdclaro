<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BsdServicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.personal.index');
    }

    public function index()
    {
        return view('admin.servicio.index');
    }

    public function create()
    {
        return view('admin.servicio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_servicio' => 'required|string|max:15',
            'tipo_servicio' => 'required|string|max:20',
        ]);       

        $servicio = BsdServicio::create($request->all());

        return redirect()->route('admin.servicio.show', $servicio)->with('success','store'); 
    }

    public function show(BsdServicio $servicio)
    {
        return view('admin.servicio.show', compact('servicio'));
    }

    public function edit(BsdServicio $servicio)
    {
        return view('admin.servicio.edit', compact('servicio'));
    }

    public function update(Request $request, BsdServicio $servicio)
    {
        $request->validate([
            'nombre_servicio' => 'required|string|max:15',
            'tipo_servicio' => 'required|string|max:20',
        ]);

        $servicio->update($request->all());
        return redirect()->route('admin.servicio.show', $servicio)->with('success', 'update');
    }

    public function indextrash()
    {
        $bsd_servicio = BsdServicio::where('estado', 0)->get();
        return view('admin.servicio.indextrash', compact('bsd_servicio'));
    }


    public function destroyLogico(BsdServicio $servicio)
    {
        $servicio->estado = 0;
        $servicio->save();
        return redirect()->route('admin.servicio.index')->with('success','destroyLogico');       
    }

    public function restaurarServicio(BsdServicio $servicio)
    {
        $servicio->estado = 1;
        $servicio->save();
        return redirect()->route('admin.servicio.indextrash')->with('success','restaurar');       
    }

    public function destroy(BsdServicio $servicio)
    {   
        $servicio->delete();
        return redirect()->route('admin.servicio.indextrash')->with('success','destroy');  
    }
}
