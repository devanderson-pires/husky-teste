<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntregadorFormRequest;
use App\Models\Entregador;
use Illuminate\Http\Request;

class EntregadorController extends Controller
{
    public function index(Request $req)
    {
        $feedbackSuccess = $req->session()->get('feedbackSuccess');
        $feedbackError = $req->session()->get('feedbackError');
        $entregadores = Entregador::query()->where('nome', '!=', 'Não atribuído')->orderBy('nome')->get();

        return view('entregadores.index', compact('feedbackSuccess', 'feedbackError', 'entregadores'));
    }

    public function store(EntregadorFormRequest $req)
    {
        $req->validate($req->rules());

        $entregador = Entregador::create($req->all());
        $req->session()->flash('feedbackSuccess', "{$entregador->nome} criado com sucesso");

        return redirect('entregadores');
    }

    public function destroy(Request $req)
    {
        $entregador = Entregador::findOrFail($req->id);

        if ($entregador->entregas()->count() > 0) {
            $req->session()->flash('feedbackError', 'Não é possível excluir entregadores com entregas existentes');
        } else {
            $entregador->delete();
            $req->session()->flash('feedbackSuccess', "{$entregador->nome} deletado com sucesso");
        }

        return redirect('entregadores');
    }
}
