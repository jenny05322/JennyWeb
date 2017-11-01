<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index(Request $request)
    {
        $tableName = $request->table;

        $dataset = DB::select("SELECT * FROM {$tableName}");
        dd($dataset);
    }
}
