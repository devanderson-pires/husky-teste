<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormRequest;
use App\Models\Cliente;
use App\Models\Empresa;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Request $req)
    {
        $feedback = $req->session()->get('feedback');
        $clientes = Cliente::query()->orderBy('nome')->get();
        $empresas = Empresa::query()->orderBy('empresa')->get();

        return view('clientes.index', compact('feedback', 'clientes', 'empresas'));
    }

    public function store(ClienteFormRequest $req)
    {
        $req->validate($req->rules());

        $nome = $req->nome;
        $empresa = $req->empresa_id;
        $cliente = Cliente::create(['nome' => $nome, 'empresa_id' => intval($empresa)]);

        $req->session()->flash('feedback', "{$cliente->nome} criado com sucesso");
        return redirect('clientes');
    }
}
