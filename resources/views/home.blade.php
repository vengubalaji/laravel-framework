@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
<h2>Student Management System</h2>
<a class="nav_button" href="{{ route('student.index') }}">Student List</a>
{{--  <h1>{{ $student['name'] }}</h1>
<p>{{ $student['roll_no'] }}</p>  --}}
@endsection