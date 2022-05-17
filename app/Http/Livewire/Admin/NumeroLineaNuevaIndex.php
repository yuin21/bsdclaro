<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\BsdNumero_linea_nueva;

class NumeroLineaNuevaIndex extends Component
{

    use WithPagination;
    public $search;
    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $bsd_numero_linea_nueva= BsdNumero_linea_nueva::where('estado', 1)->where('numero_linea_nueva','LIKE','%'.$this->search.'%')
        
        ->paginate(15);
        return view('livewire.admin.numero-linea-nueva-index', compact('bsd_numero_linea_nueva'));
    }
}
