<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\BsdCliente;

class ClienteIndex extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = "bootstrap";
    
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $bsd_cliente = BsdCliente::where('estado', 1)->where('ruc','LIKE','%'.$this->search.'%')
        
        ->paginate(15);
        return view('livewire.admin.cliente-index', compact('bsd_cliente'));
    }
}

