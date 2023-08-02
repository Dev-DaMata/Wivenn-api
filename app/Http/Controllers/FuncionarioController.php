<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Funcionario::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return response()->json([
                'message' => 'Formato de email inválido.'
            ], 400);
        }
        if (!preg_match('/^\d{9}$/', $data['phone'])) {
            return response()->json([
                'message' => 'Formato de número de telefone inválido.'
            ], 400);
        }
        if (Funcionario::create($data)) {
            return response()->json([
                'message' => 'Funcionario cadastrado com sucesso.'
            ], 201);
        } else {
            return response()->json([
                'message' => 'Erro ao cadastrar o funcionario.'
            ], 404);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $Funcionario)
    {
        $Funcionario = Funcionario::find($Funcionario);//o find pesquisa pelo id da chave primaria
        if($Funcionario){
            return $Funcionario ;
        }else{
            return response()->json([
                'message' => 'Erro ao pesquisar o funcionario.'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $Funcionario)
    {
        $Funcionario = Funcionario::find($Funcionario);
        if ($Funcionario) {
            $Funcionario->update($request->all());//o all nesse casso é para fazer todos os campos
            return $Funcionario;
        }else{
            return response()->json([
                'message' => 'Erro ao atualizar o funcionario.'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $Funcionario)
    {
        if(Funcionario::destroy($Funcionario)){
            return ;
        }else{
            return response()->json([
                'message' => 'erro ao excluir o funcionario.'
            ], 404);
        }
    }
}
