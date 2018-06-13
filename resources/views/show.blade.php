@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Title : {{ $book->name }}</div>
                <div class="card-header">Author(s) : 
                    <ul>
                        @foreach($authors as $author)
                            <li>{{ $author->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


