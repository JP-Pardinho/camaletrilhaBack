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
        $data = $request->validated();

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $caminho = $request->file('imagem')->store('imagens', 'public');

            $data['imagem'] = $caminho;
        }

        $marca = $this->marca->create($data);

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
        $data = $request->validated();

        try {
            $marca = $this->marca->findOrFail($id);
        } catch(Throwable) {
            return response()->json('Não foi possível realizar a atualização registro não existe!', Response::HTTP_NOT_FOUND);
        }

        $marca->update($data);

        return response()->json($marca, Response::HTTP_OK);
    }

    public function destroy(string $id): JsonResponse
    {
        try {
            $marca = $this->marca->findOrFail($id);
        } catch(Throwable) {
            return response()->json('Não foi possível realizar a remoção, registro não existe!', Response::HTTP_NOT_FOUND);
        }
        $marca->delete();

        return response()->json('Marca deletada com sucesso', Response::HTTP_OK);
    }
}
