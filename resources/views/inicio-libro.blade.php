@extends('layout/plantilla')

@section('tituloPagina', 'Crud de libros')

@section('contenidoc')

    <div class="card">
        <h5 class="card-header">CRUD con Laravel 8 y MySQL</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    @if($mensaje = \Illuminate\Support\Facades\Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ $mensaje }}
                        </div>
                    @endif
                </div>
            </div>
            <h5 class="card-title text-center">Listado de libros en el sistema</h5>
            <p>
                <a href="{{ route('libro.createc') }}" class="btn btn-primary">
                    <span class="fas fa-user-plus"></span>  Agregar nuevo libro
                </a>
            </p>
            <hr>

            <div class="table table-responsive">
                <table class="table table-sm table-bordered">
                    <thead>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Año de publicación</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    </thead>
                    <tbody>
                    @foreach($datos as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->titulo }}</td>
                            <td>{{ $item->autor }}</td>
                            <td>{{ $item->año_publicacion }}</td>
                            <td>
                                <form action="{{ route('libro.editc', $item->id) }}" method="GET">
                                    <button class="btn btn-warning btn-sm">
                                        <span class="fas fa-user-edit"></span>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('libros.destroyc', $item->id) }}" method="GET">
                                    <button class="btn btn-danger btn-sm">
                                        <span class="fas fa-user-times"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <hr>
                <br>
                <br>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    {{ $datos->links() }}
                </div>
                <hr>
            </div>
        </div>
    </div>

@endsection
