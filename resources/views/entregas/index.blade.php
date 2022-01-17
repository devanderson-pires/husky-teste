@extends('layout')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-5">
    <h1 class="fs-2 fw-normal mb-0">Entregas</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#criarEntregaModal">
        Nova entrega
    </button>
</div>

@include('feedbacks', ['errors' => $errors])

<div class="row gy-2">
    @include('entregas/formulario/buscar.index')
    @include('entregas/formulario/filtrar.index')
</div>

@include('entregas/formulario/criar.index')
@include('entregas/listaDeEntregas.index')

@if(isset($filtro_resultado) && !is_null($filtro_resultado))
<p class="h4">{{$filtro_resultado}}</p>
@endif

{{$entregas->appends(request()->query())->links('pagination')}}

@endsection
