<?php

use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\TarefaController;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResources([
    'departamento' => DepartamentoController::class,
    'funcionario' => FuncionarioController::class,
    'tarefa' => TarefaController::class,
]);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', function(Request $request){
    $credantials = $request->only(['email', 'password']);//pegar as credencias

    if(!$token = auth()->attempt($credantials)){
        abort(401,'Unauthorized');
    }

    return response()->json([
        'data' => [
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60 //tempo para ele expirar
        ]
    ]);
});
