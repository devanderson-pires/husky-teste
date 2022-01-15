@extends('layout')

@section('content')
<h1 class="fs-2 fw-normal mb-4">Entregadores</h1>

@include('feedbackSuccesses')
@include('feedbackErrors', ['errors' => $errors])

<form method="post">
    @csrf
    <div class="row gx-2 gy-2">
        <div class="col-sm-6">
            <label for="nome" class="visually-hidden">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" placeholder="Anderson">
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
        </tr>
    </thead>
    <tbody>
        @foreach($entregadores as $entregador)
        <tr>
            <th scope="row">{{$entregador->id}}</th>
            <td>{{ $entregador->nome }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
