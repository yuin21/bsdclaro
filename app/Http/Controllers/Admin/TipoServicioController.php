<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BsdTipoServicio;
use Illuminate\Http\Request;

class TipoServicioController extends Controller
{    
    public function __construct()
    {
        $this->middleware('can:admin.tiposervicio.index');
    }

    public function index()
    {
        $bsd_tiposervicio = BsdTipoServicio::where('estado', 1)->get();
        return view('admin.tiposervicio.index', compact('bsd_tiposervicio'));
    }

    public function create()
    {
        return view('admin.tiposervicio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_tipo_servicio' => 'required|string|max:15|unique:bsd_tipo_servicio,nom_tipo_servicio',
        ]);       

        $tiposervicio = BsdTipoServicio::create($request->all() + ['usuario_reg' => auth()->user()->name]);

        return redirect()->route('admin.tiposervicio.show', $tiposervicio)->with('success','store'); 
    }

    public function show(BsdTipoServicio $tiposervicio)
    {
        return view('admin.tiposervicio.show', compact('tiposervicio'));
    }


    public function edit(BsdTipoServicio $tiposervicio)
    {
        return view('admin.tiposervicio.edit', compact('tiposervicio'));
    }

    public function update(Request $request, BsdTipoServicio $tiposervicio)
    {
        $request->validate([
            'nom_tipo_servicio' => "required|string|max:15|unique:bsd_tipo_servicio,nom_tipo_servicio, $tiposervicio->id",
        ]);

        $tiposervicio->usuario_act = auth()->user()->name;

        $tiposervicio->update($request->all());
        return redirect()->route('admin.tiposervicio.show', $tiposervicio)->with('success', 'update');
    }

    public function destroy(BsdTipoServicio $tiposervicio)
    {
        $tiposervicio->delete();
        return redirect()->route('admin.tiposervicio.indextrash')->with('success','destroy');  
    }

    public function indextrash()
    {
        $bsd_tiposervicio = BsdTipoServicio::where('estado', 0)->get();
        return view('admin.tiposervicio.indextrash', compact('bsd_tiposervicio'));
    }


    public function destroyLogico(BsdTipoServicio $tiposervicio)
    {
        $tiposervicio->estado = 0;
        $tiposervicio->save();
        return redirect()->route('admin.tiposervicio.index')->with('success','destroyLogico');       
    }

    public function restaurarTipoServicio(BsdTipoServicio $tiposervicio)
    {
        $tiposervicio->estado = 1;
        $tiposervicio->save();
        return redirect()->route('admin.tiposervicio.indextrash')->with('success','restaurar');       
    }
}
