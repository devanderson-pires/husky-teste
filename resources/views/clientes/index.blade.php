@extends('layout')

@section('content')
<h1 class="fs-2 fw-normal mb-4">Clientes</h1>

@include('feedback')
@include('errors', ['errors' => $errors])

<form method="post" class="row gy-2 gx-3 align-items-center">
    @csrf
    <div class="col-auto">
        <label for="nome" class="visually-hidden">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control" placeholder="Anderson">
    </div>

    <div class="col-auto">
        <label class="visually-hidden" for="empresa_id">Empresa</label>
        <select class="form-select" name="empresa_id" id="empresa_id">
            <option value="" selected>Selecione a empresa</option>
            @foreach($empresas as $empresa)
            <option value="{{$empresa->id}}">{{$empresa->empresa}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-auto">
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </div>
</form>

<table class="table table-sm table-hover table-striped mt-5">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Cliente</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <th scope="row">{{$cliente->id}}</th>
            <td>{{ $cliente->nome }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
