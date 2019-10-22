@extends('layouts.app')

@section('content')
    <form action="{{ route('document.update', ['document' => $document]) }}" method="POST">
        @method('PATCH')
        @include('document.form')
        <button type="submit" class="btn btn-primary">save</button>
    </form>
@endsection
