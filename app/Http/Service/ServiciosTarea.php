<?php

namespace App\Http\Service;

use App\Models\Tarea;
use App\Http\Contracts\RepositorioTareaInterface;

class ServiciosTarea
{
    protected $repositorio;
    public function __construct(RepositorioTareaInterface $repositorio)
    {
        $this->repositorio = $repositorio;
    }

    public function obtenerTareas() {
        return $this->repositorio->obtenerTareas();
    }

    public function crear(array $data): Tarea {
        return $this->repositorio->crearTarea($data);
    }

    public function obtenerTarea(int $id): ?Tarea {
        return $this->repositorio->obtenerTarea($id);
    }

    public function actualizarTarea(int $id, array $data): Tarea {
        $tarea = $this->repositorio->obtenerTarea($id);
        if (!$tarea) {
            throw new \Exception('Tarea no encontrada');
        }
        return $this->repositorio->actualizarTarea($id, $data);
    }

    public function eliminarTarea(int $id): bool {
        $tarea = $this->repositorio->obtenerTarea($id);
        if (!$tarea) {
            throw new \Exception('Tarea no encontrada');
        }   
        return $this->repositorio->eliminarTarea($id);
    }


}