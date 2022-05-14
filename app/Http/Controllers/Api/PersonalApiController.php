<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BsdPersonal;

class PersonalApiController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->get('term');
        if (empty($search) or strlen($search) < 2 ) { return []; }

        $prevData = BsdPersonal::selectRaw('ape_paterno, ape_materno, nom_personal, CONCAT(ape_paterno, " ", ape_materno, " ", nom_personal) as fullname, id, cargo')
            ->where('estado', 1)
            ->get();

        $personal = [];
        foreach ($prevData as $data) {
            if (strstr(mb_strtolower($data->fullname), mb_strtolower($search)) != false) {
                $personal[] = [
                    'id' => $data->id,
                    'label' => $data->fullname,
                    'cargo' => $data->cargo,
                ];
            }
        }

        return $personal;
    }
}
