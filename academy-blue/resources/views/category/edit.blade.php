@extends('templates.base')
@section('title', 'Categorías')
@section('subtitle', 'Editar')
@section('content')
    @include('templates.messages')

    <div class="row p-2">
        <div class="col-lg-12">
            <form action="{{ route('categories.update', $category['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row col-lg-12">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" name="name" id="name" required value="{{ $category['name'] }}">
                </div>
                <div class="row col-lg-12">
                    <label for="description">Descripción:</label>
                    <input type="text" class="form-control" name="description" id="description" value="{{ $category['description'] }}">
                </div>
                <div class="row col-lg-12">
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-success btn-block btn-fill">Guardar</button>
                    </div>
                    <div class="col-lg-6">
                        <a href="{{ route('categories.index') }}" class="btn btn-danger btn-block btn-fill">
                            Cancelar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection