<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BsdPlan;
use App\Models\BsdTipoServicio;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.personal.index');
        //$this->middleware('can:admin.plan.index');
    }

    public function index()
    {
        return view('admin.plan.index');
    }

    
    public function create()
    {
        $tiposervicios = BsdTipoServicio::pluck('nom_tipo_servicio', 'id');
        return view('admin.plan.create', compact('tiposervicios'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'bsd_tipo_servicio_id' => 'required',
            'nombre_plan' => 'required|string|max:120|unique:bsd_plan,nombre_plan',
            'precio' => 'required|numeric',
        ]);       

        $plan = BsdPlan::create($request->all());

        return redirect()->route('admin.plan.show', $plan)->with('success','store'); 
    }

    
    public function show(BsdPlan $plan)
    {
        return view('admin.plan.show', compact('plan'));
    }

    
    public function edit(BsdPlan $plan)
    {
        $tiposervicios = BsdTipoServicio::pluck('nom_tipo_servicio', 'id');
        return view('admin.plan.edit', compact('plan', 'tiposervicios'));
    }

    
    public function update(Request $request, BsdPlan $plan)
    {        
        $request->validate([
            'bsd_tipo_servicio_id' => 'required',
            'nombre_plan' => "required|string|max:120|unique:bsd_plan,nombre_plan,$plan->id",
            'precio' => "required|numeric",
        ]);   

        $plan->update($request->all());
        return redirect()->route('admin.plan.show', $plan)->with('success', 'update');
    }

    
    public function destroy(BsdPlan $plan)
    {
        $plan->delete();
        return redirect()->route('admin.plan.indextrash')->with('success','destroy');  
    }

    public function indextrash()
    {
        $bsd_plan = BsdPlan::where('estado', 0)->get();
        return view('admin.plan.indextrash', compact('bsd_plan'));
    }


    public function destroyLogico(BsdPlan $plan)
    {
        $plan->estado = 0;
        $plan->save();
        return redirect()->route('admin.plan.index')->with('success','destroyLogico');       
    }

    public function restaurarPlan(BsdPlan $plan)
    {
        $plan->estado = 1;
        $plan->save();
        return redirect()->route('admin.plan.indextrash')->with('success','restaurar');       
    }
}