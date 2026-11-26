<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Services\RoleService;
use Illuminate\Http\JsonResponse;

class RoleController extends Controller
{
    public function __construct(
        protected RoleService $service
    ) {}

    public function index(): JsonResponse
    {
        return response()->json([
            'message' => 'Roles obtenidos correctamente.',
            'data'    => $this->service->listar(),
        ]);
    }

    public function store(RoleRequest $request): JsonResponse
    {
        $role = $this->service->crear($request->validated());

        return response()->json([
            'message' => 'Role creado correctamente.',
            'data'    => $role,
        ], 201);
    }

    public function show(int $id): JsonResponse
    {
        return response()->json([
            'message' => 'Role obtenido correctamente.',
            'data'    => $this->service->obtener($id),
        ]);
    }

    public function update(RolRequest $request, int $id): JsonResponse
    {
        return response()->json([
            'message' => 'Role actualizado correctamente.',
            'data'    => $this->service->actualizar($id, $request->validated()),
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->service->eliminar($id);

        return response()->json([
            'message' => 'Role eliminado correctamente.',
        ]);
    }
}