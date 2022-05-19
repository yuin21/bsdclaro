<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BsdCliente;

class ClienteApiController extends Controller
{
    public function searchLike(Request $request)
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

    public function search(Request $request)
    {
        $search = $request->get('term');
        if (empty($search) or strlen($search) < 6 ) { return []; }
        $cliente = BsdCliente::where('estado', 1)->where('ruc',$search)->first();

        $dataCliente[] = [
            'id' => $cliente->id,
            'value' => $cliente->ruc,
            'label' => ($cliente->ruc .', '.$cliente->razon_social),
            'razon_social' => $cliente->razon_social
        ];

        return $dataCliente;
    }

    public function searchSunat(Request $request)
    {
        $search = $request->get('term'); // el ruc
        if (empty($search) or strlen($search) < 6 ) { return []; }

        $cookie = array(
            'cookie' 		=> array(
                'use' 		=> true,
                'file' 		=> __DIR__ . "/cookie.txt"
            )
        );
        
        $config = [
            'representantes_legales' 	=> true,
            'cantidad_trabajadores' 	=> true,
            'establecimientos' 			=> true,
            'deuda' 					=> true,
            'cookie' 					=> [
                'cookie' 		=> [
                    'use' 		=> true,
                    'file' 		=> __DIR__ . "/cookie.txt"
                ]
            ]
        ];
        
        $company = new \jossmp\sunat\ruc($config);
        $ruc = $search ? $search.'' : false;
        $search1 = $company->consulta($ruc);
        
        return $search1->json(NULL, true);
    }
}
