@extends('templates.base')
@section('title', 'Categorías')
@section('subtitle', 'Listado')
@section('content')
    @include('templates.messages')

    <div class="row col-lg-12">
        <div class="d-flex justify-content-end col-12">
            <a href="{{ route('categories.create') }}" class="btn btn-primary btn-fill">Crear</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <table id="table_data" class="table table-hover table-striped table-responsive">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category['id'] }}</td>
                            <td>{{ $category['name'] }}</td>
                            <td>
                                <a href="#" class="btn btn-info btn-fill btn-sm mr-2" 
                                            title="Ver" data-toggle="modal" data-target="#modalShow{{ $category['id'] }}">
                                    <i class="nc-icon nc-zoom-split"></i>
                                </a>

                                <a href="#" class="btn btn-warning btn-fill btn-sm mr-2" title="actualizar">
                                    <i class="nc-icon nc-tap-01"></i>
                                </a>
                                <form id="form-delete-{{ $category['id'] }}" action="{{ route('categories.destroy', $category['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return remove();" class="btn btn-danger btn-fill btn-sm mr-2" title="eliminar">
                                        <i class="nc-icon nc-simple-remove"></i>
                                    </button>
                                </form>
                            </td>
                            {{-- modal --}}
                                <div class="modal fade modal-mini modal-primary" id="modalShow{{ $category['id'] }}"
                                        tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header justify-center">
                                                <h5>Detalle</h5>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Id:</strong>{{ $category['id'] }}</p>
                                                <p><strong>Nombre:</strong>{{ $category['name'] }}</p>
                                                <p><strong>Descripción</strong>{{ $category['description'] }}</p>
                                            </div>
                                            <div class="modal-footer justify-content-end">
                                                <button type="button" class="btn btn-link btn-simple" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {{-- fin modal --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection