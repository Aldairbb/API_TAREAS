<?php

namespace App\Http\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Tarea;

interface RepositorioTareaInterface
{
    public function obtenerTareas(): Collection;
    public function obtenerTarea(int $id): ?Tarea;
    public function crearTarea(array $data): Tarea;
    public function actualizarTarea(int $id, array $data): Tarea;
    public function eliminarTarea(int $id): bool;
}