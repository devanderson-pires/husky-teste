@foreach($entregas as $entrega)
<div class="card" style="width: 18rem;">
    <div class="card-header">
        {{$entrega->empresa}}
    </div>

    <div class="card-body">
        {{$entrega->cliente_nome}}
        {{$entrega->ponto_coleta}}
        {{$entrega->ponto_destino}}
        {{$entrega->entregador_nome}}
    </div>

    <div class="card-footer">
        {{$entrega->status}}
    </div>
</div>
@endforeach
