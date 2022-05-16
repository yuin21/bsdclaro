<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BsdCuota;
use App\Models\BsdPersonal;
use App\Models\BsdServicio;
use Illuminate\Http\Request;

class CuotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.cuotas.index');
    }

    public function index()
    {
        $bsd_cuota = BsdCuota::where('estado', 1)->get();

        return view('admin.cuotas.index', compact('bsd_cuota'));
    }

    public function create()
    {
        //$bsd_personal = BsdPersonal::where('estado', 1)->orderBy('nom_personal')->get();
        //$personal = $bsd_personal->pluck('PersonalFullName', 'PersonalFullName');
        //dd($personal);

        return view('admin.cuotas.create');
    }
   
    public function store(Request $request)
    {
        $request->validate([
            'cuota' => 'required|numeric|unique:bsd_cuota,cuota',
            //'mes' => 'required|string|max:10',
            //'año' => 'required|numeric|max:2069|min:1970',
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
        
        //$bsd_personal = BsdPersonal::where('estado', 1)->orderBy('nom_personal')->get();
        //$personal = $bsd_personal->pluck('PersonalFullName', 'PersonalFullName');

        //$bsd_servicio = BsdServicio::where('estado', 1)->orderBy('nombre_servicio')->get();
        //$servicio = $bsd_servicio->pluck('nombre_servicio', 'nombre_servicio');
        
        return view('admin.cuotas.edit', compact('cuota'));
    }

    public function update(Request $request, BsdCuota $cuota)
    {
        $request->validate([
            'cuota' => "required|numeric|unique:bsd_cuota,cuota, $cuota->id",
            //'mes' => 'required|string|max:10',
            //'año' => 'required|numeric|max:2069|min:1970',
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
