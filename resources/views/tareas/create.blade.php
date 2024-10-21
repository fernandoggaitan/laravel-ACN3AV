@extends('layouts.base')

@section('title', 'Tarea nueva')

@section('content')
  <div class="container">
    <h1> Crear tarea nueva</h1>
    <form action="{{ route('tareas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="titulo"> Título </label>
            <input type="text" name="titulo" id="titulo" class="form-control" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="descripcion"> Descripción </label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success"> Agregar tarea </button>
        <a href="{{ route('tareas.index') }}" class="btn btn-danger"> Cancelar </a>
    </form>
  </div>
@endsection