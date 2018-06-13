@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your authors</div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            @foreach ($authors as $author)
                                <p>Name : {{ $author->name }}</p>
                                <p>Books : </p>
                                <ul>
                                @foreach($author->books as $book)
                                    <li>{{ $book->name }}</li>
                                    <a href="{{ route('book.show', [$book]) }}">Read more</a> <!--récupère automatiquement l'id de l'objet Book)-->
                                @endforeach
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


