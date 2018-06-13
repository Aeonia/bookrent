@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Available authors</div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            @if($authors)
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
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


