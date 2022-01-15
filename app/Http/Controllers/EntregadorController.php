<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntregadorFormRequest;
use App\Models\Entregador;
use Illuminate\Http\Request;

class EntregadorController extends Controller
{
    public function index(Request $req)
    {
        $feedback = $req->session()->get('feedback');
        $entregadores = Entregador::query()->where('nome', '!=', 'Não atribuído')->orderBy('nome')->get();

        return view('entregadores.index', compact('feedback', 'entregadores'));
    }

    public function store(EntregadorFormRequest $req)
    {
        $req->validate($req->rules());

        $entregador = Entregador::create($req->all());
        $req->session()->flash('feedback', "{$entregador->nome} criado com sucesso");

        return redirect('entregadores');
    }
}
