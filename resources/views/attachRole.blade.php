@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}</div>
            </div>
        </div>
    </div>
</div>
<form class="form" method="POST" action="{{ route('role.attachRole') }}">
                                @csrf

                                <select class="form-control" name="role" id="role">
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            
                                <input class="ui fluid button teal" type="submit" name="add_livre" value="Ajouter">
                        </form> 
@endsection