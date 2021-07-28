<?php

namespace App\Http\Controllers;
use App\Stock;
use Illuminate\Http\Request;
use Auth;
use Excel;
use App\Imports\StockImport;
use App\Exports\StockExport;
class StockController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function import(){  
        return view('import');
    }
    public function importfile(Request $request){
        Excel::import(new StockImport,$request->file);
        return redirect('/home');
    }
    public function exportfile(){
        return Excel::download(new StockExport,'sample2.xlsx');
    }
}
