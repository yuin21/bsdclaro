<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BsdPersonal;
use App\Imports\TipoDoc;

class PersonalController extends Controller
{
    public function __construct()
    {
        // $this->middleware('can:admin.personal.index');
    }
    
    public function index()
    {
        return view('admin.personal.index');
    }

    public function create()
    {
    
        $tipos_doc = TipoDoc::getTipoDoc();

        return view('admin.personal.create', compact('tipos_doc'));
    }

     public function store(Request $request)
    {
        $request->validate([
            'nom_personal' => 'required|string|max:60',
            'ape_paterno' => 'required|string|max:25',
            'ape_materno'=> 'required|string|max:25',
            'cargo' => 'required|string|max:75',
            'tipo_doc_iden'=> 'required|string|max:30',
            'nro_doc_iden'=> 'required|string|max:15', 
            'email'=> 'required|string|max:75',
          
        ]);       

        $personal = BsdPersonal::create($request->all());

        return redirect()->route('admin.personal.index')->with('mensaje','Agregado con éxito');       
    }
   
    public function show($id)
    {
        $Personal = BsdPersonal::findOrFail(['id_personal' => $id]);
        return view('admin.personal.show', compact('Personal'));
    }
    
    public function edit($id)
    {
        $tipos_doc = TipoDoc::getTipoDoc();
        $personal = BsdPersonal::where('id_personal', $id)->firstOrFail();
        return view('admin.personal.edit', compact('personal', 'tipos_doc'));
    }
   
    public function update(Request $request, $id)
    {        
        $request->validate([
            'nom_personal' => 'required|string|max:60',
            'ape_paterno' => 'required|string|max:25',
            'ape_materno'=> 'required|string|max:25',
            'cargo' => 'required|string|max:75',
            'tipo_doc_iden'=> 'required|string|max:30',
            'nro_doc_iden'=> 'required|string|max:15', 
            'email'=> 'required|string|max:75',
        ]);

        $personal = BsdPersonal::where('id_personal', $id)->firstOrFail();
        $personal->update($request);

        // $personal->update($request->all());
        return redirect()->route('admin.personal.edit', $personal)->with('mensaje', 'Se actualizó correctamente');
    }

    public function destroy($id)
    {
        BsdPersonal::destroy($id);        
        return redirect('admin/personal')->with('mensaje','Reporte borrado');
    }
}
