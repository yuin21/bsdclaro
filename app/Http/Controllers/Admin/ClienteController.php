<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\BsdCliente;
use Illuminate\Http\Request;
use App\Imports\Tipo_cliente;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.personal.index');
    }

    public function index()
    {
        return view('admin.clientes.index');
    }

    public function create()
    {
        $tipos_cliente  = Tipo_cliente::getTipo_cliente();
        $tipos_cliente  = $tipos_cliente ->pluck('name', 'cod');
        return view('admin.clientes.create', compact('tipos_cliente'));
    }
   
    public function store(Request $request)
    {
        $request->validate([
            'ruc' => 'required|string|max:11',
            'razon_social'=> 'required|string|max:120' ,
            'num_celular'=> 'required|string|max:30',
        ]);

        $cliente= BsdCliente::create($request->all());

        return redirect()->route('admin.clientes.show', $cliente)->with('success','store'); 
    }

    public function show(BsdCliente $cliente)
    {
        $tipos_cliente  = Tipo_cliente::getTipo_cliente();
        return view('admin.clientes.show', compact('cliente','tipos_cliente'));
    }

    public function edit(BsdCliente $cliente)
    {
        $tipos_cliente  = Tipo_cliente::getTipo_cliente();
        $tipos_cliente  = $tipos_cliente ->pluck('name', 'cod');
        return view('admin.clientes.edit', compact('cliente','tipos_cliente' ));
    }

    public function update(Request $request, BsdCliente $cliente)
    {
        $request->validate([
            'ruc' => 'required|string|max:11',
            'razon_social'=> 'required|string|max:120' ,
            'num_celular'=> 'required|string|max:30',
            
        ]);

        $cliente->update($request->all());

        return redirect()->route('admin.clientes.show', $cliente)->with('success', 'update');
    }

    public function destroy(BsdCliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('admin.clientes.indextrash')->with('success','destroy'); 
    }
    public function indextrash()
    {
        $bsd_cliente = BsdCliente::where('estado', 0)->get();
        return view('admin.clientes.indextrash', compact('bsd_cliente'));
    }


    public function destroyLogico(BsdCliente $cliente)
    {
        $cliente->estado = 0;
        $cliente->save();
        return redirect()->route('admin.clientes.index')->with('success','destroyLogico');       
    }

    public function restaurarCliente(BsdCliente $cliente)
    {
        $cliente->estado = 1;
        $cliente->save();
        return redirect()->route('admin.clientes.indextrash')->with('success','restaurar');       
    }
}