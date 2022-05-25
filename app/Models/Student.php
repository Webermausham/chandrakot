<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class Student extends Model
{
      use HasFactory;
        public $timestamps=false;
       protected $table= 'student';

    protected $fillable = ['name',
        'dob',
        'year',
        'doi',
        'school',
        'sub1_num',
        'sub2_num',
        'sub3_num',
        'sub4_num',
        'sub5_num',
        'sub6_num',
        'sub7_num',
        'sub1_num_gp','sub1_num_grade',
        'sub2_num_gp','sub2_num_grade',
        'sub3_num_gp','sub3_num_grade',
        'sub4_num_gp','sub4_num_grade',
        'sub5_gp','sub5_grade',
        'sub6_num_gp','sub6_num_grade',
        'sub7_num_gp','sub7_num_grade',
        'sub8_num_gp','sub8_num_grade',
        'sub9_num_gp','sub10_num_grade',
        'sub10_num_gp','sub10_num_grade',
        'sub11_num_gp','sub11_num_grade',
        'sub11','sub22','sub33','sub44','sub55','sub66','GPA'
        //$sub7_num_gp

    ];


    public static function getAllStudents(){
        $result =DB::table('students')
            ->select('name')
            ->get()->toArray();
        return $result;
    }

}
