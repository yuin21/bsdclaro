<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\BsdProductoTelefonia;
use Livewire\WithPagination;

class ProductoTelefoniaIndex extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = "bootstrap";
    
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $productos = BsdProductoTelefonia::where('estado', 1)->where('producto','LIKE','%'.$this->search.'%')->paginate(15);
        return view('livewire.admin.producto-telefonia-index', compact('productos'));
    }
}
