<?php

namespace App\Http\Controllers\Api;

use App\Client;
use App\API\ApiError;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    private $client;
    public function __construct(Client $client){

        $this->client = $client;
    }

    public function index(){
    
        return response()->json($this->client->paginate(10));
    }

    public function show(Client $id){           
        $client = $this->client->find($id);

        if(! $client){
            return response()->json(ApiError::errorMessage('Usuário não encontrado!', 4040), 404);
        }

        $data = ['data' => $client]; 
        return response()->json($data);
    }

    public function insert(Request $request){

        try{

            $clientData = $request->all();
            $this->client->create($clientData);

            $return = ['data' => ['message'=> 'Usuário criado com sucesso!']];
            return response()->json($return, 201);

        }catch(\Exception $e){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010), 500);
            }
            return response()->json(ApiError::errorMessage('Ocorreu um erro ao realizar a operação de salvar!', 1010), 500);
        }
    }

    public function update(Request $request, $id){

        try{

            $clientData = $request->all();
            $client = $this->client->find($id);
            $client->update($clientData);

            $return = ['data' => ['message'=> 'Usuário atualizado com sucesso!']];
            return response()->json($return, 201);

        }catch(\Exception $e){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010), 500);
            }
            return response()->json(ApiError::errorMessage('Ocorreu um erro ao realizar a operação de atualizar!', 1011), 500);
        }
    }

    public function delete (Client $id){
        try{
            $id->delete();
            return response()->json(['data'=> ['message'=> 'Usuário '.$id->name.' removido com sucesso!']]);

        }catch(\Exception $e){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010), 500);
            }
            return response()->json(ApiError::errorMessage('Ocorreu um erro ao realizar a operação de deletar!', 1012), 500);
        }
    }
}
