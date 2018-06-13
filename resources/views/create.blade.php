@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ajoute un auteur !</div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                        <form class="form" method="POST" action="{{ route('author.store') }}">
                                @csrf
                                <div class="field">
                                    <label for="author_name">Nom</label>
                                    <input type="text" name="name" id="author_name">
                                </div>

                                <input class="ui fluid button teal" type="submit" name="add_author" value="Ajouter">
                        </form>   
                        <form class="form" method="POST" action="{{ route('book.store') }}">
                                @csrf
                                <div class="field">
                                    <label for="book_name">Nom du livre</label>
                                    <input type="text" name="name" id="book_name">
                                </div>
                                <div class="field">
                                    <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                                </div>
                                <div id="selected">
                                <select v-model="selected" class="form-control" name="author" id="author">
                                    @foreach ($authors as $author)
                                    <option v-bind:value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                                <span>Selected: @{{ selected }} </span>
                                </div>
                                <input class="ui fluid button teal" type="submit" name="add_livre" value="Ajouter">
                        </form>      

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



