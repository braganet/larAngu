<?php

namespace LarAngu\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use LarAngu\Client;
use LarAngu\Http\Requests;

class ClientController extends Controller
{
    public function index()
    {
        return \LarAngu\Client::all();
    }
    public function store(Request $request)
    {
        // C Recebe os dados do cliente e manda para o banco
        return Client::create($request->all());
    }
    public function show($id)
    {   // R Selecionando campos no banco.
        $showClient = Client::find($id);
        if ($showClient){
           return $showClient;
        }else{
            return response()->json("Não há cliente cliente cadastrado com esses dados");
        }
    }
    public function update(Request $request, $id)
    {
        // U atualizando dados
        try {
            $cliente = Client::findorfail($id);
            $updateNow = $cliente->update($request->all());
            return response()->json("Dados Atualizados com Sucesso!");
        } catch (\Exception $e) {
            return response()->json("Não foi possivél atualizar os dados");
        }
    }

    public function destroy($id)
    {   // D Deleta o campo no banco.

        try{
            $cliente = Client::findorfail($id);
            $cliente->delete();
            return response()->json("Registro apagado com sucesso!");
        }catch (\Exception $e){
            return response()->json("? Não foi possivél apagar o registro");
        }
    }

}
