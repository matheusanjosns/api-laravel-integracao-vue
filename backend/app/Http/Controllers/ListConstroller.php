<?php

namespace App\Http\Controllers;

use App\Models\ListUser;
use Illuminate\Http\Request;

class ListConstroller extends Controller
{
    public function listagem(Request $request)
    {
       $ListUser = ListUser::all();

       return response()->json($ListUser);
    }

    public function adicionar(Request $request)
    {
        $newUser = new ListUser();

        $newUser->cep = $request->cep;
        $newUser->estado = $request->estado;
        $newUser->cidade = $request->cidade;
        $newUser->endereco = $request->endereco;
        $newUser->numero = $request->numero;
        $newUser->nome_contato = $request->nome_contato;
        $newUser->email_contato = $request->email_contato;
        $newUser->telefone_contato = $request->telefone_contato;
        $newUser->save();

        return response()->json('success');

    }

    public function update(ListUser $user, Request $request)
    {
        $user->cep = $request->cep;
        $user->estado = $request->estado;
        $user->cidade = $request->cidade;
        $user->endereco = $request->endereco;
        $user->numero = $request->numero;
        $user->nome_contato = $request->nome_contato;
        $user->email_contato = $request->email_contato;
        $user->telefone_contato = $request->telefone_contato;
        $user->save();

        return response()->json('success');
    }

    public function editar(ListUser $user, Request $request)
    {
        return response()->json($user);
    }
    
    public function delete(ListUser $user, Request $request)
    {

        $user->delete();

        return response()->json('success');
    }

}
