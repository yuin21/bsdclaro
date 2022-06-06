<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BsdPersonal;
use App\Imports\TipoDoc;
use Barryvdh\DomPDF\Facade as PDF;

use Symfony\Contracts\Service\Attribute\Required;

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
    
        $tipo_doc = TipoDoc::getTipoDoc();
        $tipos_doc = $tipo_doc->pluck('name', 'cod');
        //dd($tipos_doc);
        return view('admin.personal.create', compact('tipos_doc'));
    }

     public function store(Request $request)
    {
        $request->validate([
            'nom_personal' => 'required|string|max:60',
            'ape_paterno' => 'required|string|max:25',
            'ape_materno'=> 'nullable|string|max:25',
            'cargo' => 'required|string|max:75',
            'tipo_personal' => 'required|string|max:15',
            'tipo_doc_iden'=> 'required|string|max:30',
            'nro_doc_iden'=> 'required|string|max:15|unique:bsd_personal', 
            'email'=> 'required|string|email|max:75|unique:bsd_personal',
            'direccion' => 'nullable|max:300',
            'celular' => 'required|max:30'
        ]);       
        
        $personal = BsdPersonal::create($request->all() + ['usuario_reg' => auth()->user()->name]);

        return redirect()->route('admin.personal.show', $personal)->with('success','store');       
    }
   
    public function show(BsdPersonal $personal)
    {
        $tipos_doc = TipoDoc::getTipoDoc();
        return view('admin.personal.show', compact('personal', 'tipos_doc'));
    }
    
    public function edit(BsdPersonal $personal)
    {
        $tipo_doc = TipoDoc::getTipoDoc();
        $tipos_doc = $tipo_doc->pluck('name', 'cod');
        return view('admin.personal.edit', compact('personal', 'tipos_doc'));
    }
   
    public function update(Request $request, BsdPersonal $personal)
    {        
        $request->validate([
            'nom_personal' => 'required|string|max:60',
            'ape_paterno' => 'required|string|max:25',
            'ape_materno'=> 'nullable|string|max:25',
            'cargo' => 'required|string|max:75',
            'tipo_personal' => 'required|string|max:15',
            'tipo_doc_iden'=> 'required|string|max:30',
            'nro_doc_iden'=> "required|string|max:15|unique:bsd_personal,nro_doc_iden,$personal->id", 
            'email'=> "required|string|email|max:75|unique:bsd_personal,email,$personal->id",
            'direccion' => 'nullable|max:300',
            'celular' => 'required|max:30'
        ]);

        $personal->usuario_act = auth()->user()->name;

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
        $pdf = PDF::loadView('admin.personal.reportes.pdf_individual', compact('personal'));
        return $pdf->download('personal.pdf');       
    }

    public function generatePDF_allPersonal()
    {
        $bsd_personal = BsdPersonal::all();
        $pdf = PDF::loadView('admin.personal.reportes.allpersonal', compact('bsd_personal'));
        
        return $pdf->download('personal.pdf');       
    }
}
