@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your books !</div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            @foreach ($books as $book)
                                <div class="card-body border">
                                    <div class="card-title">
                                        Title : {{ $book->name }}
                                    </div>
                                    @foreach($book->authors as $author)
                                        <div class="card-text">
                                            Author : {{ $author->name }}
                                        </div>
                                    @endforeach
                                    <a class="btn btn-primary btn-sm" href="{{ route('book.show', [$book]) }}">Read more</a><!--récupère automatiquement l'id de l'objet Book)-->
                                    <a class="btn btn-secondary btn-sm" href="{{ route('book.edit', [$book]) }}">Edit</a>
                                </div> 
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


