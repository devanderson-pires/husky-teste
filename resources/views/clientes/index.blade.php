@extends('layout')

@section('content')
<h1 class="fs-2 fw-normal mb-4">Clientes</h1>

@include('feedbackSuccesses')
@include('feedbackErrors', ['errors' => $errors])

<form method="post">
    @csrf
    <div class="row gx-2 gy-2">
        <div class="col-sm-6">
            <label for="nome" class="visually-hidden">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" placeholder="Quentinhas">
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
