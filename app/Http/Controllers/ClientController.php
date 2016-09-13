<?php

namespace LarAngu\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;
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

    public function update($id)
    {
        // U atualizando dados
        $cliente = Client::find($id);

        $cliente->name = Input::get('name');
        $cliente->responsible = Input::get('responsible');
        $cliente->email = Input::get('email');
        $cliente->phone = Input::get('phone');
        $cliente->address = Input::get('address');
        $cliente->obs = Input::get('obs');

        return $cliente->save();

        /*
         * está apresentando dois erros nesta função:
         * 1º: Esta fazendo atualização normal nos dados, porém ocorre um erro apos a atualização:
         * "Whoops, looks like something went wrong.

            1/1
            UnexpectedValueException in Response.php line 403:
            The Response content must be a string or object implementing __toString(), "boolean" given."

         * Outro erro: o campo: created_at está sendo atualizado juntamente.
         * */
    }


    public function destroy($id)
    {   // D Deleta o campo no banco.
        Client::find($id)->delete();
    }
}
