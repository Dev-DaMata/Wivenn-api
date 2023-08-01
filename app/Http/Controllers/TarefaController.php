<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Tarefa::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Tarefa::create($request->all());
        if(Tarefa::create($request->all())){
            return response()->json([
                'message' => 'Tarefa cadastrado com sucesso.'
            ], 201);
        }else{
            return response()->json([
                'message' => 'erro ao cadastrar a tarefa'
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $Tarefa)
    {
        $Tarefa = Tarefa::find($Tarefa);//o find pesquisa pelo id da chave primaria
        if($Tarefa){
            return $Tarefa ;
        }else{
            return response()->json([
                'message' => 'erro ao pesquisar a tarefa.'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $Tarefa)
    {
        $Tarefa = Tarefa::find($Tarefa);
        if ($Tarefa) {
            $Tarefa->update($request->all());//o all nesse casso é para fazer todos os campos
            return $Tarefa;
        }else{
            return response()->json([
                'message' => 'erro ao atualizar a tarefa.'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $Tarefa)
    {
        if(Tarefa::destroy($Tarefa)){
            return ;
        }else{
            return response()->json([
                'message' => 'erro ao excluir a tarefa.'
            ], 404);
        }
    }
}
