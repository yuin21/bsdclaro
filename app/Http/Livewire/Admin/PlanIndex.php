<?php

namespace App\Http\Livewire\Admin;

use App\Models\BsdPlan;
use Livewire\Component;
use Livewire\WithPagination;

class PlanIndex extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = "bootstrap";



    public function render()
    {
        $bsd_plan = BsdPlan::where('estado', 1)->where('nombre_plan','LIKE','%'.$this->search.'%')

        ->Paginate(15);


        return view('livewire.admin.plan-index', compact('bsd_plan'));
    }
}
