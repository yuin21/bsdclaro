<?php

namespace App\Http\Livewire\Admin;

use App\Models\BsdServicio;
use Livewire\Component;
use Livewire\WithPagination;

class ServicioIndex extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = "bootstrap";
    
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $bsd_servicio = BsdServicio::where('estado', 1)->where('nom_servicio','LIKE','%'.$this->search.'%')
        
        ->paginate(15);
        return view('livewire.admin.servicio-index', compact('bsd_servicio'));
    }
}
