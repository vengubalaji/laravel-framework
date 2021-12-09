@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
<h2>Student Management System</h2>
<a class="nav_button" href="{{ route('student.index') }}">Student List</a>

@guest
    @if (Route::has('register'))
        <a class="nav_button" href="{{ route('register') }}">Register</a>
    @endif
    <a class="nav_button" href="{{ route('login') }}">Login</a>
@else
    <a class="nav_button" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout ( {{ Auth::user()->name }} )</a>
    <form id="logout-form" action={{ route('logout') }} method="POST"
        style="display: none;">
        @csrf
    </form>
@endguest

{{--  <h1>{{ $student['name'] }}</h1>
<p>{{ $student['roll_no'] }}</p>  --}}
@endsection