<?php

namespace App\Http\Controllers;

use App\Exports\StudentExport;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\School;
use App\Models\Users;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

//use PhpParser\Node\Stmt\Return_;

class StudentController extends Controller
{
           function View(){
                    $students= Student::orderBy('school','asc')->get();
                    $schools= School::all();
               return view('view-student',compact('students','schools'));
           }

            public function viewSchool()
            {
                $schools= School::all();
               // return Excel::groupBy('school')->download(new UsersExport, 'users.xlsx');
                return view('school',compact('schools'));
            }



    public function goToDetails(Request $request)
    {

         // echo 'hello';
        return Excel::download(new UsersExport, 'users.xlsx');
    }



    public function export()
    {
        return Excel::download(new UsersExport, 'Report.xlsx');
    }


    function addSchool(Request $request){
        $Schools = new School();
           $Schools->scl_name = request('scl_name');
        $Schools->save();
        return redirect('/view-school');

    }




    public function chooseSchool()
    {
        $schools= School::all();
        // return Excel::groupBy('school')->download(new UsersExport, 'users.xlsx');
        return view('school',compact('schools'));
    }


    function selectSchool(Request $request){
        $Schools = new School();
        return Excel::download(new UsersExport, 'Report.xlsx');
        //$Schools->scl_name = request('scl_name');
        //$Schools->save();
        return redirect('/view-school');

    }





    public function destroy($id) {

        $cliente = Student::find($id);
        $cliente->delete();
        return redirect('/add-std');
    }



