@extends('layouts.master')

@section('content')

  <!DOCTYPE html>
  <html lang="en">
  <head>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>



  <div class="container">


{{--      <p style="coloe:redl;"> {{$errors}} </div>  </p>--}}




{{--      @if($errors)--}}
{{--          @foreach($errors->all() as  $errors )--}}
{{--              <li style="color: red;"> {{ $errors }} </li>--}}
{{--          @endforeach--}}
{{--      @endif--}}




                      <form  method ="POST" action="{{ url('insert') }}">
                          {{  csrf_field() }}
                          <hr>

                          <u> <h3 align="center" style="color:black;">बिधार्थीहरुको बिवरण प्रविष्ट गर्नुहोस </h3> </u>
                          <P align="center" style="color:darkblue;"> नोट : Absent को लागि 0 नम्बर दिनु होला </P>

                     <hr>














                        


                          <div class="col-xs-2">
                              <label for="name" style="color:black;">बिद्यालय रोज्नुहोस :</label>
                          <select name="school"  value="{{ old('school')}}" class="form-select" >
                              <option selected required> </option>
                              @foreach ($schools as $school)

{{--                                  @if (old('scl_name') == $school->id)--}}
{{--                                      <option value="{{$school->id}}" required>{{ $school->scl_name }} </option>--}}
{{--                                  @else--}}
                                      <option value="{{$school->scl_name}}" required>{{ $school->scl_name }}</option>
{{--                                  @endif--}}
                              @endforeach

                          </select>

                              <span>
                              @error('school')
                                 <li style="color: red;"> {{ @$message }} </li>
                              @enderror
                          </span>

                          </div>








                          <div class="col-xs-2">
                              <label for="name" style="color:black;">बिद्यार्थीको नाम :</label>
                              <input id="name" type="text" class="form-control" name="name" placeholder="Enter The Name"  value="{{old('name')}}" required>

                          </div>


                          <div class="col-xs-2">

                              <label for="name" style="color:black;">सिम्बोल .न :</label>
                              <input id="name" type="text" class="form-control" name="sym"  value="{{old('sym')}}" placeholder="Enter Sybmbol.NO" required>
                          </div>


                          <div class="col-xs-2">
                              <label for="dob" style="color:black;">जन्म मिति  :</label>
                              <input id="dob" type="text"  class="form-control" name="dob" placeholder="Date Of Birth" style="color:black;"   value="{{old('dob')}}" required>

                              <span>
                              @error('dob')
                                 <li style="color: red;"> {{ @$message }} </li>
                              @enderror
                          </span>


                          </div>


                          <div class="col-xs-2">
                              <br>  <br>
                              <label for="name"  style="color:brown;">Select Year:</label>
                              <select name="year" class="form-select" value="{{old('year')}}" >
                                  <option value="2079">2079</option>
                                  <option value="2080">2080</option>
                                  <option value="2081">2081</option>
                                  <option value="2082">2082</option>
                              </select>
                          </div>



                          <div class="col-xs-2">
                              <br>  <br>
                              <label for="sub3_num" style="color:brown;">अंग्रेजी (THEORY):</label>
                              <input id="address" type="text" class="form-control" name="sub1_num"  value="{{old('sub1_num')}}"  placeholder=" ENGLISH (TH)">

                              <span>
                              @error('sub1_num')
                                 <li style="color: red;"> {{ @$message }} </li>
                              @enderror
                          </span>

                          </div>





                          <div class="col-xs-2">
                              <br>  <br>
                              <label for="sub4_num" style="color:brown;"> अंग्रेजी(PRACTICAL):</label>
                              <input id="address" type="text" class="form-control" name="sub2_num"   value="{{old('sub2_num')}}" placeholder="ENGLISH(PR)" required>

                              <span>
                              @error('sub2_num')
                                 <li style="color: red;"> {{ @$message }} </li>
                              @enderror
                          </span>

                          </div>



                          <div class="col-xs-2">
                              <br>  <br>
                              <label for="sub1_num" style="color:brown;">नेपाली (THEORY):</label>
                              <input id="address" type="text" class="form-control" name="sub3_num"  value="{{old('sub3_num')}}" placeholder="Marks Nepali (TH)" required>
                              <span>
                              @error('sub3_num')
                                 <li style="color: red;"> {{ @$message }} </li>
                              @enderror
                          </span>
                          </div>



                          <div class="col-xs-2">
                              <br>  <br>
                              <label for="sub2_num" style="color:brown;"> नेपाली (PRACTICAL):</label>
                              <input id="address" type="text" class="form-control" name="sub4_num"  value="{{old('sub4_num')}}"  placeholder="Marks Nepali (PR)" required>

                              <span>
                              @error('sub4_num')
                                 <li style="color: red;"> {{ @$message }} </li>
                              @enderror
                          </span>
                          </div>



                          <div class="col-xs-2">
                              <br><br>
                              <label for="sub5" style="color:brown;"> गणित :</label>
                              <input id="address" type="text" class="form-control" name="sub5"   value="{{old('sub5')}}" placeholder="Math Subject" required>

                              <span>
                              @error('sub5')
                                 <li style="color: red;"> {{ @$message }} </li>
                              @enderror
                          </span>

                          </div>







                          <div class="col-xs-2">
                              <br><br>
                              <label for="sub8_num" style="color:brown;"> बिज्ञान/स्वास्थ्य/जनसंख्या (THEORY):</label>
                              <input id="sub8_num" type="text" class="form-control" name="sub6_num"  value="{{old('sub6_num')}}" placeholder="Science  & HP (TH)" required>

                              <span>
                              @error('sub6_num')
                                 <li style="color: red;"> {{ @$message }} </li>
                              @enderror
                          </span>
                          </div>


                          <div class="col-xs-2">
                              <br><br>
                              <label for="sub9_num" style="color:brown;"> बिज्ञान/स्वास्थ्य/जनसंख्या (PRACTICAL):</label>
                              <input id="sub9_num" type="text" class="form-control" name="sub7_num"  value="{{old('sub7_num')}}" placeholder="Science & HP (PR)" required>

                              <span>
                              @error('sub7_num')
                                 <li style="color: red;"> {{ @$message }} </li>
                              @enderror
                          </span>
                          </div>





                          <div class="col-sm-2">
                              <br><br>
                              <label for="sub6_num" style="color:brown;"> सामाजिक तथा सिर्जनात्मक कला (THEORY):</label>
                              <input id="address" type="text" class="form-control" name="sub8_num"  value="{{old('sub8_num')}}" placeholder="Enter Socia and Creative Arts(TH)" required>
                              <span>
                              @error('sub8_num')
                                 <li style="color: red;"> {{ @$message }} </li>
                              @enderror
                          </span>

                          </div>
                          <br><br>


                          <div class="col-xs-2">
                              <br><br>
                              <label for="sub7_num" style="color:brown;"> सामाजिक तथा सिर्जनात्मक कला(PRACTICAL):</label>
                              <input id="sub7_num" type="text" class="form-control" name="sub9_num"   value="{{old('sub9_num')}}"  placeholder="Social and Creative Arts (PR)" required>

                              <span>
                              @error('sub9_num')
                                 <li style="color: red;"> {{ @$message }} </li>
                              @enderror
                          </span>
                          </div>



                          <div class="col-xs-2">
                              <br><br><br>
                              <label for="sub11_num" style="color:brown;"> स्थानिय बिषय (THEORY):</label>
                              <input id="sub11_num" type="text" class="form-control" name="sub10_num"  value="{{old('sub10_num')}}" placeholder="Local Subject(PR):" required>
                              <span>
                              @error('sub10_num')
                                 <li style="color: red;"> {{ @$message }} </li>
                              @enderror
                          </span>

                          </div>


                          <div class="col-xs-2">
                              <br><br>
                              <label for="sub11_num" style="color:brown;"> स्थानिय बिषय (PRACTICAL):</label>
                              <input id="sub11_num" type="text" class="form-control" name="sub11_num"  value="{{old('sub11_num')}}" placeholder="Local Subject(PR):" required>

                              <span>
                              @error('sub11_num')
                                 <li style="color: red;"> {{ @$message }} </li>
                              @enderror
                          </span>
                          </div>




                       <br><br><br>
                          <div class="container">

                              <div class="col-xs-12 col-xs-offset-0 col-sm-offset-5 col-sm-8">
                                  <br><br>
                                  <button class="btn btn-success btn-lg active"  type="submit">Add RESULT</button>
                              </div>
                          </div>



                      </form>



