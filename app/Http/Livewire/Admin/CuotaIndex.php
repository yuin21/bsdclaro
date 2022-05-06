<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\BsdCuota;

class CuotaIndex extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = "bootstrap";
    
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $bsd_cuota = BsdCuota::where('estado', 1)->where('personal','LIKE','%'.$this->search.'%')
        
        ->paginate(15);
        return view('livewire.admin.cuota-index', compact('bsd_cuota'));
    }
}
