<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\BsdCuotaPersonal;
use App\Models\BsdPersonal;

class CuotapersonalIndex extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = "bootstrap";
    
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        
        $bsd_cuota_personal = BsdCuotaPersonal::join('bsd_personal as bp','bsd_personal_id', '=', 'bp.id')
        ->where('bsd_cuota_personal.estado', 1)
        ->addSelect(['bsd_cuota_personal.id', 'bsd_cuota_id', 'bsd_personal_id', 'mes', 'año', 'bsd_cuota_personal.estado','nom_personal','ape_paterno','ape_materno'])
        ->where('bp.ape_paterno','LIKE','%'.$this->search.'%')
        ->paginate(15);
        //dd($bsd_cuota_personal);
        //$bsd_cuota_personal = BsdCuotaPersonal::where('estado', 1)->where('mes','LIKE','%'.$this->search.'%')
        //->paginate(15);
        //dd($bsd_cuota_personal);
        return view('livewire.admin.cuotapersonal-index', compact('bsd_cuota_personal'));
    }
}
