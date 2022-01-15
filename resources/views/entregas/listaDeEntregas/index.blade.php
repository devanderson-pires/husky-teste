<div class="mc-entregas mt-3">
    @foreach($entregas as $entrega)
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-4">
                <div>
                    <h5 class="card-title">{{$entrega->empresa}}</h5>
                    <h6 class="card-subtitle text-muted">{{$entrega->cliente_nome}}</h6>
                </div>

                <button type="button" class="btn btn-link text-primary" data-bs-toggle="modal" data-bs-target="#editarEntregaModal-{{$entrega->id}}">Editar</button>
            </div>

            <div class="row justify-content-between mb-2">
                <div class="col-9  mb-3">
                    <span class="fw-bolder">Entregador</span>
                    <br>
                    {{$entrega->entregador_nome}}
                </div>
                <div class="col-6">
                    <span class="fw-bolder">Coleta</span>
                    <br>
                    {{$entrega->ponto_coleta}}
                </div>
                <div class="col-6">
                    <span class="fw-bolder">Destino</span>
                    <br>
                    {{$entrega->ponto_destino}}
                </div>
            </div>
        </div>

        @switch($entrega->status)
        @case('Entregando')
        <div class="card-footer badge bg-info text-white text-wrap fs-4 fw-normal text-uppercase">
            {{$entrega->status}}
        </div>
        @break

        @case('Finalizada')
        <div class="card-footer badge bg-success text-white text-wrap fs-4 fw-normal text-uppercase">
            {{$entrega->status}}
        </div>
        @break

        @case('Cancelada')
        <div class="card-footer badge bg-danger text-white text-wrap fs-4 fw-normal text-uppercase">
            {{$entrega->status}}
        </div>
        @break

        @default
        <div class="card-footer badge bg-info text-white text-wrap fs-4 fw-normal text-uppercase">
            {{$entrega->status}}
        </div>
        @endswitch
    </div>

    @include('entregas/formulario/editar.index')
    @endforeach
</div>
