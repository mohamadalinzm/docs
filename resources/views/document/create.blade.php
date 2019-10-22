@extends('layouts.app')

@section('content')
    <form action="{{ route('document.store') }}" method="POST">
        @include('document.form')
        <button type="submit" class="btn btn-primary">save</button>
    </form>
@endsection
