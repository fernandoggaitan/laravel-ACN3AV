<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ $titulo }} </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h1> {{ $titulo }} </h1>

        <div>
            <a href="{{ route('tareas.create') }}" class="btn btn-primary"> Crear tarea nueva </a>
        </div>

        <ul>
            @foreach ($tareas as $tarea)
                <li> {{ $tarea->titulo }} </li>
            @endforeach
        </ul>
    </div>

</body>

</html>
