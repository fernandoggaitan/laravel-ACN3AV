<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class TareaController extends Controller
{
    
    public function mostrarTodas()
    {
        $tareas = Tarea::all();
        return $tareas;
    }

}
