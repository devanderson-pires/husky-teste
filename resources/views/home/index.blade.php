@extends('layout')

@section('content')
<h1 class="fs-2 fw-normal mb-4">Home</h1>

<div id="chart_entregas" class="w-100"></div>
@endsection

@section('jsfiles')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        let data = new google.visualization.DataTable();

        data.addColumn('string', 'Entregas');
        data.addColumn('number', 'Quantidade');
        data.addRows([
            ['Canceladas', <?= $cancelada ?>],
            ['Finalizadas', <?= $finalizada ?>],
        ]);

        const options = {
            'title': 'Total de Entregas',
            'height': 300,
        };
        const chart = new google.visualization.PieChart(document.getElementById('chart_entregas'));

        chart.draw(data, options);
    }
</script>
@endsection
