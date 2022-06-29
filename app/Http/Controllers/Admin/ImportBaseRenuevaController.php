<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BsdBaseRenueva;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\CsvImportRequest;
use Maatwebsite\Excel\HeadingRowImport;
use App\Imports\WithHeadingRowImport;
use App\Models\CsvData;

class ImportBaseRenuevaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.import_baserenueva.indexf');
    }


    public function index()
    {
        $data = BsdBaseRenueva::simplePaginate(15);
        return view('admin.importbaserenueva.index', compact('data'));

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

        return view('admin.importbaserenueva.parse', [
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
            $bsdBaseRenueva = new BsdBaseRenueva();
            foreach (config('app.db_fieldsrenueva') as $index => $field) {

                if ($data->csv_header) {
                    $bsdBaseRenueva->$field = $row[$request->fields[$field]];
                } else {
                    $bsdBaseRenueva->$field = $row[$request->fields[$index]];
                }
            }
            $bsdBaseRenueva->save();
        }

        return redirect()->route('admin.importbaserenueva.index')->with('success', 'Datos guardados correctamente.');
    }
}