    function addStudent(Request $request){

               $request->validate([
                   'name'=>'required',
                   'school'=>'required',
                   'dob'=>'required| date_format:Y-m-d',
                   'year'=>'required',
                   'sym' =>'required',
                   'sub1_num' => 'required|integer|between:0,50',
                   'sub2_num' => 'required|integer|between:0,50',
                   'sub3_num' => 'required|integer|between:0,70',
                   'sub4_num' => 'required|integer|between:0,30',
                       'sub5' => 'required|integer|between:0,100',
                   'sub6_num' => 'required|integer|between:0,85',
                   'sub7_num' => 'required|integer|between:0,15',
                   'sub8_num' => 'required|integer|between:0,90',
                   'sub9_num' => 'required|integer|between:0,10',
                   'sub10_num' => 'required|integer|between:0,50',
                   'sub11_num' => 'required|integer|between:0,50',

               ]);


//                         $validateData =$request->validate([
//                             'name'=>'required',
//                             'school'=>'required'
//                         ]);
//
//            $validateData = $request->validate([
//                 'name'=>'required',
//                'school'=>'required'
//            ]);
//
//




                  $students = new Student();
                //'sub1_gp','sub2_gp','sub3_gp','sub4_gp','sub5_gp'];
                //$name =    request('name'); // $students->name  = $name;

                              //English
                $get_sub1_num = request('sub1_num');

                $sub1_num=$get_sub1_num*100/50;
                $get_sub2_num = request('sub2_num');
                $sub2_num=$get_sub2_num*100/50;

                            // TOTAL ENG
                $sub11_total = $get_sub1_num + $get_sub2_num;



                            // NEPALI
                $get_sub3_num =    request('sub3_num');
                $sub3_num=$get_sub3_num*100/70;
                $get_sub4_num =    request('sub4_num');
                $sub4_num=$get_sub4_num*100/30;

                                //TOTAL NEPALI
                $sub22_total = $get_sub3_num + $get_sub4_num;




                               //MATH
                $sub5 = request('sub5');

                           //  33 FOR MATH
                 $sub33_total = $sub5;




                        // SCIENCE AND HP
                $get_sub6_num =    request('sub6_num');
                $sub6_num=$get_sub6_num*100/85;
                $get_sub7_num =    request('sub7_num');
                $sub7_num=$get_sub7_num*100/15;
                            // TOTAL SCIENCE
                $sub44_total = $get_sub6_num + $get_sub7_num;





                       // SOCIAL  AND CREATIVE ARTS
                $get_sub8_num =    request('sub8_num');
                $sub8_num=$get_sub8_num *100/90;

                $get_sub9_num =    request('sub9_num');
                $sub9_num=$get_sub9_num *100/10;

                              // TOTAL SCIENCE
                 $sub55_total = $get_sub8_num + $get_sub9_num;




                $get_sub10_num =    request('sub10_num');
                $sub10_num=$get_sub10_num*100/50;
                $get_sub11_num =    request('sub11_num');
                $sub11_num=$get_sub11_num*100/50;

                          // TOTAL LOCAL
                $sub66_total = $get_sub10_num + $get_sub11_num;

                            //  ENGLISH TH

                if($sub1_num == 0){
                    $sub1_num_gp = 0;
                    $sub1_num_grade = 'Abs';

                } else {
                                if ($sub1_num >= 90 && $sub1_num <= 100) {
                                    $sub1_num_gp = 4.0;
                                    $sub1_num_grade = 'A+';
                                } elseif ($sub1_num >= 80 && $sub1_num <= 90) {
                                    $sub1_num_gp = 3.6;
                                    $sub1_num_grade = 'A';
                                } elseif ($sub1_num >= 70 && $sub1_num <= 80) {
                                    $sub1_num_gp = 3.2;
                                    $sub1_num_grade = 'B+';
                                } elseif ($sub1_num >= 60 && $sub1_num <= 70) {
                                    $sub1_num_gp = 2.8;
                                    $sub1_num_grade = 'B';
                                } elseif ($sub1_num >= 50 && $sub1_num <= 60) {
                                    $sub1_num_gp = 2.4;
                                    $sub1_num_grade = 'C+';
                                } elseif ($sub1_num >= 40 && $sub1_num <= 50) {
                                    $sub1_num_gp = 2.0;
                                    $sub1_num_grade = 'C';
                                } elseif ($sub1_num >= 35 && $sub1_num <= 40) {
                                    $sub1_num_gp = 1.6;
                                    $sub1_num_grade = 'D';
                                } elseif ($sub1_num > 0 && $sub1_num < 35) {
                                    $sub1_num_gp = '-';
                                    $sub1_num_grade = 'NG';
                                }
                            }


                            //ENGLISH PR

                 if($sub2_num == 0){
                    $sub2_num_gp = 0;
                    $sub2_num_grade = 'Abs';

                } else {
                             if ($sub2_num >= 90 && $sub2_num <= 100) {
                                $sub2_num_gp = 4.0;
                                $sub2_num_grade = 'A+';
                            } elseif ($sub2_num >= 80 && $sub2_num <= 90) {
                                $sub2_num_gp = 3.6;
                                $sub2_num_grade = 'A';
                            } elseif ($sub2_num >= 70 && $sub2_num <= 80) {
                                $sub2_num_gp = 3.2;
                                $sub2_num_grade = 'B+';
                            } elseif ($sub2_num >= 60 && $sub2_num <= 70) {
                                $sub2_num_gp = 2.8;
                                $sub2_num_grade = 'B';
                            } elseif ($sub2_num >= 50 && $sub2_num <= 60) {
                                $sub2_num_gp = 2.4;
                                $sub2_num_grade = 'C+';
                            } elseif ($sub2_num >= 40 && $sub2_num <= 50) {
                                $sub2_num_gp = 2.0;
                                $sub2_num_grade = 'C';
                            } elseif ($sub2_num >= 35 && $sub2_num <= 40) {
                                $sub2_num_gp = 1.6;
                                $sub2_num_grade = 'D';
                            } elseif ($sub2_num > 0 && $sub2_num < 35) {
                                $sub2_num_gp = '-';
                                $sub2_num_grade = 'NG';
                            }
                }





                    if($get_sub1_num != 0 && $get_sub2_num != 0){
                        if ($sub11_total >= 90 && $sub11_total <= 100) {
                            $sub11 = 4.0;
                            $sub11_space = 4.0;
                            $sub11_gp = 'A+';
                        } elseif ($sub11_total >= 80 && $sub11_total <= 90) {
                            $sub11 = 3.6;
                            $sub11_space = 3.6;
                            $sub11_gp = 'A';
                        } elseif ($sub11_total >= 70 && $sub11_total <= 80) {
                            $sub11 = 3.2;
                            $sub11_space = 3.2;
                            $sub11_gp = 'B+';
                        } elseif ($sub11_total >= 60 && $sub11_total <= 70) {
                            $sub11 = 2.8;
                            $sub11_space = 2.8;
                            $sub11_gp = 'B';
                        } elseif ($sub11_total >= 50 && $sub11_total <= 60) {
                            $sub11 = 2.4;
                            $sub11_space = 2.4;
                            $sub11_gp = 'C+';
                        } elseif ($sub11_total >= 40 && $sub11_total <= 50) {
                            $sub11 = 2.0;
                            $sub11_space = 2.0;
                            $sub11_gp = 'C';
                        } elseif ($sub11_total >= 35 && $sub11_total <= 40) {
                            $sub11 = 1.6;
                            $sub11_space = 1.6;
                            $sub11_gp = 'D';
                        } elseif ($sub11_total > 0 &&   $sub11_total < 35) {
                            $sub11 = 0;
                            $sub11_space = '-';
                            $sub11_gp = '-';
                        }
                    } elseif($get_sub1_num == 0 || $get_sub2_num == 0){
                            $sub11 = 0;
                            $sub11_space = '-';
                            $sub11_gp = '-';
                    }












                                    //  NEPALI TH //

                if($sub3_num == 0){
                    $sub3_num_gp = 0;
                    $sub3_num_grade = 'Abs';
                } else {
                            if ($sub3_num >= 90 && $sub3_num <= 100) {
                                $sub3_num_gp = 4.0;
                                $sub3_num_grade = 'A+';
                            } elseif ($sub3_num >= 80 && $sub3_num <= 90) {
                                $sub3_num_gp = 3.6;
                                $sub3_num_grade = 'A';
                            } elseif ($sub3_num >= 70 && $sub3_num <= 80) {
                                $sub3_num_gp = 3.2;
                                $sub3_num_grade = 'B+';
                            } elseif ($sub3_num >= 60 && $sub3_num <= 70) {
                                $sub3_num_gp = 2.8;
                                $sub3_num_grade = 'B';
                            } elseif ($sub3_num >= 50 && $sub3_num <= 60) {
                                $sub3_num_gp = 2.4;
                                $sub3_num_grade = 'C+';
                            } elseif ($sub3_num >= 40 && $sub3_num <= 50) {
                                $sub3_num_gp = 2.0;
                                $sub3_num_grade = 'C';
                            } elseif ($sub3_num >= 35 && $sub3_num <= 40) {
                                $sub3_num_gp = 1.6;
                                $sub3_num_grade = 'D';
                            } elseif ($sub3_num > 0 && $sub3_num < 35) {
                                $sub3_num_gp = '-';
                                $sub3_num_grade = 'NG';
                            }
                    }


                                      //NEPALI PR

                if($sub4_num == 0){
                    $sub4_num_gp = 0;
                    $sub4_num_grade = 'Abs';
                } else {
                            if ($sub4_num >= 90 && $sub4_num <= 100) {
                                $sub4_num_gp = 4.0;
                                $sub4_num_grade = 'A+';
                            } elseif ($sub4_num >= 80 && $sub4_num <= 90) {
                                $sub4_num_gp = 3.6;
                                $sub4_num_grade = 'A';
                            } elseif ($sub4_num >= 70 && $sub4_num <= 80) {
                                $sub4_num_gp = 3.2;
                                $sub4_num_grade = 'B+';
                            } elseif ($sub4_num >= 60 && $sub4_num <= 70) {
                                $sub4_num_gp = 2.8;
                                $sub4_num_grade = 'B';
                            } elseif ($sub4_num >= 50 && $sub4_num <= 60) {
                                $sub4_num_gp = 2.4;
                                $sub4_num_grade = 'C+';
                            } elseif ($sub4_num >= 40 && $sub4_num <= 50) {
                                $sub4_num_gp = 2.0;
                                $sub4_num_grade = 'C';
                            } elseif ($sub4_num >= 35 && $sub4_num <= 40) {
                                $sub4_num_gp = 1.6;
                                $sub4_num_grade = 'D';
                            } elseif ($sub4_num > 0 && $sub4_num < 35) {
                                $sub4_num_gp = '-';
                                $sub4_num_grade = 'NG';
                            }
                }







                    if($get_sub3_num != 0 && $get_sub4_num != 0){
                            if ($sub22_total >= 90 && $sub22_total <= 100) {
                                $sub22 = 4.0;
                                $sub22_space = 4.0;
                                $sub22_gp = 'A+';
                            } elseif ($sub22_total >= 80 && $sub22_total <= 90) {
                                $sub22 = 3.6;
                                $sub22_space = 3.6;
                                $sub22_gp = 'A';
                            } elseif ($sub22_total >= 70 && $sub22_total <= 80) {
                                $sub22 = 3.2;
                                $sub22_space = 3.2;
                                $sub22_gp = 'B+';
                            } elseif ($sub22_total >= 60 && $sub22_total <= 70) {
                                $sub22 = 2.8;
                                $sub22_space = 2.8;
                                $sub22_gp = 'B';
                            } elseif ($sub22_total >= 50 && $sub22_total <= 60) {
                                $sub22 = 2.4;
                                $sub22_space = 2.4;
                                $sub22_gp = 'C+';
                            } elseif ($sub22_total >= 40 && $sub22_total <= 50) {
                                $sub22 = 2.0;
                                $sub22_space = 2.0;
                                $sub22_gp = 'C';
                            } elseif ($sub22_total >= 35 && $sub22_total <= 40) {
                                $sub22 = 1.6;
                                $sub22_space = 1.6;
                                $sub22_gp = 'D';
                            } elseif ($sub22_total > 0 && $sub22_total < 35) {
                                $sub22 = 0;
                                $sub22_space = '-';
                                $sub22_gp = '-';
                            }
                      } elseif($get_sub3_num == 0 || $get_sub4_num == 0){
                         $sub22 = 0;
                         $sub22_space = '-';
                         $sub22_gp = '-';
                   }

















                               //  MATH

                if($sub5 == 0){
                    $sub5_gp = 0;
                    $sub5_grade = 'Abs';

                } else {


                            if ($sub5 >= 90 && $sub5 <= 100) {
                                $sub5_gp = 4.0;
                                $sub5_grade = 'A+';
                            } elseif ($sub5 >= 80 && $sub5 <= 90) {
                                $sub5_gp = 3.6;
                                $sub5_grade = 'A';
                            } elseif ($sub5 >= 70 && $sub5 <= 80) {
                                $sub5_gp = 3.2;
                                $sub5_grade = 'B+';
                            } elseif ($sub5 >= 60 && $sub5 <= 70) {
                                $sub5_gp = 2.8;
                                $sub5_grade = 'B';
                            } elseif ($sub5 >= 50 && $sub5 <= 60) {
                                $sub5_gp = 2.4;
                                $sub5_grade = 'C+';
                            } elseif ($sub5 >= 40 && $sub5 <= 50) {
                                $sub5_gp = 2.0;
                                $sub5_grade = 'C';
                            } elseif ($sub5 >= 35 && $sub5 <= 40) {
                                $sub5_gp = 1.6;
                                $sub5_grade = 'D';
                            } elseif ($sub5 > 0 && $sub5 < 35) {
                                $sub5_gp = '-';
                                $sub5_grade = 'NG';
                            }
                }





                    if($sub5 != 0){
                                  if ($sub33_total >= 90 && $sub33_total <= 100) {
                                $sub33 = 4.0;
                                $sub33_space = 4.0;
                                $sub33_gp = 'A+';
                            } elseif ($sub33_total >= 80 && $sub33_total <= 90) {
                                $sub33 = 3.6;
                                $sub33_space = 3.6;
                                $sub33_gp = 'A';
                            } elseif ($sub33_total >= 70 && $sub33_total <= 80) {
                                $sub33 = 3.2;
                                $sub33_space = 3.2;
                                $sub33_gp =  'B+';
                            } elseif ($sub33_total >= 60 && $sub33_total <= 70) {
                                $sub33 = 2.8;
                                $sub33_space = 2.8;
                                $sub33_gp = 'B';
                            } elseif ($sub33_total >= 50 && $sub33_total <= 60) {
                                $sub33 = 2.4;
                                $sub33_space = 2.4;
                                $sub33_gp = 'C+';
                            } elseif ($sub33_total >= 40 && $sub33_total <= 50) {
                                $sub33 = 2.0;
                                $sub33_space = 2.0;
                                $sub33_gp =  'C';
                            } elseif ($sub33_total >= 35 && $sub33_total <= 40) {
                                $sub33 = 1.6;
                                $sub33_space = 1.6;
                                $sub33_gp =  'D';
                            } elseif ($sub33_total > 0 &&   $sub33_total < 35) {
                                $sub33 = 0;
                                $sub33_space = '-';
                                $sub33_gp = '-';
                            }
                } elseif($sub5 == 0){
                $sub33 = 0;
                $sub33_space = '-';
                $sub33_gp = '-';
            }








                //  SCIENCE TH //



                if($sub6_num == 0){
                    $sub6_num_gp = 0;
                    $sub6_num_grade = 'Abs';

                } else {


                            if ($sub6_num >= 90 && $sub6_num <= 100) {
                                $sub6_num_gp = 4.0;
                                $sub6_num_grade = 'A+';
                            } elseif ($sub6_num >= 80 && $sub6_num <= 90) {
                                $sub6_num_gp = 3.6;
                                $sub6_num_grade = 'A';
                            } elseif ($sub6_num >= 70 && $sub6_num <= 80) {
                                $sub6_num_gp = 3.2;
                                $sub6_num_grade = 'B+';
                            } elseif ($sub6_num >= 60 && $sub6_num <= 70) {
                                $sub6_num_gp = 2.8;
                                $sub6_num_grade = 'B';
                            } elseif ($sub6_num >= 50 && $sub6_num <= 60) {
                                $sub6_num_gp = 2.4;
                                $sub6_num_grade = 'C+';
                            } elseif ($sub6_num >= 40 && $sub6_num <= 50) {
                                $sub6_num_gp = 2.0;
                                $sub6_num_grade = 'C';
                            } elseif ($sub6_num >= 35 && $sub6_num <= 40) {
                                $sub6_num_gp = 1.6;
                                $sub6_num_grade = 'D';
                            } elseif ($sub6_num > 0 && $sub6_num < 35) {
                                $sub6_num_gp = '-';
                                $sub6_num_grade = 'NG';
                            }

                }


                          //SCIENCE PR

                if($sub7_num == 0){
                    $sub7_num_gp = 0;
                    $sub7_num_grade = 'Abs';

                } else {


                            if ($sub7_num >= 90 && $sub7_num <= 100) {
                                $sub7_num_gp = 4.0;
                                $sub7_num_grade = 'A+';
                            } elseif ($sub7_num >= 80 && $sub7_num <= 90) {
                                $sub7_num_gp = 3.6;
                                $sub7_num_grade = 'A';
                            } elseif ($sub7_num >= 70 && $sub7_num <= 80) {
                                $sub7_num_gp = 3.2;
                                $sub7_num_grade = 'B+';
                            } elseif ($sub7_num >= 60 && $sub7_num <= 70) {
                                $sub7_num_gp = 2.8;
                                $sub7_num_grade = 'B';
                            } elseif ($sub7_num >= 50 && $sub7_num <= 60) {
                                $sub7_num_gp = 2.4;
                                $sub7_num_grade = 'C+';
                            } elseif ($sub7_num >= 40 && $sub7_num <= 50) {
                                $sub7_num_gp = 2.0;
                                $sub7_num_grade = 'C';
                            } elseif ($sub7_num >= 35 && $sub7_num <= 40) {
                                $sub7_num_gp = 1.6;
                                $sub7_num_grade = 'D';
                            } elseif ($sub7_num > 0 && $sub7_num < 35) {
                                $sub7_num_gp = '-';
                                $sub7_num_grade = 'NG';
                            }
                }


                    if($get_sub6_num != 0 && $get_sub7_num != 0){
                        if ($sub44_total >= 90 && $sub44_total <= 100) {
                            $sub44 = 4.0;
                            $sub44_space = 4.0;
                            $sub44_gp = 'A+';
                        } elseif ($sub44_total >= 80 && $sub44_total <= 90) {
                            $sub44 = 3.6;
                            $sub44_space = 3.6;
                            $sub44_gp = 'A';
                        } elseif ($sub44_total >= 70 && $sub44_total <= 80) {
                            $sub44 = 3.2;
                            $sub44_space = 3.2;
                            $sub44_gp = 'B+';
                        } elseif ($sub44_total >= 60 && $sub44_total <= 70) {
                            $sub44 = 2.8;
                            $sub44_space = 2.8;
                            $sub44_gp = 'B';
                        } elseif ($sub44_total >= 50 && $sub44_total <= 60) {
                            $sub44 = 2.4;
                            $sub44_space = 2.4;
                            $sub44_gp = 'C+';
                        } elseif ($sub44_total >= 40 && $sub44_total <= 50) {
                            $sub44 = 2.0;
                            $sub44_space = 2.0;
                            $sub44_gp =  'C';
                        } elseif ($sub44_total >= 35 && $sub44_total <= 40) {
                            $sub44 = 1.6;
                            $sub44_space = 1.6;
                            $sub44_gp =  'D';
                        } elseif ($sub44_total > 0 &&   $sub44_total < 35) {
                            $sub44 = 0;
                            $sub44_space = '-';
                            $sub44_gp = '-';
                        }
                }elseif($get_sub6_num == 0 || $get_sub7_num == 0){
                $sub44 = 0;
                $sub44_space = '-';
                $sub44_gp = '-';
            }

















                //  SOCIAL TH //



                if($sub8_num == 0){
                    $sub8_num_gp = 0;
                    $sub8_num_grade = 'Abs';

                } else {
                    if ($sub8_num >= 90 && $sub8_num <= 100) {
                        $sub8_num_gp = 4.0;
                        $sub8_num_grade = 'A+';
                    } elseif ($sub8_num >= 80 && $sub8_num <= 90) {
                        $sub8_num_gp = 3.6;
                        $sub8_num_grade = 'A';
                    } elseif ($sub8_num >= 70 && $sub8_num <= 80) {
                        $sub8_num_gp = 3.2;
                        $sub8_num_grade = 'B+';
                    } elseif ($sub8_num >= 60 && $sub8_num <= 70) {
                        $sub8_num_gp = 2.8;
                        $sub8_num_grade = 'B';
                    } elseif ($sub8_num >= 50 && $sub8_num <= 60) {
                        $sub8_num_gp = 2.4;
                        $sub8_num_grade = 'C+';
                    } elseif ($sub8_num >= 40 && $sub8_num <= 50) {
                        $sub8_num_gp = 2.0;
                        $sub8_num_grade = 'C';
                    } elseif ($sub8_num >= 35 && $sub8_num <= 40) {
                        $sub8_num_gp = 1.6;
                        $sub8_num_grade = 'D';
                    } elseif ($sub8_num > 0 && $sub8_num < 35) {
                        $sub8_num_gp = '-';
                        $sub8_num_grade = 'NG';
                    }

                }


                                   //SOCIAL PR

                if($sub9_num == 0){
                    $sub9_num_gp = 0;
                    $sub9_num_grade = 'Abs';

                } else {


                    if ($sub9_num >= 90 && $sub9_num <= 100) {
                        $sub9_num_gp = 4.0;
                        $sub9_num_grade = 'A+';
                    } elseif ($sub9_num >= 80 && $sub9_num <= 90) {
                        $sub9_num_gp = 3.6;
                        $sub9_num_grade = 'A';
                    } elseif ($sub9_num >= 70 && $sub9_num <= 80) {
                        $sub9_num_gp = 3.2;
                        $sub9_num_grade = 'B+';
                    } elseif ($sub9_num >= 60 && $sub9_num <= 70) {
                        $sub9_num_gp = 2.8;
                        $sub9_num_grade = 'B';
                    } elseif ($sub9_num >= 50 && $sub9_num <= 60) {
                        $sub9_num_gp = 2.4;
                        $sub9_num_grade = 'C+';
                    } elseif ($sub9_num >= 40 && $sub9_num <= 50) {
                        $sub9_num_gp = 2.0;
                        $sub9_num_grade = 'C';
                    } elseif ($sub9_num >= 35 && $sub9_num <= 40) {
                        $sub9_num_gp = 1.6;
                        $sub9_num_grade = 'D';
                    } elseif ($sub9_num > 0 && $sub9_num < 35) {
                        $sub9_num_gp = '-';
                        $sub9_num_grade = 'NG';
                    }
                }









//
//                $sub11_total = $get_sub1_num + $get_sub2_num;
//                $sub22_total = $get_sub3_num + $get_sub4_num;
//
//                $sub44_total = $get_sub6_num + $get_sub7_num;
//                $sub55_total = $get_sub8_num + $get_sub9_num;
//                $sub66_total = $get_sub10_num + $get_sub11_num;





//
//                if($get_sub8_num == 0 || $get_sub9_num == 0){
//                    $sub55 = '-';
//                        } else {
                // 'A+'; 'A'; 'B+'; 'B'; 'C+'; 'C'; 'D'; 0;  $sub22_gp = 'NG';


                if($get_sub8_num != 0 && $get_sub9_num != 0){

                                if ($sub55_total >= 90 && $sub55_total <= 100) {
                                    $sub55 = 4.0;
                                    $sub55_space = 4.0;
                                    $sub55_gp = 'A+';
                                } elseif ($sub55_total >= 80 && $sub55_total <= 90) {
                                    $sub55 = 3.6;
                                    $sub55_space = 3.6;
                                    $sub55_gp = 'A';
                                } elseif ($sub55_total >= 70 && $sub55_total <= 80) {
                                    $sub55 = 3.2;
                                    $sub55_space = 3.2;
                                    $sub55_gp = 'B+';
                                } elseif ($sub55_total >= 60 && $sub55_total <= 70) {
                                    $sub55 = 2.8;
                                    $sub55_space = 2.8;
                                    $sub55_gp = 'B';
                                } elseif ($sub55_total >= 50 && $sub55_total <= 60) {
                                    $sub55 = 2.4;
                                    $sub55_space = 2.4;
                                    $sub55_gp = 'C+';
                                } elseif ($sub55_total >= 40 && $sub55_total <= 50) {
                                    $sub55 = 2.0;
                                    $sub55_space = 2.0;
                                    $sub55_gp =  'C';
                                } elseif ($sub55_total >= 35 && $sub55_total <= 40) {
                                    $sub55 = 1.6;
                                    $sub55_space = 1.6;
                                    $sub55_gp = 'D';
                                } elseif ($sub55_total > 0 &&   $sub55_total < 35) {
                                    $sub55 = 0;
                                    $sub55_space = '-';
                                    $sub55_gp = '-';
                                }
                   }elseif($get_sub8_num == 0 || $get_sub9_num == 0){
                    $sub55 = 0;
                    $sub55_space = '-';
                    $sub55_gp = '-';
                }


















                //  LOCAL TH //



                if($sub10_num == 0){
                    $sub10_num_gp = 0;
                    $sub10_num_grade = 'Abs';

                } else {


                    if ($sub10_num >= 90 && $sub10_num <= 100) {
                        $sub10_num_gp = 4.0;
                        $sub10_num_grade = 'A+';
                    } elseif ($sub10_num >= 80 && $sub10_num <= 90) {
                        $sub10_num_gp = 3.6;
                        $sub10_num_grade = 'A';
                    } elseif ($sub10_num >= 70 && $sub10_num <= 80) {
                        $sub10_num_gp = 3.2;
                        $sub10_num_grade = 'B+';
                    } elseif ($sub10_num >= 60 && $sub10_num <= 70) {
                        $sub10_num_gp = 2.8;
                        $sub10_num_grade = 'B';
                    } elseif ($sub10_num >= 50 && $sub10_num <= 60) {
                        $sub10_num_gp = 2.4;
                        $sub10_num_grade = 'C+';
                    } elseif ($sub10_num >= 40 && $sub10_num <= 50) {
                        $sub10_num_gp = 2.0;
                        $sub10_num_grade = 'C';
                    } elseif ($sub10_num >= 35 && $sub10_num <= 40) {
                        $sub10_num_gp = 1.6;
                        $sub10_num_grade = 'D';
                    } elseif ($sub10_num > 0 && $sub10_num < 35) {
                        $sub10_num_gp = '-';
                        $sub10_num_grade = 'NG';
                    }

                }


                //LOCAL PR

                if($sub11_num == 0){
                    $sub11_num_gp = 0;
                    $sub11_num_grade = 'Abs';

                } else {


                    if ($sub11_num >= 90 && $sub11_num <= 100) {
                        $sub11_num_gp = 4.0;
                        $sub11_num_grade = 'A+';
                    } elseif ($sub11_num >= 80 && $sub11_num <= 90) {
                        $sub11_num_gp = 3.6;
                        $sub11_num_grade = 'A';
                    } elseif ($sub11_num >= 70 && $sub11_num <= 80) {
                        $sub11_num_gp = 3.2;
                        $sub11_num_grade = 'B+';
                    } elseif ($sub11_num >= 60 && $sub11_num <= 70) {
                        $sub11_num_gp = 2.8;
                        $sub11_num_grade = 'B';
                    } elseif ($sub11_num >= 50 && $sub11_num <= 60) {
                        $sub11_num_gp = 2.4;
                        $sub11_num_grade = 'C+';
                    } elseif ($sub11_num >= 40 && $sub11_num <= 50) {
                        $sub11_num_gp = 2.0;
                        $sub11_num_grade = 'C';
                    } elseif ($sub11_num >= 35 && $sub11_num <= 40) {
                        $sub11_num_gp = 1.6;
                        $sub11_num_grade = 'D';
                    } elseif ($sub11_num > 0 && $sub11_num < 35) {
                        $sub11_num_gp = '-';
                        $sub11_num_grade = 'NG';
                    }
                }




                   // 'A+'; 'A'; 'B+'; 'B'; 'C+'; 'C'; 'D'; 0;  $sub22_gp = 'NG';



                    if($get_sub10_num != 0 && $get_sub11_num != 0){
                        if ($sub66_total >= 90 && $sub66_total <= 100) {
                            $sub66 = 4.0;
                            $sub66_space = 4.0;
                            $sub66_gp = 'A+';
                        } elseif ($sub66_total >= 80 && $sub66_total <= 90) {
                            $sub66 = 3.6;
                            $sub66_space = 3.6;
                            $sub66_gp =  'A';
                        } elseif ($sub66_total >= 70 && $sub66_total <= 80) {
                            $sub66 = 3.2;
                            $sub66_space = 3.2;
                            $sub66_gp =  'B+';
                        } elseif ($sub66_total >= 60 && $sub66_total <= 70) {
                            $sub66 = 2.8;
                            $sub66_space = 2.8;
                            $sub66_gp = 'B';
                        } elseif ($sub66_total >= 50 && $sub66_total <= 60) {
                            $sub66 = 2.4;
                            $sub66_space = 2.4;
                            $sub66_gp = 'C+';
                        } elseif ($sub66_total >= 40 && $sub66_total <= 50) {
                            $sub66 = 2.0;
                            $sub66_space = 2.0;
                            $sub66_gp = 'C';
                        } elseif ($sub66_total >= 35 && $sub66_total <= 40) {
                            $sub66 = 1.6;
                            $sub66_space = 1.6;
                            $sub66_gp = 'D';
                        } elseif ($sub66_total > 0 && $sub66_total < 35) {
                            $sub66 = 0;
                            $sub66_space = '-';
                            $sub66_gp = '-';
                        }
                }elseif($get_sub10_num == 0 || $get_sub11_num == 0){
                        $sub66 = 0;
                        $sub66_space = '-';
                        $sub66_gp = '-';
                }



             $a = 5; $b = 8; $c = 6; $d = 8; $e = 8; $f = 4;


//                if($sub1_num != 0  && $sub2_num != 0  && $sub3_num != 0  && $sub4_num != 0  && $sub5 != 0  && $sub6_num ==0
//                    && $sub7_num ==0 && $sub8_num ==0 && $sub9_num ==0 && $sub10_num ==0 && $sub11_num ==0)  {
                    $final = $a *$sub11 + $b * $sub22  + $c * $sub33 + $d * $sub44 + $e * $sub55 + $f * $sub66;
                    $GPA = round($final/39,1);
                    //}

//
//                if($sub1_num == 0  )  {
//                    $final = $a *$sub11 + $b * $sub22  + $c * $sub33 + $d * $sub44 + $e * $sub55 + $f * $sub66;
//                    $GPA = round($final/39,1);
//
//                    dd($GPA);
//                } else {
//                    $GPA = ' ';
//                    DD($GPA);
//                }



//
//                //}elseif($sub1_num_gp == 0)  {
//                $final = $a *$sub11 + $b * $sub22  + $c * $sub33 + $d * $sub44 + $e * $sub55 + $f * $sub66;
//
//                //dd($final);
//
//                $GPA = round($final/39,1);
//                dd($GPA);
//                //dd($GPA);
//                //  }





     $doi =Carbon::now()->format('Y-m-d');


               // $sub22_gp = 'NG';


              ;
                $students->sub11_gp  = $sub11_gp;
                $students->sub22_gp  = $sub22_gp;
                $students->sub33_gp  = $sub33_gp;
                $students->sub44_gp  = $sub44_gp;
                $students->sub55_gp  = $sub55_gp;
                $students->sub66_gp  = $sub66_gp;
                $students->GPA  = $GPA;



                $students->sub11_space = $sub11_space;
               // dd($students->sub11_space);
                $students->sub22_space = $sub22_space;
                $students->sub33_space = $sub33_space;
                $students->sub44_space = $sub44_space;
                $students->sub55_space = $sub55_space;
                $students->sub66_space = $sub66_space;




                $students->sym = request('sym');
                $students->name = request('name');
                $students->school = request('school');

                $students->dob = request('dob');
                $students->doi  = $doi;

                $students->year = request('year');

                       //sub1
                $students->sub1_num  = $get_sub1_num;
                $students->sub1_num_gp  = $sub1_num_gp;
                $students->sub1_num_grade  = $sub1_num_grade;

                        //sub2
                $students->sub2_num  = $get_sub2_num;
                $students->sub2_num_gp  = $sub2_num_gp;
                $students->sub2_num_grade  = $sub2_num_grade;

                      //sub3
                $students->sub3_num  = $get_sub3_num;
                $students->sub3_num_gp  = $sub3_num_gp;
                $students->sub3_num_grade  = $sub3_num_grade;


                //sub4
                $students->sub4_num  = $get_sub4_num;
                $students->sub4_num_gp  = $sub4_num_gp;
                $students->sub4_num_grade  = $sub4_num_grade;

                        //sub5  $sub5_grade
                $students->sub5  = $sub5;
                $students->sub5_gp  = $sub5_gp;
                $students->sub5_grade  = $sub5_grade;
                        //SUB 6
                $students->sub6_num  = $get_sub6_num;
                $students->sub6_num_gp  = $sub6_num_gp;
                $students->sub6_num_grade  = $sub6_num_grade;

                    ///SUB 7
                $students->sub7_num  = $get_sub7_num;
                $students->sub7_num_gp  = $sub7_num_gp;
                $students->sub7_num_grade  = $sub7_num_grade;


                    // SUB 8
                $students->sub8_num  = $get_sub8_num;
                $students->sub8_num_gp  = $sub8_num_gp;
                $students->sub8_num_grade  = $sub8_num_grade;


                //SUB 9
                $students->sub9_num  = $get_sub9_num;
                $students->sub9_num_gp  = $sub9_num_gp;
                $students->sub9_num_grade  = $sub9_num_grade;

                $students->sub10_num  = $get_sub10_num;
                $students->sub10_num_gp  = $sub10_num_gp;
                $students->sub10_num_grade  = $sub10_num_grade;
                //SUB 9
                $students->sub11_num  = $get_sub11_num;
                $students->sub11_num_gp  = $sub11_num_gp;
                $students->sub11_num_grade  = $sub11_num_grade;



                $students->sub11  = $sub11;
                $students->sub22  = $sub22;
                $students->sub33  = $sub33;
                $students->sub44  = $sub44;
                $students->sub55  = $sub55;
                $students->sub66  = $sub66;



                $students->save();
                 //return redirect('/add-std');
                return redirect('/add-std');

            }

