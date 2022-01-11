@extends('layout')

@section('content')
<h1 class="fs-2 fw-normal mb-4">Clientes</h1>

@if(!empty($feedback))
<div class="alert alert-success">{{$feedback}}</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="post">
    @csrf
    <div class="input-group">
        <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" aria-label="Nome do cliente" aria-describedby="button-adicionar">
        <button type="submit" id="button-adicionar" class="btn btn-primary">Adicionar</button>
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
