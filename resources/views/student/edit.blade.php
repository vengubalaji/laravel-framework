@extends('layouts.app')

@section('title', 'Update Student')

@section('content')
<a style="float:none;" class="nav_button" href="{{ route('student.index') }}">BACK</a>
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
<form action={{ route('student.update',['student' => $student->id ]) }} method="POST">
    @csrf
    @method('PUT')
    @include('student.partials.form')
    <input type="submit" value="UPDATE" />
</form>
@endsection