

    <HTML>
<HEAD>
    <STYLE>
        body
        {
            border-radius: 20px;
            border-style: double;
            color:solid black;
        }

    </STYLE>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>

@foreach ($students as $student)
<BODY>
<img src="{{ public_path('Captu.png') }}" style="margin-left:15px; width: 650px; height: 220px;">

<h2 style="margin-left: 290px; color:navy">
    <b> GRADE SHEET </b>
</h2>
<H5 style="margin-left: 30px; color:black;">THE GRADE(S) SECURED BY : <span style="text-decoration:underline;
text-decoration-style: dotted;">              {{  strtoupper($student->name) }}   </span>   <BR>


DATE OF BIRTH  :<span style="text-decoration:underline;
text-decoration-style: dotted;">{{ $student->dob }} </span>

  <span style="margin-left: 20px;"> </span>
    SYMBOL NO <span style="text-decoration:underline;
text-decoration-style: dotted;"> 0089888 </span>

    <span style="margin-left: 20px;"> </span>
    GRADE:  <span style="text-decoration:underline;
text-decoration-style: dotted;"> FIVE </span> <BR>
    SCHOOL: <span style="text-decoration:underline;
text-decoration-style: dotted;">  {{  strtoupper($student->school) }} </span>
    <span style="margin-left: 3px;"> </span>

<br>     DISTRICT : <span style="text-decoration:underline;
text-decoration-style: dotted;"> GULMI </span>

    <span style="margin-left: 5px;"> </span>

    PROVINCE:  <span style="text-decoration:underline;
text-decoration-style: dotted;"> LUMBINI </span>
    <span>IN THE </span>
    <span style="text-decoration:underline;
text-decoration-style: dotted;">  BASIC LEVEL COMPLETION EXAMINATION(CLASS 5)
      </span> 2079 ARE GIVEN BELOW
</H5>












<table  style="margin-left: 5px;" border="1" cellpadding="0" cellspacing="0" width="690px">
    <tr>
        <th rowspan="2">  S.N  </th>
        <th rowspan="2">SUBJECTS </th>
        <th rowspan="2">CREDIT <BR> HOUR</th>
        <th colspan="3">OBTAINED GRADE</th>

        <th  rowspan="2">GRADE <BR> POINT</th>
        <th rowspan="2">REMARKS</th>
    </tr>
    <tr>


        <th>TH</th>
        <th>PR</th>
        <th>FINAL</th>


    </tr>
    <tr>
        <th>  1  </th>
        <th> ENGLISH  </th>
        <th> 5 </th>
        <th>{{ $student->sub1_num_grade }}</th>
        <th>{{ $student->sub2_num_grade }}</th>
        <th> {{ $student->sub11_gp }} </th>
         <th>{{ $student->sub11_space }}</th>
        <th rowspan="8"></th>
    </tr>
    <tr>
        <th>  2  </th>
        <th>NEPALI</th>
        <th>8</th>
        <th>{{ $student->sub3_num_grade }}</th>
        <th>{{ $student->sub4_num_grade }}</th>
        <th>  {{ $student->sub22_gp }}</th>
        <th>{{ $student->sub22_space }}</th>

    </tr>
    <tr>
        <th>  3  </th>
        <th>MATHEMATICS</th>
        <th> 6 </th>
        <th colspan="2">{{ $student->sub5_grade }}</th>
        <th> {{ $student->sub33_gp }}</th>
        <th>{{ $student->sub33_space }}</th>

    </tr>
    <tr>
        <th>  4  </th>
        <th>SCIENCE AND HP</th>
        <th>8 </th>
        <th>{{ $student->sub6_num_grade }}</th>
        <th>{{ $student->sub7_num_grade }}</th>
        <th> {{ $student->sub44_gp }}</th>
        <th>{{ $student->sub44_space }}</th>

    </tr>
    <tr>
        <th>  5  </th>
        <th>SOCIAL STUDIES <br> &  <br> CREATIVE ARTS</th>
        <th>8</th>
        <th>{{ $student->sub8_num_grade }}</th>
        <th>{{ $student->sub9_num_grade }}</th>
        <th> {{ $student->sub55_gp }}</th>
        <th>{{ $student->sub55_space }}</th>

    </tr>
    <tr>
        <th> 6  </th>
        <th>LOCAL SUBJECT</th>
        <th>4 </th>
        <th>{{ $student->sub10_num_grade }}</th>
        <th>{{ $student->sub11_num_grade }}</th>
        <th> {{ $student->sub66_gp }}</th>
        <th>{{ $student->sub66_space }} </th>
    </tr>




    <tr>
        <th> </th>
        <th> </th>
        <th colspan="5" > <BR> <BR> GRADE POINT AVERAGE(GPA): {{ $student->GPA }} </th>


    </tr>

</table>
<br>

<img src="{{ public_path('grade.jpg') }}" style="margin-left:15px; width: 450px; height: 180px;">

<h4 style="margin-left: 20px; color:navy"> 1.One Credit Hour Equals 32 Clock Hours <br>2. TH: Theory, PR:Practical
    <br>  3.Abs/AB*:Absent

</h4>



<h4 style="margin-left: 500px; color:navy"> .................................... </h4>
<h4 style="margin-left: 20px; color:navy"> DATE OF ISSUE: {{ $student->doi }} <span style="margin-left:250px;"> EDUCATION OFFICER </span> </h4>

@endforeach


</BODY>
</HTML>



