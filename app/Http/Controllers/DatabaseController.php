<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    public function index()
    {
        if (config('database.default') == 'pgsql') {
            $tables = DB::select("SELECT * FROM pg_catalog.pg_tables WHERE schemaname = 'public'");
        } else {
            $tables = DB::select("SHOW TABLES");
        }

        return view('database.index', compact('tables'));
    }
}
