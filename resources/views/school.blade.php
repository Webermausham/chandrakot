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
    <div class="container mt-3">
        <form  method ="POST" action="{{ url('insert-school') }}">
            {{  csrf_field() }}


            <div class="col-xs-6">
                <label for="name" style="color:black;">School's Name:</label>
                <input id="name" type="text" class="form-control" name="scl_name" placeholder="Enter The School's Name"  value="{{old('name')}}" required>
            </div>


        <div class="container">
            <br><br><br> <br>
            <div class="col-xs-12 col-xs-offset-0 col-sm-offset-1 col-sm-4">

                <button class="btn btn-primary btn-lg active" type="submit">ADD SCHOOL</button>
            </div>
        </div>

    </div>
    </form>

    <hr> <hr>
<br> <br> <br> <br>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">



                            <h3 align="center"> All Schools</h3>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>School's Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($schools as $school)
                                    <tr align="center">
                                        <th >{{ $loop->iteration }}</th>
                                        <th>{{ $school->scl_name }}</th>
                                        <th align="center">
                                            <a class="btn btn-primary fa fa-eye">    view </a>
                                            <a class="btn btn-danger fa fa-trash">  DELETE</a>
                                        </th>
                                    </tr>

                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>School's Name</th>

                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

    </section>
    <!-- /.content -->
</div>







@endsection



