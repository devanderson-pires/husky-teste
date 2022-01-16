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
            ->select('entregas.*', 'clientes.nome as cliente_nome', 'entregadores.nome as entregador_nome')->orderBy('created_at', 'desc')->paginate(6);

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
        $entrega = Entrega::findOrFail($req->id);
        $entrega->update($data);

        if ($entrega->wasChanged()) {
            $req->session()->flash('feedback', 'Entrega editada com sucesso');
        }

        return redirect('/entregas');
    }

    public function destroy(Request $req)
    {
        $entrega = Entrega::findOrFail($req->id);
        $entrega->delete();
        $req->session()->flash('feedback', 'Entrega deletada com sucesso');

        return redirect('/entregas');
    }

    public function consultar(Request $req)
    {
        $status = $req->status;
        $entregador_nome = $req->entregador;

        $clientes = Cliente::query()->orderBy('nome')->get();
        $entregadores = Entregador::query()->orderBy('nome')->get();

        $query = DB::table('entregas')
            ->join('clientes', 'entregas.cliente_id', '=', 'clientes.id')
            ->join('entregadores', 'entregas.entregador_id', '=', 'entregadores.id')
            ->select('entregas.*', 'clientes.nome as cliente_nome', 'entregadores.nome as entregador_nome');
        $filtro_resultado = null;

        if (!empty($status)) {
            $entregas = $query->where('status', '=', $status)->orderBy('created_at', 'desc')->paginate(6);

            if ($entregas->isEmpty()) {
                $filtro_resultado = $req->session()->flash('filtro_resultado', "Não encontramos resultados para {$status}");
                $filtro_resultado = $req->session()->get('filtro_resultado');
            }
        }

        if (!empty($entregador_nome)) {
            $entregas = $query->where('entregadores.nome', 'like', "{$entregador_nome}%")->orderBy('created_at', 'desc')->paginate(6);

            if ($entregas->isEmpty()) {
                $filtro_resultado = $req->session()->flash('filtro_resultado', "Não encontramos resultados para {$entregador_nome}");
                $filtro_resultado = $req->session()->get('filtro_resultado');
            }
        }

        if (empty($status) && empty($entregador_nome)) return redirect('entregas');

        return view('entregas.index', compact('clientes', 'entregadores', 'entregas', 'filtro_resultado', 'status'));
    }
}
