@extends('layouts.app')

@section('title', $student['name'])

@section('content')
<h2>Student Details</h2>
<a class="nav_button" href="{{ route('student.index') }}">BACK</a>
@guest
    @if (Route::has('register'))
        <a class="nav_button" href="{{ route('register') }}">Register</a>
    @endif
    <a class="nav_button" href="{{ route('login') }}">Login</a>
@else
    <a class="nav_button" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action={{ route('logout') }} method="POST"
        style="display: none;">
        @csrf
    </form>
@endguest
<h1>{{ $student['name'] }}</h1>
<p>Roll No : <b>{{ $student['roll_no'] }}</b></p>
<p>Email ID : <b>{{ $student['email'] }}</b></p>
<p>Address : <b>{{ $student['address'] }}</b></p>
<h3>Certificates</h3>
@forelse ($student->certificates as $certificate)
    <p>{{ $certificate->name }} - {{ $certificate->desc }}</p>
@empty
    <p>No certificate yet!</p>
@endforelse
@endsection
{{-- @if ($student->certificates_count)
    ( {{ $student->certificates_count }}  Certificates );
@else
    No Certificates yet!        
@endif --}}