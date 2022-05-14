<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\BsdCliente;
use Illuminate\Http\Request;


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
        return view('admin.clientes.create');
    }
   
    public function store(Request $request)
    {
        $request->validate([
            'ruc' => 'required|string|max:11',
            'razon_social'=> 'required|string|max:120' ,
            'num_celular'=> 'required|string|max:30',
            'direccion'=> 'required|string|max:90' ,
            'departamento'=> 'required|string|max:25',
            'provincia'=> 'required|string|max:40',
            'distrito'=> 'required|string|max:50',
            'tipo_cliente'=> 'required|string|max:30',
        ]);

        $cliente= BsdCliente::create($request->all());

        return redirect()->route('admin.clientes.show', $cliente)->with('success','store'); 
    }

    public function show(BsdCliente $cliente)
    {
        return view('admin.clientes.show', compact('cliente'));
    }

    public function edit(BsdCliente $cliente)
    {
        return view('admin.clientes.edit', compact('cliente'));
    }

    public function update(Request $request, BsdCliente $cliente)
    {
        $request->validate([
            'ruc' => 'required|string|max:11',
            'razon_social'=> 'required|string|max:120' ,
            'num_celular'=> 'required|string|max:30',
            'direccion'=> 'required|string|max:90' ,
            'departamento'=> 'required|string|max:25',
            'provincia'=> 'required|string|max:40',
            'distrito'=> 'required|string|max:50',
            'tipo_cliente'=> 'required|string|max:30',
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