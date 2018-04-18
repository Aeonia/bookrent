@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenue à toi lecteur !</div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            @foreach ($authors as $author)
                                <p>This is {{ $author->name }}</p>
                                @foreach($author->books as $book)
                                    <p>{{ $book->name }}</p>
                                @endforeach
                                <a href="{{ route('book.show', [$book]) }}"></a> <!--récupère automatiquement l'id de l'objet Book)-->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


