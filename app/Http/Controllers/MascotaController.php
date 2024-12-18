<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Builder;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscador = $request->buscador;

        $mascotas = Mascota::select('id', 'nombre', 'fecha_nacimiento', 'categoria_id')
            ->when($buscador, function(Builder $query, $buscador){
                $query->where('nombre', 'like', "%{$buscador}%");
                $query->orWhere('descripcion', 'like', "%{$buscador}%");
            })
            ->where('is_visible', true)
            ->orderBy('nombre')
            ->paginate(10);

        return view('mascotas.index', compact('mascotas', 'buscador'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categorias = Categoria::select('id', 'nombre')->orderBy('nombre')->get();
        return view('mascotas.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required',
            'fecha_nacimiento' => 'required|date|before:tomorrow',
            'categoria_id' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|mimes:jpg,png'
        ]);

        $imagen_nombre = time() . $request->file('imagen')->getClientOriginalName();
        $imagen = $request->file('imagen')->storeAs('mascotas', $imagen_nombre, 'public');

        $mascota = Mascota::create([
            'nombre' => $request->nombre,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'categoria_id' => $request->categoria_id,
            'descripcion' => $request->descripcion,
            'imagen' => $imagen
        ]);

        return redirect()
            ->route('mascotas.index')
            ->with('status', 'La mascota se agregó correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(Mascota $mascota)
    {
        return view('mascotas.show', compact('mascota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mascota $mascota)
    {
        $categorias = Categoria::select('id', 'nombre')->orderBy('nombre')->get();
        return view('mascotas.edit', compact('categorias', 'mascota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mascota $mascota)
    {        

        $request->validate([
            'nombre' => 'required',
            'fecha_nacimiento' => 'required|date|before:tomorrow',
            'categoria_id' => 'required',
            'descripcion' => 'required'
        ]);

        $mascota->update([
            'nombre' => $request->nombre,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'categoria_id' => $request->categoria_id,
            'descripcion' => $request->descripcion
        ]);

        return redirect()
            ->route('mascotas.show', $mascota)
            ->with('status', 'La mascota se ha modificado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mascota $mascota)
    {
        
        //Eliminado físico.
        //$mascota->delete();

        //Eliminado lógico.
        $mascota->update([
            'is_visible' => false
        ]);

        return redirect()
            ->route('mascotas.index')
            ->with('status', 'La mascota se ha eliminado correctamente');

    }
}
