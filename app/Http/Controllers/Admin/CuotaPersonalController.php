<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BsdCuotaPersonal;
use App\Models\BsdCuota;
use App\Models\BsdPersonal;
use Illuminate\Http\Request;

class CuotaPersonalController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.cuotapersonal.index');
    }

    public function index()
    {
        return view('admin.cuotapersonal.index');
    }

    public function create()
    {
        $bsd_personal = BsdPersonal::where('estado', 1)->orderBy('nom_personal')->get();
        $personal = $bsd_personal->pluck('PersonalFullName', 'id');
        //dd($personal);
        $bsd_cuota = BsdCuota::where('estado', 1)->orderBy('cuota')->get();
        $cuota = $bsd_cuota->pluck('cuota', 'id');
        //dd($cuota);

        return view('admin.cuotapersonal.create', compact('personal','cuota'));
    }

    public function store(Request $request)
    {
        //dd($this->getMes('mes'));
        $mes = $request->mes;
        $año = $request->año;
        //dd($request);    
        $request->validate([
            'bsd_personal_id' => "required|unique:bsd_cuota_personal,bsd_personal_id,null,
            id,mes,$mes,año,$año",
            'bsd_cuota_id' => 'required',
            'mes' => 'required|string|max:10',
            'año' => 'required|numeric|max:2069|min:1970',
        ],[
            'bsd_personal_id.unique' => 'Ya se asignó una cuota en esa fecha para el personal'
        ]);


        //dd($request);
        //dd($request);
        $cuotapersonal = BsdCuotaPersonal::create($request->all() + ['usuario_reg' => auth()->user()->name]);

        return redirect()->route('admin.cuotapersonal.show', $cuotapersonal)->with('success','store'); 
    }

    public function show(BsdCuotaPersonal $cuotapersonal)
    {
        return view('admin.cuotapersonal.show', compact('cuotapersonal'));
    }

    public function edit(BsdCuotaPersonal $cuotapersonal)
    {
        //dd($cuotapersonal);
        $bsd_personal = BsdPersonal::where('estado', 1)->orderBy('nom_personal')->get();
        $personal = $bsd_personal->pluck('PersonalFullName', 'id');
        //dd($personal);
        $bsd_cuota = BsdCuota::where('estado', 1)->orderBy('cuota')->get();
        $cuota = $bsd_cuota->pluck('cuota', 'id');
        //dd($cuota);

        return view('admin.cuotapersonal.edit', compact('cuotapersonal', 'personal', 'cuota'));
    }

    public function update(Request $request, BsdCuotaPersonal $cuotapersonal)
    {
        $mes = $request->mes;
        $año = $request->año;

        $request->validate([
            'bsd_personal_id' => "required|unique:bsd_cuota_personal,bsd_personal_id,,$cuotapersonal->id,
            id,mes,$mes,año,$año",
            'bsd_personal_id' => "required",
            'bsd_cuota_id' => 'required',
            'mes' => "required|string|max:10",
            'año' => "required|numeric|max:2069|min:1970",
        ]);
        
        $cuotapersonal->usuario_act = auth()->user()->name;

        $cuotapersonal->update($request->all());

        return redirect()->route('admin.cuotapersonal.show', $cuotapersonal)->with('success', 'update');
    }

    public function destroy(BsdCuotaPersonal $cuotapersonal)
    {
        $cuotapersonal->delete();
        return redirect()->route('admin.cuotapersonal.indextrash')->with('success','destroy'); 
    }

    public function indextrash()
    {
        $bsd_cuota_personal = BsdCuotaPersonal::where('estado', 0)->get();
        return view('admin.cuotapersonal.indextrash', compact('bsd_cuota_personal'));
    }


    public function destroyLogico(BsdCuotaPersonal $cuotapersonal)
    {
        $cuotapersonal->estado = 0;
        $cuotapersonal->save();
        return redirect()->route('admin.cuotapersonal.index')->with('success','destroyLogico');       
    }

    public function restaurarCuotaPersonal(BsdCuotaPersonal $cuotapersonal)
    {
        $cuotapersonal->estado = 1;
        $cuotapersonal->save();
        return redirect()->route('admin.cuotapersonal.indextrash')->with('success','restaurar');       
    }

}
