<?php

namespace App\Http\Livewire\Admin;

use App\Models\BsdEstadoLinea;
use Livewire\Component;
use Livewire\WithPagination;

class EstadolineaIndex extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = "bootstrap";
    public function updatingSearch(){
        $this->resetPage();
    } 

    public function render()
    {
        $bsd_estado_linea = BsdEstadoLinea::where('estado', 1)->where('nombre_estado_linea','LIKE','%'.$this->search.'%')
        
        ->paginate(15);
        return view('livewire.admin.estadolinea-index', compact('bsd_estado_linea'));
    }
}
 