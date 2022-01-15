@extends('layout')

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="fs-2 fw-normal mb-0">Entregas</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#criarEntregaModal">
        Nova entrega
    </button>
</div>

@include('feedback')
@include('feedbackErrors', ['errors' => $errors])


@include('entregas/formulario/criar.index')
@include('entregas/listaDeEntregas.index')
@endsection
