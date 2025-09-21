<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\ServiciosTarea;
use App\Http\requests\RespuestaAlmacenamientoTarea;
use App\Http\requests\RespuestaEdicionTarea;

class TareaController extends Controller
{
    protected $service;

    public function __construct(ServiciosTarea $service) {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return response()->json([
                "success" => true,
                "message" => "Lista de tareas obtenidas con éxito",
                "data" => $this->service->obtenerTareas()
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "success" => false,
                "message" => "Error al obtener la lista de tareas",
                "error" => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $tarea = $this->service->crearTarea($request->validated());
            return response()->json([
                "success" => true,
                "message" => "Tarea creada con éxito",
                "data" => $tarea
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                "success" => false,
                "message" => "Error al crear la tarea",
                "error" => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $tarea = $this->service->obtenerTarea($id);

            if (!$tarea) {
                return response()->json([
                    "success" => false,
                    "message" => 'Tarea no encontrada'
                ], 404);
            }
            return response()->json([
                "success" => true, 
                "message" => "Tarea obtenida con éxito",
                "data" => $tarea
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "success" => false,
                "message" => "Error al obtener la tarea",
                "error" => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $tarea = $this->service->actualizarTarea($id, $request->validated());

            if (!$tarea) {
                return response()->json([
                    "success" => false,
                    "message" => 'Tarea no encontrada'
                ], 404);
            }

            return response()->json([
                "success" => true,
                "message" => "Tarea actualizada con éxito",
                "data" => $tarea
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                "success" => false,
                "message" => "Error al actualizar la tarea",
                "error" => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $tarea = $this->service->eliminarTarea($id);

            if (!$tarea) {
                return response()->json([
                    "success" => false, 
                    "message" => 'Error al eliminar la tarea'
                ], 500);
            }

            return response()->json([
                "success" => true,
                "message" => "Tarea Eliminada"
            ], 204);
        } catch (\Throwable $th) {
            return response()->json([
                "success" => false,
                "message" => "Error al eliminar la tarea",
                "error" => $th->getMessage()
            ], 500);
        }
    }
}
