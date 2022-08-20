@extends('layouts.main')

@section('container')

<h3>Data Transaksi</h3>
 
<a href="/tambah" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>&nbsp;Tambah</a>

<a href="/export_excel" class="btn btn-info btn-sm"><i class="fa fa-file"></i>&nbsp;Export Excel</a>

<br/>
<br/>

<table class="table table-striped" id="myTable">
    <thead>
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Nominal</th>
        <th>Jenis Channel</th>
        <th>Opsi</th>
    </tr>
    </thead>

    <tbody>

    @php
    $no = 1; @endphp
    @foreach($transaksi as $tr)

    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ \Carbon\Carbon::parse($tr->tgl)->isoFormat('D MMMM Y') }}</td>
        <td>@currency($tr->nominal)</td>
        <td>{{ $tr->name }}</td>
        <td>
            <a href="/edit/{{ $tr->user_id }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>&nbsp;Ubah</a>
            <a href="/hapus/{{ $tr->user_id }}" onclick="return confirm('Yakin Ingin Hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Hapus</a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

@endsection
    