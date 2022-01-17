@extends('layout')

@section('content')
<h1 class="fs-2 fw-normal mb-4">Entregadores</h1>

@include('feedbacks', ['errors' => $errors])

<form method="post">
    @csrf
    <div class="row gx-2 gy-2">
        <div class="col-sm-6">
            <label for="nome" class="visually-hidden">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control @error('nome') border-danger @enderror" placeholder="ex Anderson">
        </div>

        <div class="col-sm-2">
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </div>
    </div>
</form>

<table class="table table-sm table-hover table-striped mt-5">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Entregador</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($entregadores as $entregador)
        <tr>
            <th scope="row" class="align-middle">{{$entregador->id}}</th>
            <td class="align-middle">{{$entregador->nome}}</td>
            <td>
                <a href="/entregadores/{{$entregador->id}}/delete" class="btn btn-danger btn-sm" role="button">
                    <i data-feather="trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
