<?php

namespace App\Http\Livewire\Admin;

use App\Models\BsdVenta;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class VentaIndex extends Component
{
    use WithPagination;
    public $search;
    public $searchFecha;
    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $anio = Carbon::parse($this->searchFecha)->format('Y');
        $mes = Carbon::parse($this->searchFecha)->format('m');
        $dia = Carbon::parse($this->searchFecha)->format('d');
        //dd($fecha);

        if($this->searchFecha == null){
            $bsd_venta = BsdVenta::join("bsd_personal as p", "p.id", "=", "bsd_venta.bsd_personal_id")
            ->join("bsd_cliente as c", "c.id", "=", "bsd_venta.bsd_cliente_id")
            ->selectRaw('p.ape_paterno, p.ape_materno, p.nom_personal,
            p.id as id_personal, bsd_venta.id, c.ruc, c.razon_social,
            bsd_venta.sec, bsd_venta.sot, bsd_venta.fecha_registro,
            bsd_venta.total_sin_igv, bsd_venta.total, bsd_venta.avance_oportunidad')
            ->where('bsd_venta.estado', 1)->where('p.ape_paterno','LIKE','%'.$this->search.'%')
            ->paginate(15);
        } else if($this->search == null){
            $bsd_venta = BsdVenta::join("bsd_personal as p", "p.id", "=", "bsd_venta.bsd_personal_id")
            ->join("bsd_cliente as c", "c.id", "=", "bsd_venta.bsd_cliente_id")
            ->selectRaw('p.ape_paterno, p.ape_materno, p.nom_personal,
            p.id as id_personal, bsd_venta.id, c.ruc, c.razon_social,
            bsd_venta.sec, bsd_venta.sot, bsd_venta.fecha_registro,
            bsd_venta.total_sin_igv, bsd_venta.total, bsd_venta.avance_oportunidad')
            ->whereYear('bsd_venta.fecha_registro',$anio)->whereMonth('bsd_venta.fecha_registro',$mes)
            ->whereDay('bsd_venta.fecha_registro',$dia)->paginate(15);
        }else {
            $bsd_venta = BsdVenta::join("bsd_personal as p", "p.id", "=", "bsd_venta.bsd_personal_id")
            ->join("bsd_cliente as c", "c.id", "=", "bsd_venta.bsd_cliente_id")
            ->selectRaw('p.ape_paterno, p.ape_materno, p.nom_personal,
            p.id as id_personal, bsd_venta.id, c.ruc, c.razon_social,
            bsd_venta.sec, bsd_venta.sot, bsd_venta.fecha_registro,
            bsd_venta.total_sin_igv, bsd_venta.total, bsd_venta.avance_oportunidad')
            ->where('bsd_venta.estado', 1)->where('p.ape_paterno','LIKE','%'.$this->search.'%')
            ->whereYear('bsd_venta.fecha_registro',$anio)->whereMonth('bsd_venta.fecha_registro',$mes)
            ->whereDay('bsd_venta.fecha_registro',$dia)->paginate(15);
        }

        //dd($bsd_venta);
        //dd($bsd_venta);
        return view('livewire.admin.venta-index', compact('bsd_venta'));
    }
}
