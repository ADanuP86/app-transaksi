@extends('layouts.main')

{{-- import chart --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@section('container')

<form action="" method="get">
    <div class="input-group">
        <input type="date" name="tgl_awal" value="{{ $tgl_awal }}" class="form-control tgl_awal" placeholder="Periode Awal" autocomplete="off">
        <div class="input-group-prepend">
            <span class="input-group-text" id="">s/d</span>
        </div>
        <input type="date" name="tgl_akhir" value="{{ $tgl_akhir }}" class="form-control tgl_akhir" placeholder="Periode Akhir" autocomplete="off">
        <button type="submit" name="filter" class="btn btn-info btn-sm"><i class="fa fa-search"></i>&nbsp;Tampilkan Data</button>

        @php
            if(isset($_GET['filter']))
            echo '<a href="/report" class="btn btn-warning btn-sm">RESET</a>'
        @endphp
    </div>
</form>

<br>

<table class="table table-striped">
    <tr>
        <th>Jenis Channel</th>
        <th>Nominal</th>
        <th>Frekuensi</th>
    </tr>

    @php
    $total_jumlah = 0; 
    $total_total = 0; 
    @endphp
    @foreach($transaksi as $tr)

    @php
    $jumlah[] = $tr->jumlah; $total_jumlah = array_sum($jumlah);
    $total[] = $tr->total; $total_total = array_sum($total)
    @endphp

    <tr>
        <td>{{ $tr->name }}</td>
        <td>@currency($tr->jumlah)</td>
        <td>{{ $tr->total }}</td>
    </tr>

    @endforeach

    <tr>
        <th>Total</th>
        <td>@currency($total_jumlah)</td>
        <td>{{ $total_total }}</td>
    </tr>
</table>

{{-- view charts --}}
<canvas id="myChart" height="100px"></canvas>

<script>
    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                @foreach ($chart as $c)
                '{{ $c->tgl }}',
                @endforeach 
            ],
            datasets: [{
                label: 'Data Transaksi',
                data: [
                    @foreach ($chart as $c)
                    {{ $c->total }},
                    @endforeach 
                ],

                backgroundColor: 
                    // 'rgba(153, 102, 255, 0.2)',
                    // 'rgba(255, 159, 64, 0.2)'
                    '#0000FF'
                ,
                borderColor:
                    // 'rgba(153, 102, 255, 1)',
                    // 'rgba(255, 159, 64, 1)'
                    '#ade8f4'
                ,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endsection
