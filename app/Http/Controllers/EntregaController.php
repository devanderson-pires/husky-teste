<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntregaFormRequest;
use App\Models\Cliente;
use App\Models\Entrega;
use App\Models\Entregador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntregaController extends Controller
{
    public function index(Request $req)
    {
        $feedback = $req->session()->get('feedback');
        $clientes = Cliente::query()->orderBy('nome')->get();
        $entregadores = Entregador::query()->orderBy('nome')->get();
        $entregas = DB::table('entregas')
            ->join('clientes', 'entregas.cliente_id', '=', 'clientes.id')
            ->join('entregadores', 'entregas.entregador_id', '=', 'entregadores.id')
            ->join('empresas', 'clientes.empresa_id', '=', 'empresas.id')
            ->select('entregas.*', 'clientes.nome as cliente_nome', 'entregadores.nome as entregador_nome', 'empresas.empresa')->get();

        return view('entregas.index', compact('feedback', 'clientes', 'entregadores', 'entregas'));
    }

    public function store(EntregaFormRequest $req)
    {
        Entrega::create($req->all());
        $req->session()->flash('feedback', 'Entrega criada com sucesso');

        return redirect('/entregas');
    }

    public function update(EntregaFormRequest $req)
    {
        $data = $req->except('_token');
        $entrega = Entrega::find($req->id);
        $entrega->update($data);
        $req->session()->flash('feedback', 'Entrega editada com sucesso');

        return redirect('/entregas');
    }

    public function destroy(Request $req)
    {
        $entrega = Entrega::find($req->id);
        $entrega->delete();
        $req->session()->flash('feedback', 'Entrega deletada com sucesso');

        return redirect('/entregas');
    }
}
