@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hello dear reader !</div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            @foreach ($books as $book)
                                <p>This is book {{ $book->name }}</p>
                                @foreach($book->authors as $author)
                                    <p>{{ $author->name }}</p>
                                @endforeach
                                <a href="{{ route('book.show', [$book]) }}">Read more</a> <!--récupère automatiquement l'id de l'objet Book)-->
                                <a href="{{ route('book.edit', [$book]) }}">Edit</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


