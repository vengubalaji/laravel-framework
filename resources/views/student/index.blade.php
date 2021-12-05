@extends('layouts.app')

@section('title', 'Students List')

@section('content')
  <h2>Students List</h2>
  <a class="nav_button" href="{{ route('home') }}">BACK</a>
  <a class="nav_button" href="{{ route('home') }}">HOME</a>
  <a class="nav_button" href="{{ route('student.create') }}">ADD</a>
  {{-- @each('student.partials.post', $student, 'post') --}}
  <table id="students_list" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Roll No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @forelse ($students as $key => $student)
        @include('student.partials.student', [])
      @empty
      No student found!
      @endforelse
    </tbody>
  </table>
@endsection