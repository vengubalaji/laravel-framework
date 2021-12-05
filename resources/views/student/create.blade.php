@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
    <a style="float:none;" class="nav_button" href="{{ route('student.index') }}">BACK</a>
    <form action={{ route('student.store') }} method="POST">
        @csrf
        @include('student.partials.form')
        <input type="submit" value="ADD" />
    </form>
@endsection