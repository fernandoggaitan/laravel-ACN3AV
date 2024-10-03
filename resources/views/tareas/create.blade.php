<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Tarea nueva </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

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

</body>

</html>
