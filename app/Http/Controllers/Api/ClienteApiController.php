<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BsdCliente;

class ClienteApiController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->get('term');
        if (empty($search) or strlen($search) < 2 ) { return []; }

        $clientes = BsdCliente::where('estado', 1)->where('ruc','LIKE','%'.$search.'%')->get();

        $data = [];
        foreach ($clientes as $item) {
            $data[] = [
                'id' => $item->id,
                'value' => $item->ruc,
                'label' => ($item->ruc .', '.$item->razon_social),
                'razon_social' => $item->razon_social
            ];
        }

        return $data;
    }
}
