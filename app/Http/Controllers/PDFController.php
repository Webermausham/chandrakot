<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use PDF;

use App\Models\School;


class PDFController extends Controller
{



    public function Download($id) {
        $student = Student::find($id);
          $pdf = PDF::loadView('pdf-single',compact('student'));
        return $pdf->download('MARKSHEET.pdf');

    }




    public function generatePDF()
    {
             $students= Student::orderBy('school','asc')
                 ->orderBy('name','asc')
             ->get();

        $pdf = PDF::loadView('my-pdf-file',compact('students'));
        return $pdf->download('All-Marksheet.pdf');
    }




}
