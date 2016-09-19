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
        return Client::find($id);
    }
    public function update(Request $request, $id)
    {
        // U atualizando dados

            $cliente = Client::find($id);

            $cliente->name = Input::get('name');
            $cliente->responsible = Input::get('responsible');
            $cliente->email = Input::get('email');
            $cliente->phone = Input::get('phone');
            $cliente->address = Input::get('address');
            $cliente->obs = Input::get('obs');

            if (!$cliente->save()){
                return response()->json("Não foi possivél atualizar os dados");
            }else{

                return response()->json("Dados Atualizados com Sucesso!");
            }

        //return response()->json($request->all());
        /*
         * Um erro: o campo: created_at está sendo atualizado juntamente.
         * */
    }
    public function destroy($id)
    {   // D Deleta o campo no banco.

        if (!Client::find($id)->delete()){
            return response()->json("? Não foi possivél apagar o registro");
        }else{
            return response()->json("Registro apagado com sucesso!");
        }


    }

}
