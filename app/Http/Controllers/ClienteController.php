<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Request $req)
    {
        $feedbackSuccess = $req->session()->get('feedbackSuccess');
        $feedbackError = $req->session()->get('feedbackError');
        $clientes = Cliente::query()->orderBy('nome')->get();

        return view('clientes.index', compact('feedbackSuccess', 'feedbackError', 'clientes'));
    }

    public function store(ClienteFormRequest $req)
    {
        $req->validate($req->rules());
        $cliente = Cliente::create($req->all());
        $req->session()->flash('feedbackSuccess', "{$cliente->nome} criado com sucesso");

        return redirect('clientes');
    }

    public function destroy(Request $req)
    {
        $cliente = Cliente::findOrFail($req->id);

        if ($cliente->entregas()->count() > 0) {
            $req->session()->flash('feedbackError', 'Não é possível excluir clientes com entregas existentes');
        } else {
            $cliente->delete();
            $req->session()->flash('feedbackSuccess', "{$cliente->nome} deletado com sucesso");
        }

        return redirect('clientes');
    }
}
