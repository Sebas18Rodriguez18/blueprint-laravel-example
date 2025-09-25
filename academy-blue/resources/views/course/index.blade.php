@extends('templates.base')
@section('title', 'Cursos')
@section('subtitle', 'Listado')
@section('content')
    @include('templates.messages')

    <div class="row col-lg-12">
        <div class="d-flex justify-content-end col-12">
            <a href="{{ route('courses.create') }}" class="btn btn-primary btn-fill mr-2">Crear</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <table id="table_data" class="table table-hover table-striped table-responsive">
                <thead>
                    <td>Id</td>
                    <td>Titulo</td>
                    <td>Descripción</td>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course['id'] }}</td>
                            <td>{{ $course['title'] }}</td>
                            <td>{{ $course['description'] }}</td>
                            <td>
                                <a href="" class="btn btn-info btn-fill btn-sm mr-2" title="Ver"
                                data-toggle="modal" data-target="#modalShow{{ $course['id'] }}">
                                    <i class="nc-icon nc-zoom-split"></i>
                                </a>
                                <a href="{{ route('courses.edit', $course['id']) }}" class="btn btn-warning btn-fill btn-sm mr-2" title="Editar">
                                    <i class="nc-icon nc-tap-01"></i>
                                </a>
                                <form id="form-delete-{{ $course['id'] }}" action="{{ route('courses.destroy', $course['id']) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return remove();" class="btn btn-danger btn-fill btn-sm mr-2" title="Eliminar">
                                        <i class="nc-icon nc-simple-remove"></i>
                                    </button>
                                </form>
                            </td>
                            {{-- Modal --}}
                            <div class="modal fade modal-middle modal-primary" id="modalShow{{ $course['id'] }}"
                                tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center">
                                            <h5>Detalle</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>ID:</strong>{{ $course['id'] }}</p>
                                            <p><strong>Titulo:</strong>{{ $course['title'] }}</p>
                                            <p><strong>Descripción:</strong>{{ $course['description'] }}</p>
                                            <p><strong>Precio:</strong>{{ $course['price'] }}</p>
                                            <p><strong>Instructor:</strong>{{ $course->instructor->name }}</p>
                                            <p><strong>Categoría:</strong>{{ $course->category->name }}</p>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-link btn-simple" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Fin modal --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection