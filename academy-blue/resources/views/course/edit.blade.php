@extends('templates.base')

@section('title', 'Cursos')
@section('subtitle', 'Crear')

@section('content')
    @include('templates.messages')
    <div class="row p-2">
        <div class="col-lg-12">
            <form action="{{ route('courses.update', $course['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row col-lg-12">
                    <label for="title">Titulo: </label>
                    <input type="text" class="form-control" name="title" id="title" required value="{{ $course['title'] }}">
                </div>
                <div class="row col-lg-12">
                    <label for="description">Descripción: </label>
                    <input type="text" class="form-control" name="description" id="description" value="{{ $course['description'] }}">
                </div>
                <div class="row col-lg-12">
                    <label for="price">Precio: </label>
                    <input type="number" class="form-control" name="price" id="price" value="{{ $course['price'] }}">
                </div>
                <div class="row col-lg-12">
                    <label for="instructor_id">Instructor: </label>
                    <select name="instructor_id" id="instructor_id" class="form-control" value="{{ $course['instructor_id'] }}">
                        @foreach ($instructors as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row col-lg-12">
                    <label for="category_id">Categoría: </label>
                    <select name="category_id" id="category_id" class="form-control" value="{{ $course['category_id'] }}>
                        @foreach ($categories as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row col-lg-12">
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-success btn-block btn-fill">Guardar</button>
                    </div>
                    <div class="col-lg-6">
                        <a href="{{ route('courses.index') }}" class="btn btn-danger btn-block btn-fill">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection