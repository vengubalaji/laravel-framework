@extends('layouts.app')

@section('title', $student['name'])

@section('content')
<h2>Student Details</h2>
<a class="nav_button" href="{{ route('student.index') }}">BACK</a>
<h1>{{ $student['name'] }}</h1>
<p>Roll No : <b>{{ $student['roll_no'] }}</b></p>
<p>Email ID : <b>{{ $student['email'] }}</b></p>
<p>Address : <b>{{ $student['address'] }}</b></p>
@endsection