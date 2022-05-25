<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings
use Maatwebsite\Excel\Concerns\WithHeadings

class StudentExport implements FromCollection, WithCustomCsvSettings, WithHeadings
{
    public function getAllStudents(): array
    {
        return [
            'delimiter' => ','
        ];
    }

    public function headings(): array
    {
        return ["name"];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::select('name')->get();
    }
}
