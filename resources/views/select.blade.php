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
        <form  method ="POST" action="{{ url('insert-select') }}">
            {{  csrf_field() }}


            <div class="col-xs-6">
                <label for="name" style="color:black;">School's Name:</label>
                <input id="name" type="text" class="form-control" name="scl_name" placeholder="Enter The School's Name"  value="{{old('name')}}" required>
            </div>


            <div class="container">
                <br><br><br> <br>
                <div class="col-xs-12 col-xs-offset-0 col-sm-offset-1 col-sm-4">

                    <button class="btn btn-primary btn-lg active" type="submit">SELECT SCHOOL</button>
                </div>
            </div>

    </div>
    </form>

    <hr> <hr>

</div>







@endsection



