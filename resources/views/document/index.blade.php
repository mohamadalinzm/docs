@extends('layouts.app')

@section('content')
    <div class="row">
@foreach($documents as $document)

                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $document->name }}</h5>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        <div class="btn-group">
                                            <a href="document/{{$document->id}}"><button type="button" class="btn btn-sm btn-outline-secondary">show</button></a>
                                            <a href="document/{{$document->id}}/edit"><button type="button" class="btn btn-sm btn-outline-secondary">Edit</button></a>
                                        </div>
                                        <form action="{{ route('document.destroy', ['document' => $document]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <div class="text-right">
                                            <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
    @endforeach
    </div>
@endsection


