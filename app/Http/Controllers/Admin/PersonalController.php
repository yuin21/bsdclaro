<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BsdPersonal;
use App\Imports\TipoDoc;
use PDF;

class PersonalController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.personal.index');
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
            'email'=> 'required|string|email|max:75',
        ]);       

        $personal = BsdPersonal::create($request->all());

        return redirect()->route('admin.personal.show', $personal)->with('success','store');       
    }
   
    public function show(BsdPersonal $personal)
    {
        $tipos_doc = TipoDoc::getTipoDoc();
        return view('admin.personal.show', compact('personal', 'tipos_doc'));
    }
    
    public function edit(BsdPersonal $personal)
    {
        $tipos_doc = TipoDoc::getTipoDoc();
        return view('admin.personal.edit', compact('personal', 'tipos_doc'));
    }
   
    public function update(Request $request, BsdPersonal $personal)
    {        
        $request->validate([
            'nom_personal' => 'required|string|max:60',
            'ape_paterno' => 'required|string|max:25',
            'ape_materno'=> 'required|string|max:25',
            'cargo' => 'required|string|max:75',
            'tipo_doc_iden'=> 'required|string|max:30',
            'nro_doc_iden'=> 'required|string|max:15', 
            'email'=> 'required|string|email|max:75',
        ]);

        $personal->update($request->all());
        return redirect()->route('admin.personal.show', $personal)->with('success', 'update');
    }

    public function indextrash()
    {
        $bsd_personal = BsdPersonal::where('estado', 0)->get();
        return view('admin.personal.indextrash', compact('bsd_personal'));
    }


    public function destroyLogico(BsdPersonal $personal)
    {
        $personal->estado = 0;
        $personal->save();
        return redirect()->route('admin.personal.index')->with('success','destroyLogico');       
    }

    public function restaurarPersonal(BsdPersonal $personal)
    {
        $personal->estado = 1;
        $personal->save();
        return redirect()->route('admin.personal.indextrash')->with('success','restaurar');       
    }

    public function destroy(BsdPersonal $personal)
    {
        $personal->delete();
        return redirect()->route('admin.personal.indextrash')->with('success','destroy');       
    }

    public function generatePDF(BsdPersonal $personal)
    {
        $pdf = PDF::loadView('admin.personal.pdf', compact('personal'));
        return $pdf->download('personal.pdf');       
    }
}
