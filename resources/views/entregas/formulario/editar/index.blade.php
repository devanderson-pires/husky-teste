<div class="modal fade" id="editarEntregaModal-{{$entrega->id}}" tabindex="-1" aria-labelledby="editarEntregaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content row">
            <div class="modal-header d-flex justify-content-between">
                <h5 class="modal-title">Nova entrega</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="/entregas/{{$entrega->id}}/update" method="post">
                    @csrf
                    <div class="col-auto">
                        <label class="visually-hidden" for="cliente_id">Cliente</label>
                        <select class="form-select" name="cliente_id" id="cliente_id">
                            <option value="">Selecione o cliente</option>
                            @foreach($clientes as $cliente)
                            <option value="{{$cliente->id}}" {{ ($entrega->cliente_id == $cliente->id) ? "selected" : "" }}>{{$cliente->nome}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-auto my-2">
                        <label for="ponto_coleta" class="visually-hidden">Ponto de coleta</label>
                        <input type="text" name="ponto_coleta" id="ponto_coleta" class="form-control" placeholder="Ponto de coleta" value="{{$entrega->ponto_coleta}}">
                    </div>

                    <div class="col-auto">
                        <label for="ponto_destino" class="visually-hidden">Ponto de destino</label>
                        <input type="text" name="ponto_destino" id="ponto_destino" class="form-control" placeholder="Ponto de destino" value="{{$entrega->ponto_destino}}">
                    </div>

                    <div class="col-auto my-2">
                        <label class="visually-hidden" for="entregador_id">Entregador</label>
                        <select class="form-select" name="entregador_id" id="entregador_id">
                            @foreach($entregadores as $entregador)
                            <option value="{{$entregador->id}}" {{ ($entrega->entregador_id == $entregador->id) ? "selected" : "" }}>{{$entregador->nome}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-auto">
                        <label class="visually-hidden" for="status">Status</label>
                        <select class="form-select" name="status" id="status">
                            <option value="Novo" {{ ($entrega->status === 'Novo') ? "selected" : "" }}>Novo</option>
                            <option value="Entregando" {{ ($entrega->status === 'Entregando') ? "selected" : "" }}>Entregando</option>
                            <option value="Finalizada" {{ ($entrega->status === 'Finalizada') ? "selected" : "" }}>Finalizada</option>
                            <option value="Cancelada" {{ ($entrega->status === 'Cancelada') ? "selected" : "" }}>Cancelada</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">Excluir</button>
                        <button type="submit" class="btn btn-primary ms-1">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('confirmDeleteModal')
