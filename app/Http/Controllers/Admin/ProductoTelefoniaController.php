<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BsdProductoTelefonia;
use App\Models\BsdServicio;

class ProductoTelefoniaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.productotelefonia.index');
    }

    public function index()
    {
        return view('admin.productotelefonia.index');
    }

    public function create()
    {
        $servicios = BsdServicio::pluck('nombre_servicio', 'id');
        return view('admin.productotelefonia.create', compact('servicios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto' => 'required|unique:bsd_producto_telefonia',
            'bsd_servicio_id' => 'required',
        ]);
        
        $productotelefonia = BsdProductoTelefonia::create($request->all());
        return redirect()->route('admin.productotelefonia.show', $productotelefonia)->with('success', 'store');
    }

    public function show(BsdProductoTelefonia $productotelefonium)
    {
        $productotelefonia = $productotelefonium;
        return view('admin.productotelefonia.show', compact('productotelefonia'));
    }

    public function edit(BsdProductoTelefonia $productotelefonium)
    {
        $productotelefonia = $productotelefonium;
        $servicios = BsdServicio::pluck('nombre_servicio', 'id');
        return view('admin.productotelefonia.edit', compact('productotelefonia', 'servicios'));
    }

    public function update(Request $request, BsdProductoTelefonia $productotelefonium)
    {
        $request->validate([
            'producto' => "required|unique:bsd_producto_telefonia,producto,$productotelefonium->id",
            'bsd_servicio_id' => 'required',
        ]);

        $productotelefonium->update($request->all());
        return redirect()->route('admin.productotelefonia.show', $productotelefonium)->with('success', 'update');
    }

    public function indextrash()
    {
        $productos = BsdProductoTelefonia::where('estado', 0)->get();
        return view('admin.productotelefonia.indextrash', compact('productos'));
    }


    public function destroyLogico(BsdProductoTelefonia $productotelefonium)
    {
        $productotelefonia = $productotelefonium;
        $productotelefonia->estado = 0;
        $productotelefonia->save();
        return redirect()->route('admin.productotelefonia.index')->with('success','destroyLogico');       
    }

    public function restaurarProductoTelefonia(BsdProductoTelefonia $productotelefonium)
    {
        $productotelefonia = $productotelefonium;
        $productotelefonia->estado = 1;
        $productotelefonia->save();
        return redirect()->route('admin.productotelefonia.indextrash')->with('success','restaurar');       
    }

    public function destroy(BsdProductoTelefonia $productotelefonium)
    {
        $productotelefonia = $productotelefonium;
        $productotelefonia->delete();
        return redirect()->route('admin.productotelefonia.indextrash')->with('success','destroy');       
    }
}
