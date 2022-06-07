<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BsdVenta;

class HomeController extends Controller
{
    public function index(){
        $year = date("Y");
        $lastYear = $year - 1;
        // $ventas = BsdVenta::get();
        return view('admin.index');
    }
}
