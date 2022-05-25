<?php
namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
class UsersExport implements FromCollection, WithCustomCsvSettings, WithHeadings
{
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }

    public function headings(): array
    {
        return ["ID","SCHOOL","NAME","SYMBOL","DOB","ENG(TH)","PR","TOT","NEP(TH)","PR","TOT","mth","Scn(TH)","PR","TOT","Scl(TH)","PR","TOT","local(TH)","PR","TOT","GPA"];


    }

    public function collection()
    {
        // return Student::select('school','name','dob','sub1_num_gp','sub2_num_gp','sub11_gp','sub4_num_gp','sub3_num_gp','sub22_gp','GPA')
        //->GroupBy('school')->get();
        //->groupBy('school')

        return Student::select('id','school','name','sym','dob','sub1_num_grade','sub2_num_grade','sub11_gp','sub3_num_grade','sub4_num_grade','sub22_gp','sub33_gp','sub6_num_grade','sub7_num_grade','sub44_gp','sub8_num_grade','sub9_num_grade','sub55_gp','sub10_num_grade','sub11_num_grade','sub66_gp','GPA')->get();

        //->GroupBy('school','name','dob','sub1_num_gp','sub2_num_gp','sub11_gp','sub4_num_gp','sub3_num_gp','sub22_gp','GPA')
        // ->get();
        //->groupBy('school')




    }
}
