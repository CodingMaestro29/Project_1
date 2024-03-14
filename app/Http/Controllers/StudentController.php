<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentCompletion;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;


class StudentController extends Controller
{



    public function index()
    {
        return view('complete-course');
    }







    public function importStudentsFromDocx(Request $request)
    {
   // $realPath =  public_path('docx/111.docx');

   $request->validate([
    'csv_file' => 'required|file|mimes:csv,txt',
   ]);

   $csvFile = $request->file('csv_file')->getPathname();

   $csv = Reader::createFromPath($csvFile, 'r');

   //$header = $csv->fetchOne();
   $header = $csv->getHeader();
   $csv->setHeaderOffset(0);

   try {
    foreach ($csv as $row) {
        $rowData = [
            'fname' => $row['fname'],
            'mname' => $row['mname'],
            'lname' => $row['lname'],
            'DOB' => $row['DOB'],
            'license_number' => $row['license_number'],
            'complete_time' => $row['complete_time'],
            'address' => $row['address'],
            'state' => $row['state'],
            'zipcode' => $row['zipcode'],
        ];

        DB::table('student_completions')->insert($rowData);
    }

    // return response()->json(['message' => 'CSV file imported successfully']);
    return redirect()->back()->with('success', 'CSV file imported successfully');
} catch (\Exception $e) {
    return response()->json(['error' => 'Error importing CSV file: ' . $e->getMessage()], 500);
}
   

       }

}
