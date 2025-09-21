<?php

namespace App\Http\Repositories;

use App\Http\Contracts\RepositorioTareaInterface;
use App\Models\Tarea;
use Illuminate\Database\Eloquent\Collection;

class TareaRepositorio implements RepositorioTareaInterface
{
    public function obtenerTareas(): Collection
    {
        return Tarea::all();
    }

    public function obtenerTarea(int $id): Tarea
    {   
        return Tarea::find($id);
    }

    public function crearTarea(array $data): Tarea
    {
        return Tarea::create($data);
    }

    public function actualizarTarea(int $id, array $data): Tarea
    {
        $tarea = Tarea::find($id);
        if($tarea) return $tarea->update($data);

        return false;
    }

    public function eliminarTarea(int $id): bool 
    {
        $tarea = Tarea::find($id);
        if($tarea) return $tarea->delete();
        
        return  false;
    }
}