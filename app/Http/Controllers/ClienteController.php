<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Request $req)
    {
        $feedback = $req->session()->get('feedback');
        $clientes = Cliente::query()->orderBy('empresa')->get();

        return view('clientes.index', compact('feedback', 'clientes'));
    }

    public function store(ClienteFormRequest $req)
    {
        $req->validate($req->rules());

        $empresa = $req->empresa;
        $cliente = Cliente::create(['empresa' => $empresa]);

        $req->session()->flash('feedback', "{$cliente->empresa} criado com sucesso");
        return redirect('clientes');
    }
}
