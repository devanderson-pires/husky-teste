@extends('layout')

@section('content')
<h1 class="fs-2 fw-normal mb-4">Entregas</h1>

@include('feedback')
@include('errors', ['errors' => $errors])

<div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#criarEntregaModal">
        Nova entrega
    </button>
</div>

@include('entregas/formulario/criar.index')
@include('entregas/listaDeEntregas.index')
@endsection
