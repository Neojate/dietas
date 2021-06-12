@extends('layouts.app')

@section('content')

    <h1>Histórico</h1>
    <div id="graphic" style="width: 100%; height: 400px;">

    </div>

@endsection

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.1.2/echarts.min.js"></script>
    <script>
        let cuentas = {!! json_encode($cuentas) !!};
        let myChart = echarts.init(document.getElementById('graphic'));
        let option = {
            xAxis: {
                type: 'category',
                data: cuentas.map(cuenta => cuenta.date),
                axisLabel: {
                    rotate: 45
                }
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                type: 'line',
                data: cuentas.map(cuenta => cuenta.cost)
            }]
        };
        myChart.setOption(option);
    </script>
@endsection
