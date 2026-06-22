<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMarcaRequest;
use App\Http\Requests\UpdateMarcaRequest;
use App\Models\Marca;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Throwable;

class MarcaController extends Controller
{
    // private Marca $marca;

    // public function __construct(Marca $marca)
    // {
    //     $this->marca = $marca;
    // }

    public function __construct(
        private Marca $marca
    ) {}

    public function index(): JsonResponse
    {
        $marcas = $this->marca->All();

        return response()->json($marcas, Response::HTTP_OK);
    }

    public function store(StoreMarcaRequest $request): JsonResponse
    {
        $marca = $this->marca->create($request->all());

        return response()->json($marca, Response::HTTP_CREATED);
    }

    public function show(string $id): JsonResponse
    {
        try {
            $marca = $this->marca->findOrFail($id);
        } catch (Throwable) {
            return response()->json('Não foi possível localizar o recurso!', Response::HTTP_NOT_FOUND);
        }

        return response()->json($marca, Response::HTTP_OK);
    }

    public function update(UpdateMarcaRequest $request, string $id): JsonResponse
    {
        try {
            $marca = $this->marca->findOrFail($id);
        } catch(Throwable) {
            return response()->json('Não foi possível realizar a atualização registro não existe!', Response::HTTP_NOT_FOUND);
        }

        $marca->update($request->all());

        return response()->json($marca, Response::HTTP_OK);
    }

    public function destroy(string $id): JsonResponse
    {
        try {
            $marca = $this->marca->findOrFail($id);
        } catch(Throwable) {
            return response()->json('Não foi possível realizar a remoção, registro não existe!', Response::HTTP_NOT);
        }
        $marca->delete();

        return response()->json('Marca deletada com sucesso', Response::HTTP_OK);
    }
}
