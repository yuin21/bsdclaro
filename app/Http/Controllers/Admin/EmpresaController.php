<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BsdEmpresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.empresa.index');
    }

    public function index()
    {
        $bsd_empresa = BsdEmpresa::where('estado', 1)->get();
        return view('admin.empresa.index',compact('bsd_empresa'));
    }
    
    public function create()
    {
        return view('admin.empresa.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'ruc' => 'required|string|max:11|unique:bsd_empresa,ruc',
            'razon_social' => 'required|string|max:120',
            'representante'=> 'required|string|max:120',
            'direccion' => 'string|max:90',
            'celular' => 'string|max:30',
            'email'=> 'string|email|max:75|unique:bsd_empresa,email',
        ]);
        
        $empresa = BsdEmpresa::create($request->all() + ['usuario_reg' => auth()->user()->name]);
        return redirect()->route('admin.empresa.show', $empresa)->with('success','store'); 
    }
    
    public function show(BsdEmpresa $empresa)
    {
        return view('admin.empresa.show', compact('empresa'));
    }
    
    public function edit(BsdEmpresa $empresa)
    {
        return view('admin.empresa.edit', compact('empresa'));
    }
    
    public function update(Request $request, BsdEmpresa $empresa)
    {
        $request->validate([
            'ruc' => "required|string|max:11|unique:bsd_empresa,ruc,$empresa->id",
            'razon_social' => 'required|string|max:120',
            'representante'=> 'required|string|max:120',
            'direccion' => 'string|max:90',
            'celular' => 'string|max:30',
            'email'=> "string|email|max:75|unique:bsd_empresa,email, $empresa->id",
        ]); 
        
        $empresa->usuario_act = auth()->user()->name;

        $empresa->update($request->all());

        return redirect()->route('admin.empresa.show', $empresa)->with('success', 'update');
    }

    public function destroy(BsdEmpresa $empresa)
    {
        $empresa->delete();

        return redirect()->route('admin.empresa.indextrash')->with('success','destroy');  
    }

    public function indextrash()
    {
        $bsd_empresa = BsdEmpresa::where('estado', 0)->get();
        return view('admin.empresa.indextrash', compact('bsd_empresa'));
    }


    public function destroyLogico(BsdEmpresa $empresa)
    {
        $empresa->estado = 0;
        $empresa->save();
        return redirect()->route('admin.empresa.index')->with('success','destroyLogico');       
    }

    public function restaurarEmpresa(BsdEmpresa $empresa)
    {
        $empresa->estado = 1;
        $empresa->save();
        return redirect()->route('admin.empresa.indextrash')->with('success','restaurar');       
    }
}

