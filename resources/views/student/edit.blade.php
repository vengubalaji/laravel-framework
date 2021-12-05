@extends('layouts.app')

@section('title', 'Update Student')

@section('content')
<a style="float:none;" class="nav_button" href="{{ route('student.index') }}">BACK</a>
<form action={{ route('student.update',['student' => $student->id ]) }} method="POST">
    @csrf
    @method('PUT')
    @include('student.partials.form')
    <input type="submit" value="UPDATE" />
</form>
@endsection