    public function Edit($id){
               $student = Student::find($id);
               $schools= School::all();
               return view('edit',compact('student','schools'));
    }



    function Update(Request $request,$id){
        $request->validate([
            'name'=>'required',
            'school'=>'required',
            'dob'=>'required| date_format:Y-m-d',
            'year'=>'required',
            'sym' =>'required',
            'sub1_num' => 'required|integer|between:0,50',
            'sub2_num' => 'required|integer|between:0,50',
            'sub3_num' => 'required|integer|between:0,70',
            'sub4_num' => 'required|integer|between:0,30',
            'sub5' => 'required|integer|between:0,100',
            'sub6_num' => 'required|integer|between:0,85',
            'sub7_num' => 'required|integer|between:0,15',
            'sub8_num' => 'required|integer|between:0,90',
            'sub9_num' => 'required|integer|between:0,10',
            'sub10_num' => 'required|integer|between:0,50',
            'sub11_num' => 'required|integer|between:0,50',

        ]);

        $students = Student::find($id);
        $get_sub1_num = request('sub1_num');

        $sub1_num=$get_sub1_num*100/50;
        $get_sub2_num = request('sub2_num');
        $sub2_num=$get_sub2_num*100/50;

        // TOTAL ENG
        $sub11_total = $get_sub1_num + $get_sub2_num;



        // NEPALI
        $get_sub3_num =    request('sub3_num');
        $sub3_num=$get_sub3_num*100/70;
        $get_sub4_num =    request('sub4_num');
        $sub4_num=$get_sub4_num*100/30;

        //TOTAL NEPALI
        $sub22_total = $get_sub3_num + $get_sub4_num;




        //MATH
        $sub5 = request('sub5');

        //  33 FOR MATH
        $sub33_total = $sub5;




        // SCIENCE AND HP
        $get_sub6_num =    request('sub6_num');
        $sub6_num=$get_sub6_num*100/85;
        $get_sub7_num =    request('sub7_num');
        $sub7_num=$get_sub7_num*100/15;
        // TOTAL SCIENCE
        $sub44_total = $get_sub6_num + $get_sub7_num;





        // SOCIAL  AND CREATIVE ARTS
        $get_sub8_num =    request('sub8_num');
        $sub8_num=$get_sub8_num *100/90;

        $get_sub9_num =    request('sub9_num');
        $sub9_num=$get_sub9_num *100/10;

        // TOTAL SCIENCE
        $sub55_total = $get_sub8_num + $get_sub9_num;




        $get_sub10_num =    request('sub10_num');
        $sub10_num=$get_sub10_num*100/50;
        $get_sub11_num =    request('sub11_num');
        $sub11_num=$get_sub11_num*100/50;

        // TOTAL LOCAL
        $sub66_total = $get_sub10_num + $get_sub11_num;

        //  ENGLISH TH

        if($sub1_num == 0){
            $sub1_num_gp = 0;
            $sub1_num_grade = 'Abs';

        } else {
            if ($sub1_num >= 90 && $sub1_num <= 100) {
                $sub1_num_gp = 4.0;
                $sub1_num_grade = 'A+';
            } elseif ($sub1_num >= 80 && $sub1_num <= 90) {
                $sub1_num_gp = 3.6;
                $sub1_num_grade = 'A';
            } elseif ($sub1_num >= 70 && $sub1_num <= 80) {
                $sub1_num_gp = 3.2;
                $sub1_num_grade = 'B+';
            } elseif ($sub1_num >= 60 && $sub1_num <= 70) {
                $sub1_num_gp = 2.8;
                $sub1_num_grade = 'B';
            } elseif ($sub1_num >= 50 && $sub1_num <= 60) {
                $sub1_num_gp = 2.4;
                $sub1_num_grade = 'C+';
            } elseif ($sub1_num >= 40 && $sub1_num <= 50) {
                $sub1_num_gp = 2.0;
                $sub1_num_grade = 'C';
            } elseif ($sub1_num >= 35 && $sub1_num <= 40) {
                $sub1_num_gp = 1.6;
                $sub1_num_grade = 'D';
            } elseif ($sub1_num > 0 && $sub1_num < 35) {
                $sub1_num_gp = '-';
                $sub1_num_grade = 'NG';
            }
        }


        //ENGLISH PR

        if($sub2_num == 0){
            $sub2_num_gp = 0;
            $sub2_num_grade = 'Abs';

        } else {
            if ($sub2_num >= 90 && $sub2_num <= 100) {
                $sub2_num_gp = 4.0;
                $sub2_num_grade = 'A+';
            } elseif ($sub2_num >= 80 && $sub2_num <= 90) {
                $sub2_num_gp = 3.6;
                $sub2_num_grade = 'A';
            } elseif ($sub2_num >= 70 && $sub2_num <= 80) {
                $sub2_num_gp = 3.2;
                $sub2_num_grade = 'B+';
            } elseif ($sub2_num >= 60 && $sub2_num <= 70) {
                $sub2_num_gp = 2.8;
                $sub2_num_grade = 'B';
            } elseif ($sub2_num >= 50 && $sub2_num <= 60) {
                $sub2_num_gp = 2.4;
                $sub2_num_grade = 'C+';
            } elseif ($sub2_num >= 40 && $sub2_num <= 50) {
                $sub2_num_gp = 2.0;
                $sub2_num_grade = 'C';
            } elseif ($sub2_num >= 35 && $sub2_num <= 40) {
                $sub2_num_gp = 1.6;
                $sub2_num_grade = 'D';
            } elseif ($sub2_num > 0 && $sub2_num < 35) {
                $sub2_num_gp = '-';
                $sub2_num_grade = 'NG';
            }
        }





        if($get_sub1_num != 0 && $get_sub2_num != 0){
            if ($sub11_total >= 90 && $sub11_total <= 100) {
                $sub11 = 4.0;
                $sub11_space = 4.0;
                $sub11_gp = 'A+';
            } elseif ($sub11_total >= 80 && $sub11_total <= 90) {
                $sub11 = 3.6;
                $sub11_space = 3.6;
                $sub11_gp = 'A';
            } elseif ($sub11_total >= 70 && $sub11_total <= 80) {
                $sub11 = 3.2;
                $sub11_space = 3.2;
                $sub11_gp = 'B+';
            } elseif ($sub11_total >= 60 && $sub11_total <= 70) {
                $sub11 = 2.8;
                $sub11_space = 2.8;
                $sub11_gp = 'B';
            } elseif ($sub11_total >= 50 && $sub11_total <= 60) {
                $sub11 = 2.4;
                $sub11_space = 2.4;
                $sub11_gp = 'C+';
            } elseif ($sub11_total >= 40 && $sub11_total <= 50) {
                $sub11 = 2.0;
                $sub11_space = 2.0;
                $sub11_gp = 'C';
            } elseif ($sub11_total >= 35 && $sub11_total <= 40) {
                $sub11 = 1.6;
                $sub11_space = 1.6;
                $sub11_gp = 'D';
            } elseif ($sub11_total > 0 &&   $sub11_total < 35) {
                $sub11 = 0;
                $sub11_space = '-';
                $sub11_gp = '-';
            }
        } elseif($get_sub1_num == 0 || $get_sub2_num == 0){
            $sub11 = 0;
            $sub11_space = '-';
            $sub11_gp = '-';
        }












        //  NEPALI TH //

        if($sub3_num == 0){
            $sub3_num_gp = 0;
            $sub3_num_grade = 'Abs';
        } else {
            if ($sub3_num >= 90 && $sub3_num <= 100) {
                $sub3_num_gp = 4.0;
                $sub3_num_grade = 'A+';
            } elseif ($sub3_num >= 80 && $sub3_num <= 90) {
                $sub3_num_gp = 3.6;
                $sub3_num_grade = 'A';
            } elseif ($sub3_num >= 70 && $sub3_num <= 80) {
                $sub3_num_gp = 3.2;
                $sub3_num_grade = 'B+';
            } elseif ($sub3_num >= 60 && $sub3_num <= 70) {
                $sub3_num_gp = 2.8;
                $sub3_num_grade = 'B';
            } elseif ($sub3_num >= 50 && $sub3_num <= 60) {
                $sub3_num_gp = 2.4;
                $sub3_num_grade = 'C+';
            } elseif ($sub3_num >= 40 && $sub3_num <= 50) {
                $sub3_num_gp = 2.0;
                $sub3_num_grade = 'C';
            } elseif ($sub3_num >= 35 && $sub3_num <= 40) {
                $sub3_num_gp = 1.6;
                $sub3_num_grade = 'D';
            } elseif ($sub3_num > 0 && $sub3_num < 35) {
                $sub3_num_gp = '-';
                $sub3_num_grade = 'NG';
            }
        }


        //NEPALI PR

        if($sub4_num == 0){
            $sub4_num_gp = 0;
            $sub4_num_grade = 'Abs';
        } else {
            if ($sub4_num >= 90 && $sub4_num <= 100) {
                $sub4_num_gp = 4.0;
                $sub4_num_grade = 'A+';
            } elseif ($sub4_num >= 80 && $sub4_num <= 90) {
                $sub4_num_gp = 3.6;
                $sub4_num_grade = 'A';
            } elseif ($sub4_num >= 70 && $sub4_num <= 80) {
                $sub4_num_gp = 3.2;
                $sub4_num_grade = 'B+';
            } elseif ($sub4_num >= 60 && $sub4_num <= 70) {
                $sub4_num_gp = 2.8;
                $sub4_num_grade = 'B';
            } elseif ($sub4_num >= 50 && $sub4_num <= 60) {
                $sub4_num_gp = 2.4;
                $sub4_num_grade = 'C+';
            } elseif ($sub4_num >= 40 && $sub4_num <= 50) {
                $sub4_num_gp = 2.0;
                $sub4_num_grade = 'C';
            } elseif ($sub4_num >= 35 && $sub4_num <= 40) {
                $sub4_num_gp = 1.6;
                $sub4_num_grade = 'D';
            } elseif ($sub4_num > 0 && $sub4_num < 35) {
                $sub4_num_gp = '-';
                $sub4_num_grade = 'NG';
            }
        }







        if($get_sub3_num != 0 && $get_sub4_num != 0){
            if ($sub22_total >= 90 && $sub22_total <= 100) {
                $sub22 = 4.0;
                $sub22_space = 4.0;
                $sub22_gp = 'A+';
            } elseif ($sub22_total >= 80 && $sub22_total <= 90) {
                $sub22 = 3.6;
                $sub22_space = 3.6;
                $sub22_gp = 'A';
            } elseif ($sub22_total >= 70 && $sub22_total <= 80) {
                $sub22 = 3.2;
                $sub22_space = 3.2;
                $sub22_gp = 'B+';
            } elseif ($sub22_total >= 60 && $sub22_total <= 70) {
                $sub22 = 2.8;
                $sub22_space = 2.8;
                $sub22_gp = 'B';
            } elseif ($sub22_total >= 50 && $sub22_total <= 60) {
                $sub22 = 2.4;
                $sub22_space = 2.4;
                $sub22_gp = 'C+';
            } elseif ($sub22_total >= 40 && $sub22_total <= 50) {
                $sub22 = 2.0;
                $sub22_space = 2.0;
                $sub22_gp = 'C';
            } elseif ($sub22_total >= 35 && $sub22_total <= 40) {
                $sub22 = 1.6;
                $sub22_space = 1.6;
                $sub22_gp = 'D';
            } elseif ($sub22_total > 0 && $sub22_total < 35) {
                $sub22 = 0;
                $sub22_space = '-';
                $sub22_gp = '-';
            }
        } elseif($get_sub3_num == 0 || $get_sub4_num == 0){
            $sub22 = 0;
            $sub22_space = '-';
            $sub22_gp = '-';
        }

















        //  MATH

        if($sub5 == 0){
            $sub5_gp = 0;
            $sub5_grade = 'Abs';

        } else {


            if ($sub5 >= 90 && $sub5 <= 100) {
                $sub5_gp = 4.0;
                $sub5_grade = 'A+';
            } elseif ($sub5 >= 80 && $sub5 <= 90) {
                $sub5_gp = 3.6;
                $sub5_grade = 'A';
            } elseif ($sub5 >= 70 && $sub5 <= 80) {
                $sub5_gp = 3.2;
                $sub5_grade = 'B+';
            } elseif ($sub5 >= 60 && $sub5 <= 70) {
                $sub5_gp = 2.8;
                $sub5_grade = 'B';
            } elseif ($sub5 >= 50 && $sub5 <= 60) {
                $sub5_gp = 2.4;
                $sub5_grade = 'C+';
            } elseif ($sub5 >= 40 && $sub5 <= 50) {
                $sub5_gp = 2.0;
                $sub5_grade = 'C';
            } elseif ($sub5 >= 35 && $sub5 <= 40) {
                $sub5_gp = 1.6;
                $sub5_grade = 'D';
            } elseif ($sub5 > 0 && $sub5 < 35) {
                $sub5_gp = '-';
                $sub5_grade = 'NG';
            }
        }





        if($sub5 != 0){
            if ($sub33_total >= 90 && $sub33_total <= 100) {
                $sub33 = 4.0;
                $sub33_space = 4.0;
                $sub33_gp = 'A+';
            } elseif ($sub33_total >= 80 && $sub33_total <= 90) {
                $sub33 = 3.6;
                $sub33_space = 3.6;
                $sub33_gp = 'A';
            } elseif ($sub33_total >= 70 && $sub33_total <= 80) {
                $sub33 = 3.2;
                $sub33_space = 3.2;
                $sub33_gp =  'B+';
            } elseif ($sub33_total >= 60 && $sub33_total <= 70) {
                $sub33 = 2.8;
                $sub33_space = 2.8;
                $sub33_gp = 'B';
            } elseif ($sub33_total >= 50 && $sub33_total <= 60) {
                $sub33 = 2.4;
                $sub33_space = 2.4;
                $sub33_gp = 'C+';
            } elseif ($sub33_total >= 40 && $sub33_total <= 50) {
                $sub33 = 2.0;
                $sub33_space = 2.0;
                $sub33_gp =  'C';
            } elseif ($sub33_total >= 35 && $sub33_total <= 40) {
                $sub33 = 1.6;
                $sub33_space = 1.6;
                $sub33_gp =  'D';
            } elseif ($sub33_total > 0 &&   $sub33_total < 35) {
                $sub33 = 0;
                $sub33_space = '-';
                $sub33_gp = '-';
            }
        } elseif($sub5 == 0){
            $sub33 = 0;
            $sub33_space = '-';
            $sub33_gp = '-';
        }








        //  SCIENCE TH //



        if($sub6_num == 0){
            $sub6_num_gp = 0;
            $sub6_num_grade = 'Abs';

        } else {


            if ($sub6_num >= 90 && $sub6_num <= 100) {
                $sub6_num_gp = 4.0;
                $sub6_num_grade = 'A+';
            } elseif ($sub6_num >= 80 && $sub6_num <= 90) {
                $sub6_num_gp = 3.6;
                $sub6_num_grade = 'A';
            } elseif ($sub6_num >= 70 && $sub6_num <= 80) {
                $sub6_num_gp = 3.2;
                $sub6_num_grade = 'B+';
            } elseif ($sub6_num >= 60 && $sub6_num <= 70) {
                $sub6_num_gp = 2.8;
                $sub6_num_grade = 'B';
            } elseif ($sub6_num >= 50 && $sub6_num <= 60) {
                $sub6_num_gp = 2.4;
                $sub6_num_grade = 'C+';
            } elseif ($sub6_num >= 40 && $sub6_num <= 50) {
                $sub6_num_gp = 2.0;
                $sub6_num_grade = 'C';
            } elseif ($sub6_num >= 35 && $sub6_num <= 40) {
                $sub6_num_gp = 1.6;
                $sub6_num_grade = 'D';
            } elseif ($sub6_num > 0 && $sub6_num < 35) {
                $sub6_num_gp = '-';
                $sub6_num_grade = 'NG';
            }

        }


        //SCIENCE PR

        if($sub7_num == 0){
            $sub7_num_gp = 0;
            $sub7_num_grade = 'Abs';

        } else {


            if ($sub7_num >= 90 && $sub7_num <= 100) {
                $sub7_num_gp = 4.0;
                $sub7_num_grade = 'A+';
            } elseif ($sub7_num >= 80 && $sub7_num <= 90) {
                $sub7_num_gp = 3.6;
                $sub7_num_grade = 'A';
            } elseif ($sub7_num >= 70 && $sub7_num <= 80) {
                $sub7_num_gp = 3.2;
                $sub7_num_grade = 'B+';
            } elseif ($sub7_num >= 60 && $sub7_num <= 70) {
                $sub7_num_gp = 2.8;
                $sub7_num_grade = 'B';
            } elseif ($sub7_num >= 50 && $sub7_num <= 60) {
                $sub7_num_gp = 2.4;
                $sub7_num_grade = 'C+';
            } elseif ($sub7_num >= 40 && $sub7_num <= 50) {
                $sub7_num_gp = 2.0;
                $sub7_num_grade = 'C';
            } elseif ($sub7_num >= 35 && $sub7_num <= 40) {
                $sub7_num_gp = 1.6;
                $sub7_num_grade = 'D';
            } elseif ($sub7_num > 0 && $sub7_num < 35) {
                $sub7_num_gp = '-';
                $sub7_num_grade = 'NG';
            }
        }


        if($get_sub6_num != 0 && $get_sub7_num != 0){
            if ($sub44_total >= 90 && $sub44_total <= 100) {
                $sub44 = 4.0;
                $sub44_space = 4.0;
                $sub44_gp = 'A+';
            } elseif ($sub44_total >= 80 && $sub44_total <= 90) {
                $sub44 = 3.6;
                $sub44_space = 3.6;
                $sub44_gp = 'A';
            } elseif ($sub44_total >= 70 && $sub44_total <= 80) {
                $sub44 = 3.2;
                $sub44_space = 3.2;
                $sub44_gp = 'B+';
            } elseif ($sub44_total >= 60 && $sub44_total <= 70) {
                $sub44 = 2.8;
                $sub44_space = 2.8;
                $sub44_gp = 'B';
            } elseif ($sub44_total >= 50 && $sub44_total <= 60) {
                $sub44 = 2.4;
                $sub44_space = 2.4;
                $sub44_gp = 'C+';
            } elseif ($sub44_total >= 40 && $sub44_total <= 50) {
                $sub44 = 2.0;
                $sub44_space = 2.0;
                $sub44_gp =  'C';
            } elseif ($sub44_total >= 35 && $sub44_total <= 40) {
                $sub44 = 1.6;
                $sub44_space = 1.6;
                $sub44_gp =  'D';
            } elseif ($sub44_total > 0 &&   $sub44_total < 35) {
                $sub44 = 0;
                $sub44_space = '-';
                $sub44_gp = '-';
            }
        }elseif($get_sub6_num == 0 || $get_sub7_num == 0){
            $sub44 = 0;
            $sub44_space = '-';
            $sub44_gp = '-';
        }

















        //  SOCIAL TH //



        if($sub8_num == 0){
            $sub8_num_gp = 0;
            $sub8_num_grade = 'Abs';

        } else {
            if ($sub8_num >= 90 && $sub8_num <= 100) {
                $sub8_num_gp = 4.0;
                $sub8_num_grade = 'A+';
            } elseif ($sub8_num >= 80 && $sub8_num <= 90) {
                $sub8_num_gp = 3.6;
                $sub8_num_grade = 'A';
            } elseif ($sub8_num >= 70 && $sub8_num <= 80) {
                $sub8_num_gp = 3.2;
                $sub8_num_grade = 'B+';
            } elseif ($sub8_num >= 60 && $sub8_num <= 70) {
                $sub8_num_gp = 2.8;
                $sub8_num_grade = 'B';
            } elseif ($sub8_num >= 50 && $sub8_num <= 60) {
                $sub8_num_gp = 2.4;
                $sub8_num_grade = 'C+';
            } elseif ($sub8_num >= 40 && $sub8_num <= 50) {
                $sub8_num_gp = 2.0;
                $sub8_num_grade = 'C';
            } elseif ($sub8_num >= 35 && $sub8_num <= 40) {
                $sub8_num_gp = 1.6;
                $sub8_num_grade = 'D';
            } elseif ($sub8_num > 0 && $sub8_num < 35) {
                $sub8_num_gp = '-';
                $sub8_num_grade = 'NG';
            }

        }


        //SOCIAL PR

        if($sub9_num == 0){
            $sub9_num_gp = 0;
            $sub9_num_grade = 'Abs';

        } else {


            if ($sub9_num >= 90 && $sub9_num <= 100) {
                $sub9_num_gp = 4.0;
                $sub9_num_grade = 'A+';
            } elseif ($sub9_num >= 80 && $sub9_num <= 90) {
                $sub9_num_gp = 3.6;
                $sub9_num_grade = 'A';
            } elseif ($sub9_num >= 70 && $sub9_num <= 80) {
                $sub9_num_gp = 3.2;
                $sub9_num_grade = 'B+';
            } elseif ($sub9_num >= 60 && $sub9_num <= 70) {
                $sub9_num_gp = 2.8;
                $sub9_num_grade = 'B';
            } elseif ($sub9_num >= 50 && $sub9_num <= 60) {
                $sub9_num_gp = 2.4;
                $sub9_num_grade = 'C+';
            } elseif ($sub9_num >= 40 && $sub9_num <= 50) {
                $sub9_num_gp = 2.0;
                $sub9_num_grade = 'C';
            } elseif ($sub9_num >= 35 && $sub9_num <= 40) {
                $sub9_num_gp = 1.6;
                $sub9_num_grade = 'D';
            } elseif ($sub9_num > 0 && $sub9_num < 35) {
                $sub9_num_gp = '-';
                $sub9_num_grade = 'NG';
            }
        }









//
//                $sub11_total = $get_sub1_num + $get_sub2_num;
//                $sub22_total = $get_sub3_num + $get_sub4_num;
//
//                $sub44_total = $get_sub6_num + $get_sub7_num;
//                $sub55_total = $get_sub8_num + $get_sub9_num;
//                $sub66_total = $get_sub10_num + $get_sub11_num;





//
//                if($get_sub8_num == 0 || $get_sub9_num == 0){
//                    $sub55 = '-';
//                        } else {
        // 'A+'; 'A'; 'B+'; 'B'; 'C+'; 'C'; 'D'; 0;  $sub22_gp = 'NG';


        if($get_sub8_num != 0 && $get_sub9_num != 0){

            if ($sub55_total >= 90 && $sub55_total <= 100) {
                $sub55 = 4.0;
                $sub55_space = 4.0;
                $sub55_gp = 'A+';
            } elseif ($sub55_total >= 80 && $sub55_total <= 90) {
                $sub55 = 3.6;
                $sub55_space = 3.6;
                $sub55_gp = 'A';
            } elseif ($sub55_total >= 70 && $sub55_total <= 80) {
                $sub55 = 3.2;
                $sub55_space = 3.2;
                $sub55_gp = 'B+';
            } elseif ($sub55_total >= 60 && $sub55_total <= 70) {
                $sub55 = 2.8;
                $sub55_space = 2.8;
                $sub55_gp = 'B';
            } elseif ($sub55_total >= 50 && $sub55_total <= 60) {
                $sub55 = 2.4;
                $sub55_space = 2.4;
                $sub55_gp = 'C+';
            } elseif ($sub55_total >= 40 && $sub55_total <= 50) {
                $sub55 = 2.0;
                $sub55_space = 2.0;
                $sub55_gp =  'C';
            } elseif ($sub55_total >= 35 && $sub55_total <= 40) {
                $sub55 = 1.6;
                $sub55_space = 1.6;
                $sub55_gp = 'D';
            } elseif ($sub55_total > 0 &&   $sub55_total < 35) {
                $sub55 = 0;
                $sub55_space = '-';
                $sub55_gp = '-';
            }
        }elseif($get_sub8_num == 0 || $get_sub9_num == 0){
            $sub55 = 0;
            $sub55_space = '-';
            $sub55_gp = '-';
        }


















        //  LOCAL TH //



        if($sub10_num == 0){
            $sub10_num_gp = 0;
            $sub10_num_grade = 'Abs';

        } else {


            if ($sub10_num >= 90 && $sub10_num <= 100) {
                $sub10_num_gp = 4.0;
                $sub10_num_grade = 'A+';
            } elseif ($sub10_num >= 80 && $sub10_num <= 90) {
                $sub10_num_gp = 3.6;
                $sub10_num_grade = 'A';
            } elseif ($sub10_num >= 70 && $sub10_num <= 80) {
                $sub10_num_gp = 3.2;
                $sub10_num_grade = 'B+';
            } elseif ($sub10_num >= 60 && $sub10_num <= 70) {
                $sub10_num_gp = 2.8;
                $sub10_num_grade = 'B';
            } elseif ($sub10_num >= 50 && $sub10_num <= 60) {
                $sub10_num_gp = 2.4;
                $sub10_num_grade = 'C+';
            } elseif ($sub10_num >= 40 && $sub10_num <= 50) {
                $sub10_num_gp = 2.0;
                $sub10_num_grade = 'C';
            } elseif ($sub10_num >= 35 && $sub10_num <= 40) {
                $sub10_num_gp = 1.6;
                $sub10_num_grade = 'D';
            } elseif ($sub10_num > 0 && $sub10_num < 35) {
                $sub10_num_gp = '-';
                $sub10_num_grade = 'NG';
            }

        }


        //LOCAL PR

        if($sub11_num == 0){
            $sub11_num_gp = 0;
            $sub11_num_grade = 'Abs';

        } else {


            if ($sub11_num >= 90 && $sub11_num <= 100) {
                $sub11_num_gp = 4.0;
                $sub11_num_grade = 'A+';
            } elseif ($sub11_num >= 80 && $sub11_num <= 90) {
                $sub11_num_gp = 3.6;
                $sub11_num_grade = 'A';
            } elseif ($sub11_num >= 70 && $sub11_num <= 80) {
                $sub11_num_gp = 3.2;
                $sub11_num_grade = 'B+';
            } elseif ($sub11_num >= 60 && $sub11_num <= 70) {
                $sub11_num_gp = 2.8;
                $sub11_num_grade = 'B';
            } elseif ($sub11_num >= 50 && $sub11_num <= 60) {
                $sub11_num_gp = 2.4;
                $sub11_num_grade = 'C+';
            } elseif ($sub11_num >= 40 && $sub11_num <= 50) {
                $sub11_num_gp = 2.0;
                $sub11_num_grade = 'C';
            } elseif ($sub11_num >= 35 && $sub11_num <= 40) {
                $sub11_num_gp = 1.6;
                $sub11_num_grade = 'D';
            } elseif ($sub11_num > 0 && $sub11_num < 35) {
                $sub11_num_gp = '-';
                $sub11_num_grade = 'NG';
            }
        }




        // 'A+'; 'A'; 'B+'; 'B'; 'C+'; 'C'; 'D'; 0;  $sub22_gp = 'NG';



        if($get_sub10_num != 0 && $get_sub11_num != 0){
            if ($sub66_total >= 90 && $sub66_total <= 100) {
                $sub66 = 4.0;
                $sub66_space = 4.0;
                $sub66_gp = 'A+';
            } elseif ($sub66_total >= 80 && $sub66_total <= 90) {
                $sub66 = 3.6;
                $sub66_space = 3.6;
                $sub66_gp =  'A';
            } elseif ($sub66_total >= 70 && $sub66_total <= 80) {
                $sub66 = 3.2;
                $sub66_space = 3.2;
                $sub66_gp =  'B+';
            } elseif ($sub66_total >= 60 && $sub66_total <= 70) {
                $sub66 = 2.8;
                $sub66_space = 2.8;
                $sub66_gp = 'B';
            } elseif ($sub66_total >= 50 && $sub66_total <= 60) {
                $sub66 = 2.4;
                $sub66_space = 2.4;
                $sub66_gp = 'C+';
            } elseif ($sub66_total >= 40 && $sub66_total <= 50) {
                $sub66 = 2.0;
                $sub66_space = 2.0;
                $sub66_gp = 'C';
            } elseif ($sub66_total >= 35 && $sub66_total <= 40) {
                $sub66 = 1.6;
                $sub66_space = 1.6;
                $sub66_gp = 'D';
            } elseif ($sub66_total > 0 && $sub66_total < 35) {
                $sub66 = 0;
                $sub66_space = '-';
                $sub66_gp = '-';
            }
        }elseif($get_sub10_num == 0 || $get_sub11_num == 0){
            $sub66 = 0;
            $sub66_space = '-';
            $sub66_gp = '-';
        }



        $a = 5; $b = 8; $c = 6; $d = 8; $e = 8; $f = 4;


//                if($sub1_num != 0  && $sub2_num != 0  && $sub3_num != 0  && $sub4_num != 0  && $sub5 != 0  && $sub6_num ==0
//                    && $sub7_num ==0 && $sub8_num ==0 && $sub9_num ==0 && $sub10_num ==0 && $sub11_num ==0)  {
        $final = $a *$sub11 + $b * $sub22  + $c * $sub33 + $d * $sub44 + $e * $sub55 + $f * $sub66;
        $GPA = round($final/39,1);
        //}

//
//                if($sub1_num == 0  )  {
//                    $final = $a *$sub11 + $b * $sub22  + $c * $sub33 + $d * $sub44 + $e * $sub55 + $f * $sub66;
//                    $GPA = round($final/39,1);
//
//                    dd($GPA);
//                } else {
//                    $GPA = ' ';
//                    DD($GPA);
//                }



//
//                //}elseif($sub1_num_gp == 0)  {
//                $final = $a *$sub11 + $b * $sub22  + $c * $sub33 + $d * $sub44 + $e * $sub55 + $f * $sub66;
//
//                //dd($final);
//
//                $GPA = round($final/39,1);
//                dd($GPA);
//                //dd($GPA);
//                //  }





        $doi =Carbon::now()->format('Y-m-d');


        // $sub22_gp = 'NG';


        ;
        $students->sub11_gp  = $sub11_gp;
        $students->sub22_gp  = $sub22_gp;
        $students->sub33_gp  = $sub33_gp;
        $students->sub44_gp  = $sub44_gp;
        $students->sub55_gp  = $sub55_gp;
        $students->sub66_gp  = $sub66_gp;
        $students->GPA  = $GPA;



        $students->sub11_space = $sub11_space;
        // dd($students->sub11_space);
        $students->sub22_space = $sub22_space;
        $students->sub33_space = $sub33_space;
        $students->sub44_space = $sub44_space;
        $students->sub55_space = $sub55_space;
        $students->sub66_space = $sub66_space;




        $students->sym = request('sym');
        $students->name = request('name');
        $students->school = request('school');

        $students->dob = request('dob');
        $students->doi  = $doi;

        $students->year = request('year');

        //sub1
        $students->sub1_num  = $get_sub1_num;
        $students->sub1_num_gp  = $sub1_num_gp;
        $students->sub1_num_grade  = $sub1_num_grade;

        //sub2
        $students->sub2_num  = $get_sub2_num;
        $students->sub2_num_gp  = $sub2_num_gp;
        $students->sub2_num_grade  = $sub2_num_grade;

        //sub3
        $students->sub3_num  = $get_sub3_num;
        $students->sub3_num_gp  = $sub3_num_gp;
        $students->sub3_num_grade  = $sub3_num_grade;


        //sub4
        $students->sub4_num  = $get_sub4_num;
        $students->sub4_num_gp  = $sub4_num_gp;
        $students->sub4_num_grade  = $sub4_num_grade;

        //sub5  $sub5_grade
        $students->sub5  = $sub5;
        $students->sub5_gp  = $sub5_gp;
        $students->sub5_grade  = $sub5_grade;
        //SUB 6
        $students->sub6_num  = $get_sub6_num;
        $students->sub6_num_gp  = $sub6_num_gp;
        $students->sub6_num_grade  = $sub6_num_grade;

        ///SUB 7
        $students->sub7_num  = $get_sub7_num;
        $students->sub7_num_gp  = $sub7_num_gp;
        $students->sub7_num_grade  = $sub7_num_grade;


        // SUB 8
        $students->sub8_num  = $get_sub8_num;
        $students->sub8_num_gp  = $sub8_num_gp;
        $students->sub8_num_grade  = $sub8_num_grade;


        //SUB 9
        $students->sub9_num  = $get_sub9_num;
        $students->sub9_num_gp  = $sub9_num_gp;
        $students->sub9_num_grade  = $sub9_num_grade;

        $students->sub10_num  = $get_sub10_num;
        $students->sub10_num_gp  = $sub10_num_gp;
        $students->sub10_num_grade  = $sub10_num_grade;
        //SUB 9
        $students->sub11_num  = $get_sub11_num;
        $students->sub11_num_gp  = $sub11_num_gp;
        $students->sub11_num_grade  = $sub11_num_grade;



        $students->sub11  = $sub11;
        $students->sub22  = $sub22;
        $students->sub33  = $sub33;
        $students->sub44  = $sub44;
        $students->sub55  = $sub55;
        $students->sub66  = $sub66;

        $students->update();
        return redirect('/add-std');
    }



}
