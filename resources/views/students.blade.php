@extends('layouts.master')

@section('content')




    <h1>  Add Students </h1>
    <form action="{{ url('insert') }}" method ="post">
        {{  csrf_field() }}

        <input type="text" name="name" placeholder="Enter the name"> <br>
        <input type="text" name="address" placeholder="Enter the address"> <br>
        <button type="submit"> Add Member </button>
    </form>

@endsection
