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

        $query = Funcionario::query();
        $param1 = null;
        if (isset($_GET['firstName'])) {
            $param1 = $_GET['firstName'];
        }
        if ($param1 != Null) {
            $query->where('firstName', $param1);
            return $query->get();
        }
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
            // Validar o email
            $email = $request->input('email');
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return response()->json([
                    'message' => 'O email fornecido é inválido.'
                ], 400);
            }

            // Validar o número de telefone (assumindo formato de 9 dígitos)
            $phone = $request->input('phone');
            if (!preg_match('/^\d{9}$/', $phone)) {
                return response()->json([
                    'message' => 'O número de telefone fornecido é inválido. Deve conter 9 dígitos.'
                ], 400);
            }

            // Se tudo estiver correto, atualize os dados do funcionário
            $Funcionario->update($request->all());
            return $Funcionario;
        } else {
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
            return response()->json([
                'message' => 'Funcionario deletado com sucesso.'
            ], 201);
        }else{
            return response()->json([
                'message' => 'erro ao excluir o funcionario.'
            ], 404);
        }
    }
}
