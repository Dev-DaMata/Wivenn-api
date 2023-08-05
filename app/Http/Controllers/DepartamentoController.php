<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use Mockery\Undefined;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = departamento::query();
        $param1 = null;
        if (isset($_GET['Name'])) {
            $param1 = $_GET['Name'];
        }
        if ($param1 != Null) {
            $query->where('Name', $param1);
            return $query->get();
        }
        return departamento::all();
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return departamento::create($request->all());
        if(departamento::create($request->all())){
            return response()->json([
                'message' => 'Departamento cadastrado com sucesso.'
            ], 201);
        }else{
            return response()->json([
                'message' => 'erro ao cadastrar o departemento.'
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($departamento)
    {
        $departamento = departamento::find($departamento);//o find pesquisa pelo id da chave primaria
        if($departamento){
            return $departamento ;
        }else{
            return response()->json([
                'message' => 'Erro ao pesquisar o departamento.'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $departamento)
    {
        $departamento = departamento::find($departamento);
        if ($departamento) {
            $departamento->update($request->all());//o all nesse casso é para fazer todos os campos
            return $departamento;
        }else{
            return response()->json([
                'message' => 'erro ao atualizar o departamento.'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $departamento)
    {
        if(departamento::destroy($departamento)){
            return response()->json([
                'message' => 'Departamento deletado com sucesso.'
            ], 201);
        }else{
            return response()->json([
                'message' => 'erro ao excluir o departamento.'
            ], 404);
        }
    }
}