<HR>  <HR> <HR>
      <br>  <br>






  <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <div class="card">



                      <h3 align="center"> बिधार्थीहरु </h3>


                      <!-- /.card-header -->
                      <div class="card-body">
                          <table id="example2" class="table table-bordered table-hover">
                              <thead>
                              <tr>
                                  <th>न. </th>
                                  <th>   बिद्यार्थीको  नाम   </th>
                                  <th> बिद्यालयको नाम </th>
                                  <th> जी.पी.ए </th>
                                  <th> ACTIONS</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach ($students as $student)
                                  <tr align="center">
                                      <th >{{ $loop->iteration }}</th>
                                      <th>{{ $student->name }}</th>
                                      <th> {{ $student->school }}</th>
                                      <th> {{ $student->GPA }}</th>
                                      <th align="center">



                                         
                                          <a class="btn btn-dark fa fa-download" href = "download/{{ $student->id }}">  Download</a>
                                          <br>

                                          <a class="btn btn-primary fa fa-trash" href = "edit/{{ $student->id }}">  EDIT</a> <br> 
                                             <form action="{{url('delete/'.$student->id)}}"     method="post" onsubmit="return confirm('sure delete ?')">
                                                 @method('get')
                                                 @csrf  <br>  <br> 
                                                 <button>
                                                     <i class="btn btn-danger fa fa-trash"> DELETE</i>
                                                 </button>
                                             </form>


                                      </th>
                                  </tr>

                              @endforeach
                              </tbody>
                              <tfoot>
                              <tr>
                                  <th>न. </th>
                                  <th>   बिद्यार्थीको  नाम   </th>
                                  <th> बिद्यालयको नाम </th>
                                  <th> जी.पी.ए </th>
                                  <th> ACTIONS</th>
                              </tr>
                              </tfoot>
                          </table>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->

  </section>

<BR> <br>


  </div>

  </div>








@endsection

