<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sym');
            $table->string('school');
            $table->string('dob');
            $table->string('doi');
            $table->string('year');

           // sub1_num','sub2_num','sub3_num','sub4_num','sub5_num',];

            //
// English(Th), English(Pr),
     //       Nepali(Th), Nepali(Pr),
//Math,Social_and_Creative_arts(Th),
// Social_and_Creative_arts(Pr)
//Science_and_hp(Th), Science_and_hp(Pr)
//,Local_Subject(Th),Local_Subject(Pr)



              $table->string('sub1_num')->nullable();
              $table->string('sub2_num')->nullable();
              $table->string('sub3_num')->nullable();
              $table->string('sub4_num')->nullable();
              $table->string('sub5')->nullable();
              $table->string('sub6_num')->nullable();
              $table->string('sub7_num')->nullable();
              $table->string('sub8_num')->nullable();
              $table->string('sub9_num')->nullable();
              $table->string('sub10_num')->nullable();
              $table->string('sub11_num')->nullable();

              $table->string('sub1_num_gp')->nullable();
              $table->string('sub1_num_grade')->nullable();
              $table->string('sub2_num_gp')->nullable();
              $table->string('sub2_num_grade')->nullable();

            $table->string('sub3_num_gp')->nullable();
            $table->string('sub3_num_grade')->nullable();
            $table->string('sub4_num_gp')->nullable();
            $table->string('sub4_num_grade')->nullable();
            $table->string('sub5_gp')->nullable();
            $table->string('sub5_grade')->nullable();
            $table->string('sub6_num_gp')->nullable();
            $table->string('sub6_num_grade')->nullable();
            $table->string('sub7_num_gp')->nullable();
            $table->string('sub7_num_grade')->nullable();
            $table->string('sub8_num_gp')->nullable();
            $table->string('sub8_num_grade')->nullable();
            $table->string('sub9_num_gp')->nullable();
            $table->string('sub9_num_grade')->nullable();
            $table->string('sub10_num_gp')->nullable();
            $table->string('sub10_num_grade')->nullable();
            $table->string('sub11_num_gp')->nullable();
            $table->string('sub11_num_grade')->nullable();

             //'sub11','sub22','sub33','sub44','sub55','sub66'

            $table->string('sub11')->nullable();
            $table->string('sub22')->nullable();
            $table->string('sub33')->nullable();
            $table->string('sub44')->nullable();
            $table->string('sub55')->nullable();
            $table->string('sub66')->nullable();
            $table->string('GPA')->nullable();

            $table->string('sub11_gp')->nullable();
            $table->string('sub22_gp')->nullable();
            $table->string('sub33_gp')->nullable();
            $table->string('sub44_gp')->nullable();
            $table->string('sub55_gp')->nullable();
            $table->string('sub66_gp')->nullable();





            $table->string('sub11_space')->nullable();
            $table->string('sub22_space')->nullable();
            $table->string('sub33_space')->nullable();
            $table->string('sub44_space')->nullable();
            $table->string('sub55_space')->nullable();
            $table->string('sub66_space')->nullable();


// sub11_gp sub22_gp  sub33_gp   sub44_gp   sub55_gp  sub66_gp


               //$sub7_num_gp

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student');
    }
}
