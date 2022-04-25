<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\BsdPersonal;


class PersonalIndex extends Component
{

    use WithPagination;
    public $search;
    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $bsd_personal = BsdPersonal::where('ape_paterno','LIKE','%'.$this->search.'%')
        // ->orWhere('ape_paterno','LIKE','%'.$this->search.'%')
        ->paginate(15);
        return view('livewire.admin.personal-index', compact('bsd_personal'));
    }
}
