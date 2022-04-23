<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BsdBaseFija;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\CsvImportRequest;
use Maatwebsite\Excel\HeadingRowImport;
use App\Imports\WithHeadingRowImport;
use App\Models\CsvData;


class ImportBaseFijaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.import_basefija.index');
    }
    
    
    public function index()
    {
        $data = BsdBaseFija::simplePaginate(15);
        return view('admin.importbasefija.index', compact('data'));
        
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

        return view('admin.importbasefija.parse', [
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
            $BsdBaseFija = new BsdBaseFija();
            foreach (config('app.db_fieldsfija') as $index => $field) {

                if ($data->csv_header) {
                    $BsdBaseFija->$field = $row[$request->fields[$field]];
                } else {
                    $BsdBaseFija->$field = $row[$request->fields[$index]];
                }
            }
            $BsdBaseFija->save();
        }

        return redirect()->route('admin.importbasefija.index')->with('success', 'Datos guardados correctamente.');
    }
}
