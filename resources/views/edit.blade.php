@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifie ton livre !</div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8"> 
                        <form class="form" method="POST" action="{{ route('book.update', [$book]) }}">
                                @method('PUT')
                                @csrf
                                <div class="field">
                                    <label for="book_name">Nom du livre</label>
                                    <input type="text" name="name" id="book_name">
                                </div>
                                <div class="field">
                                    <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                                </div>

                                <select class="form-control" name="author" id="author">
                                    @foreach ($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                            
                                <input class="ui fluid button teal" type="submit" name="add_livre" value="Ajouter">
                        </form>      
                        <form class="ui form" id="remove_book_form" method="POST" action="{{ route('book.destroy', [$book]) }}">
				            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary">Supprimer</button>
			            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


