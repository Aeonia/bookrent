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
                            <div class="btn-group-vertical">
                                <a href="{{ route('book.index') }}">See your books</a> <!--récupère automatiquement l'id de l'objet Book)-->
                                <a href="{{ route('book.create') }}">Add a new book !</a> 
                                <a href="{{ route('author.index') }}">The authors you've read from</a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
