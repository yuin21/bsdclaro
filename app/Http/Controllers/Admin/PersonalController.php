<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BsdPersonal;

class PersonalController extends Controller
{
    public function __construct()
    {
        // $this->middleware('can:admin.personal.index');
    }
    
    public function index()
    {
        $datos['bsd_personal']=BsdPersonal::paginate(5);
        return view('admin.personal.index', $datos);
    }

    public function create()
    {
        return view('admin.personal.create');
    }

     public function store(Request $request)
    {
        $campos=[
            'nom_personal' => 'required|string|max:60',
            'ape_paterno' => 'required|string|max:25',
            'ape_materno'=> 'required|string|max:25',
            'cargo' => 'required|string|max:75',
            'tipo_doc_iden'=> 'required|string|max:30',
            'nro_doc_iden'=> 'required|string|max:15', 
            'email'=> 'required|string|max:75',
          
        ];       
        $mensaje=[
            'required'=>'El :attribute es requerido',          
        ];

        $this->validate($request,$campos,$mensaje);       
        $Personal = new BsdPersonal();
        $Personal->create($request->all());
        return redirect('admin/personal')->with('mensaje','Agregado con éxito');       
    }
   
    public function show($id)
    {
        $Personal = BsdPersonal::findOrFail($id);
        return view('admin.personal.show', compact('Personal'));
    }
    
    public function edit($id)
    {
        $Personal = BsdPersonal::findOrFail($id);
        return view('admin.personal.edit', compact('Personal'));
    }
   
    public function update(Request $request, $id)
    {        
        $campos=[
            'nom_personal' => 'required|string|max:60',
            'ape_paterno' => 'required|string|max:25',
            'ape_materno'=> 'required|string|max:25',
            'cargo' => 'required|string|max:75',
            'tipo_doc_iden'=> 'required|string|max:30',
            'nro_doc_iden'=> 'required|string|max:15', 
            'email'=> 'required|string|max:75',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',   
        ];

        $this->validate($request,$campos,$mensaje);        
        $datosReporteMovil = request()->except(['_token','_method']);        
        BsdPersonal::where('id','=',$id)->update($datosReporteMovil);
        $Personal = BsdPersonal::findOrFail($id);       
        return redirect('admin/personal')->with('mensaje','Reporte editado');
    
    }

    public function destroy($id)
    {
        BsdPersonal::destroy($id);        
        return redirect('admin/personal')->with('mensaje','Reporte borrado');
    }
}
