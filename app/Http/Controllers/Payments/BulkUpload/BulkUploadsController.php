<?php

namespace App\Http\Controllers\Payments\BulkUpload;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\MultipleUploadsImport;
use Maatwebsite\Excel\Facades\Excel;

class BulkUploadsController extends Controller
{
    //method to take the import values
    public function import(Request $request)
    {
        // return $request->file;
        // die();
        Excel::import(new MultipleUploadsImport, $request->file);
        return "Record are imported successfully!";
    }
}
