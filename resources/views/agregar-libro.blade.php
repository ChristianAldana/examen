@extends('layout/plantilla')

@section("tituloPagina", "crear un nuevo registro")

@section('contenidoc')
    <div class="card">
        <h5 class="card-header">Agregar nuevo libro</h5>
        <div class="card-body">
            <form action="{{ route('libros.storec') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="id">Id</label>
                    <input type="text" name="id" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="autor">Autor</label>
                    <input type="text" name="autor" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="año_publicacion">Año de publicación</label>
                    <input type="text" name="año_publicacion" class="form-control" required>
                </div>
                <div class="form-group">
                    <a href="{{ route('libros.indexc') }}" class="btn btn-info">
                        <span class="fas fa-undo-alt"></span> Regresar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <span class="fas fa-user-plus"></span> Agregar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
