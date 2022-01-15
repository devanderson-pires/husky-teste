<form action="/entregas/filter" method="get" id="filterForm" class="col-sm-3">
    <select class="form-select" name="status" aria-label="Filtrar por status" onchange="filterSubmit()">
        <option value="" {{isset($status) && $status === '' ? 'selected' : ''}}>Filtrar por</option>
        <option value="Cancelada" {{isset($status) && $status === 'Cancelada' ? 'selected' : ''}}>Cancelada</option>
        <option value="Entregando" {{isset($status) && $status === 'Entregando' ? 'selected' : ''}}>Entregando</option>
        <option value="Finalizada" {{isset($status) && $status === 'Finalizada' ? 'selected' : ''}}>Finalizada</option>
        <option value="Novo" {{isset($status) && $status === 'Novo' ? 'selected' : ''}}>Novo</option>
    </select>
</form>

<script>
    function filterSubmit() {
        let filterForm = document.querySelector('#filterForm');
        filterForm.submit();
    }
</script>
