<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BsdBaseMovil;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\CsvImportRequest;
use Maatwebsite\Excel\HeadingRowImport;
use App\Imports\WithHeadingRowImport;
use App\Models\CsvData;

class ImportBaseMovilController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.import_basemovil.index');
    }
    
    
    public function index()
    {
        $data = BsdBaseMovil::simplePaginate(15);
        return view('admin.importbasemovil.index', compact('data'));
        
    }

    public function parseImport(CsvImportRequest $request)
    {
        if ($request->has('header')) {
            $headings = (new HeadingRowImport)->toArray($request->file('csv_file'));
            $data = Excel::toArray(new WithHeadingRowImport, $request->file('csv_file'))[0];
        } else {
            $data = array_map('str_getcsv', file($request->file('csv_file')->getRealPath()));
        }

        if (count($data) > 0) {
            $csv_data = array_slice($data, 0, 2);

            $csv_data_file = CsvData::create([
                'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
                'csv_header' => $request->has('header'),
                'csv_data' => json_encode($data)
            ]);
        } else {
            return redirect()->back();
        }

        return view('admin.importbasemovil.parse', [
            'headings' => $headings ?? null,
            'csv_data' => $csv_data,
            'csv_data_file' => $csv_data_file
        ]);
        
    }

    public function processImport(Request $request)
    {
        $data = CsvData::find($request->csv_data_file_id);
        $csv_data = json_decode($data->csv_data, true);
        foreach ($csv_data as $row) {
            $BsdBaseMovil = new BsdBaseMovil();
            foreach (config('app.db_fieldsmovil') as $index => $field) {

                if ($data->csv_header) {
                    $BsdBaseMovil->$field = $row[$request->fields[$field]];
                } else {
                    $BsdBaseMovil->$field = $row[$request->fields[$index]];
                }
            }
            $BsdBaseMovil->save();
        }

        return redirect()->route('admin.importbasemovil.index')->with('success', 'Datos guardados correctamente.');
    }
}
